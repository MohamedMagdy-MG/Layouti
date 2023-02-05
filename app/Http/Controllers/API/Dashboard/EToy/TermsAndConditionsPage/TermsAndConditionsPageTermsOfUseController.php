<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageTermsOfUse;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageTermsOfUseCards;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageTermsOfUseCardsOfCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermsAndConditionsPageTermsOfUseController extends Controller
{
    use Response;
    public $TermsAndConditionsPageTermsOfUse;
    public $TermsAndConditionsPageTermsOfUseCards;
    public $TermsAndConditionsPageTermsOfUseCardsOfCard;

    public function __construct()
    {
        $this->TermsAndConditionsPageTermsOfUse = new TermsAndConditionsPageTermsOfUse();
        $this->TermsAndConditionsPageTermsOfUseCards = new TermsAndConditionsPageTermsOfUseCards();
        $this->TermsAndConditionsPageTermsOfUseCardsOfCard = new TermsAndConditionsPageTermsOfUseCardsOfCard();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }


        $TermsAndConditionsPageTermsOfUseDeleted = $this->TermsAndConditionsPageTermsOfUse->first();
        $TermsAndConditionsPageTermsOfUseDeleted->delete();
        
        $TermsAndConditionsPageTermsOfUse = $this->TermsAndConditionsPageTermsOfUse->first();
        if(!$TermsAndConditionsPageTermsOfUse){
            $TermsAndConditionsPageTermsOfUse = $this->TermsAndConditionsPageTermsOfUse->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,

            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $cards_of_cards_count  = 0 ;
                    $cards_of_cards = [];
                    if(array_key_exists('cards_of_cards',$card)){
                        $cards_of_cards_count   = count($card['cards_of_cards']);
                        $cards_of_cards  = $card['cards_of_cards'];
                    }

                    $TermsAndConditionsPageTermsOfUseCards = $this->TermsAndConditionsPageTermsOfUseCards->create([
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,
                        'card' => $TermsAndConditionsPageTermsOfUse->id
                    ]);

                    if($cards_of_cards_count > 0){
                        foreach($cards_of_cards as $key => $card_of_card){

                            $this->TermsAndConditionsPageTermsOfUseCardsOfCard->create([
                                'descriptionEn' => $card_of_card['descriptionEn'] ,
                                'descriptionAr' => $card_of_card['descriptionAr'] ,
                                'card' => $TermsAndConditionsPageTermsOfUseCards->id
                            ]);
                        }
                    }
                }
            }
        }else{
            $TermsAndConditionsPageTermsOfUse->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                                

                    $cards_of_cards_count  = 0 ;
                    $cards_of_cards = [];
                    if(array_key_exists('cards_of_cards',$card)){
                        $cards_of_cards_count   = count($card['cards_of_cards']);
                        $cards_of_cards  = $card['cards_of_cards'];
                    }
                    $TermsAndConditionsPageTermsOfUseCards = $this->TermsAndConditionsPageTermsOfUseCards->where('card',$TermsAndConditionsPageTermsOfUse->id)->skip($key)->first();
                    if($TermsAndConditionsPageTermsOfUseCards != null){
                        $TermsAndConditionsPageTermsOfUseCards->update([
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'card' => $TermsAndConditionsPageTermsOfUse->id
                        ]);

                        if($cards_of_cards_count > 0){
                            foreach($cards_of_cards as $key => $card_of_card){

                                $TermsAndConditionsPageTermsOfUseCardsOfCard = $this->TermsAndConditionsPageTermsOfUseCardsOfCard->where('card',$card)->skip($key)->first();
                                if($TermsAndConditionsPageTermsOfUseCardsOfCard != null){
                                    $TermsAndConditionsPageTermsOfUseCardsOfCard->update([
                                        'descriptionEn' => $card_of_card['descriptionEn'] ,
                                        'descriptionAr' => $card_of_card['descriptionAr'] ,
                                        'card' => $TermsAndConditionsPageTermsOfUseCards->id
                                    ]);
                                }
                                else{

                                    $this->TermsAndConditionsPageTermsOfUseCardsOfCard->create([
                                        'descriptionEn' => $card_of_card['descriptionEn'] ,
                                        'descriptionAr' => $card_of_card['descriptionAr'] ,
                                        'card' => $TermsAndConditionsPageTermsOfUseCards->id
                                    ]);
                                }
                            }
                        }
                    }else{



                        $TermsAndConditionsPageTermsOfUseCards = $this->TermsAndConditionsPageTermsOfUseCards->create([
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'card' => $TermsAndConditionsPageTermsOfUse->id
                        ]);

                        if($cards_of_cards_count > 0){
                            foreach($cards_of_cards as $key => $card_of_card){

                                $this->TermsAndConditionsPageTermsOfUseCardsOfCard->create([
                                    'descriptionEn' => $card_of_card['descriptionEn'] ,
                                    'descriptionAr' => $card_of_card['descriptionAr'] ,
                                    'card' => $TermsAndConditionsPageTermsOfUseCards->id
                                ]);
                            }
                        }

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy Terms And Conditions Terms Of Use Page Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Terms Of Use Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $TermsAndConditionsPageTermsOfUseCards = $this->TermsAndConditionsPageTermsOfUseCards->find($request->id);
            if(!$TermsAndConditionsPageTermsOfUseCards){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions Terms Of Use Card Opreation Failed',true,400);
            }

            $TermsAndConditionsPageTermsOfUseCards->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Terms Of Use Card Opreation Success',true,200);


        }
    }

    public function deleteCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Terms Of Use Card Of Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $TermsAndConditionsPageTermsOfUseCardsOfCard = $this->TermsAndConditionsPageTermsOfUseCardsOfCard->find($request->id);
            if(!$TermsAndConditionsPageTermsOfUseCardsOfCard){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions Terms Of Use Card Of Card Opreation Failed',true,400);
            }

            $TermsAndConditionsPageTermsOfUseCardsOfCard->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Terms Of Use Card Of Card Opreation Success',true,200);


        }
    }
}
