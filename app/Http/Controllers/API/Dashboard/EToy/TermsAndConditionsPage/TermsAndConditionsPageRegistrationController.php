<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageRegistration;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageRegistrationCards;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageRegistrationCardsOfCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermsAndConditionsPageRegistrationController extends Controller
{
    use Response;
    public $TermsAndConditionsPageRegistration;
    public $TermsAndConditionsPageRegistrationCards;
    public $TermsAndConditionsPageRegistrationCardsOfCard;


    public function __construct()
    {
        $this->TermsAndConditionsPageRegistration = new TermsAndConditionsPageRegistration();
        $this->TermsAndConditionsPageRegistrationCards = new TermsAndConditionsPageRegistrationCards();
        $this->TermsAndConditionsPageRegistrationCardsOfCard = new TermsAndConditionsPageRegistrationCardsOfCards();
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

        $TermsAndConditionsPageRegistrationDeleted = $this->TermsAndConditionsPageRegistration->first();
        $TermsAndConditionsPageRegistrationDeleted->delete();
        
        
        $TermsAndConditionsPageRegistration = $this->TermsAndConditionsPageRegistration->first();
        if(!$TermsAndConditionsPageRegistration){
            $TermsAndConditionsPageRegistration = $this->TermsAndConditionsPageRegistration->create([
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

                    $TermsAndConditionsPageRegistrationCards = $this->TermsAndConditionsPageRegistrationCards->create([
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,
                        'card' => $TermsAndConditionsPageRegistration->id
                    ]);

                    if($cards_of_cards_count > 0){
                        foreach($cards_of_cards as $key => $card_of_card){

                            $this->TermsAndConditionsPageRegistrationCardsOfCard->create([
                                'descriptionEn' => $card_of_card['descriptionEn'] ,
                                'descriptionAr' => $card_of_card['descriptionAr'] ,
                                'card' => $TermsAndConditionsPageRegistrationCards->id
                            ]);
                        }
                    }
                }
            }
        }else{

            $TermsAndConditionsPageRegistration->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'subTitleEn' => $request->subTitleEn ,
                'subTitleAr' => $request->subTitleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $cards_of_cards_count  = 0 ;
                    $cards_of_cards = [];
                    if(array_key_exists('cards_of_cards',$card)){
                        $cards_of_cards_count   = count($card['cards_of_cards']);
                        $cards_of_cards  = $card['cards_of_cards'];
                    }

                    $TermsAndConditionsPageRegistrationCards = $this->TermsAndConditionsPageRegistrationCards->where('card',$TermsAndConditionsPageRegistration->id)->skip($key)->first();
                    if($TermsAndConditionsPageRegistrationCards != null){
                        $TermsAndConditionsPageRegistrationCards->update([
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'card' => $TermsAndConditionsPageRegistration->id
                        ]);

                        if($cards_of_cards_count > 0){
                            foreach($cards_of_cards as $key => $card_of_card){

                                $TermsAndConditionsPageRegistrationCardsOfCard = $this->TermsAndConditionsPageRegistrationCardsOfCard->where('card',$card)->skip($key)->first();
                                if($TermsAndConditionsPageRegistrationCardsOfCard != null){
                                    $TermsAndConditionsPageRegistrationCardsOfCard->update([
                                        'descriptionEn' => $card_of_card['descriptionEn'] ,
                                        'descriptionAr' => $card_of_card['descriptionAr'] ,
                                        'card' => $TermsAndConditionsPageRegistrationCards->id
                                    ]);
                                }
                                else{

                                    $this->TermsAndConditionsPageRegistrationCardsOfCard->create([
                                        'descriptionEn' => $card_of_card['descriptionEn'] ,
                                        'descriptionAr' => $card_of_card['descriptionAr'] ,
                                        'card' => $TermsAndConditionsPageRegistrationCards->id
                                    ]);
                                }
                            }
                        }
                    }else{



                        $TermsAndConditionsPageRegistrationCards = $this->TermsAndConditionsPageRegistrationCards->create([
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'card' => $TermsAndConditionsPageRegistration->id
                        ]);

                        if($cards_of_cards_count > 0){
                            foreach($cards_of_cards as $key => $card_of_card){

                                $this->TermsAndConditionsPageRegistrationCardsOfCard->create([
                                    'descriptionEn' => $card_of_card['descriptionEn'] ,
                                    'descriptionAr' => $card_of_card['descriptionAr'] ,
                                    'card' => $TermsAndConditionsPageRegistrationCards->id
                                ]);
                            }
                        }

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy Terms And Conditions Registration Page Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Registration Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $TermsAndConditionsPageRegistrationCards = $this->TermsAndConditionsPageRegistrationCards->find($request->id);
            if(!$TermsAndConditionsPageRegistrationCards){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions Registration Card Opreation Failed',true,400);
            }

            $TermsAndConditionsPageRegistrationCards->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Registration Card Opreation Success',true,200);


        }
    }

    public function deleteCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Registration Card Of Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $TermsAndConditionsPageRegistrationCardsOfCard = $this->TermsAndConditionsPageRegistrationCardsOfCard->find($request->id);
            if(!$TermsAndConditionsPageRegistrationCardsOfCard){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions Registration Card Of Card Opreation Failed',true,400);
            }

            $TermsAndConditionsPageRegistrationCardsOfCard->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Registration Card Of Card Opreation Success',true,200);


        }
    }
}
