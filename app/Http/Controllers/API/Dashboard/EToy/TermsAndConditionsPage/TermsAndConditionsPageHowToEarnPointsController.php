<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageHowToEarnPoints;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageHowToEarnPointsCards;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageHowToEarnPointsCardsOfCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermsAndConditionsPageHowToEarnPointsController extends Controller
{
    use Response;
    public $termsAndConditionsPageHowToEarnPoints;
    public $termsAndConditionsPageHowToEarnPointsCards;
    public $termsAndConditionsPageHowToEarnPointsCardsOfCard;


    public function __construct()
    {
        $this->termsAndConditionsPageHowToEarnPoints = new TermsAndConditionsPageHowToEarnPoints();
        $this->termsAndConditionsPageHowToEarnPointsCards = new TermsAndConditionsPageHowToEarnPointsCards();
        $this->termsAndConditionsPageHowToEarnPointsCardsOfCard = new TermsAndConditionsPageHowToEarnPointsCardsOfCards();
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

        $termsAndConditionsPageHowToEarnPointsDeleted = $this->termsAndConditionsPageHowToEarnPoints->first();
        $termsAndConditionsPageHowToEarnPointsDeleted->delete();


        $termsAndConditionsPageHowToEarnPoints = $this->termsAndConditionsPageHowToEarnPoints->first();
        if(!$termsAndConditionsPageHowToEarnPoints){
            $termsAndConditionsPageHowToEarnPoints = $this->termsAndConditionsPageHowToEarnPoints->create([
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

                    $termsAndConditionsPageHowToEarnPointsCards = $this->termsAndConditionsPageHowToEarnPointsCards->create([
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,
                        'subTitleEn' => $card['subTitleEn'] ,
                        'subTitleAr' => $card['subTitleAr'] ,
                        'card' => $termsAndConditionsPageHowToEarnPoints->id
                    ]);

                    if($cards_of_cards_count > 0){
                        foreach($cards_of_cards as $key => $card_of_card){

                            $this->termsAndConditionsPageHowToEarnPointsCardsOfCard->create([
                                'descriptionEn' => $card_of_card['descriptionEn'] ,
                                'descriptionAr' => $card_of_card['descriptionAr'] ,
                                'card' => $termsAndConditionsPageHowToEarnPointsCards->id
                            ]);
                        }
                    }
                }
            }
        }else{

            $termsAndConditionsPageHowToEarnPoints->update([
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
                    $termsAndConditionsPageHowToEarnPointsCards = $this->termsAndConditionsPageHowToEarnPointsCards->where('card',$termsAndConditionsPageHowToEarnPoints->id)->skip($key)->first();
                    if($termsAndConditionsPageHowToEarnPointsCards != null){
                        $termsAndConditionsPageHowToEarnPointsCards->update([
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'subTitleEn' => $card['subTitleEn'] ,
                            'subTitleAr' => $card['subTitleAr'] ,
                            'card' => $termsAndConditionsPageHowToEarnPoints->id
                        ]);

                        if($cards_of_cards_count > 0){
                            foreach($cards_of_cards as $key => $card_of_card){

                                $termsAndConditionsPageHowToEarnPointsCardsOfCard = $this->termsAndConditionsPageHowToEarnPointsCardsOfCard->where('card',$termsAndConditionsPageHowToEarnPointsCards->id)->skip($key)->first();
                                if($termsAndConditionsPageHowToEarnPointsCardsOfCard != null){
                                    $termsAndConditionsPageHowToEarnPointsCardsOfCard->update([
                                        'descriptionEn' => $card_of_card['descriptionEn'] ,
                                        'descriptionAr' => $card_of_card['descriptionAr'] ,
                                        'card' => $termsAndConditionsPageHowToEarnPointsCards->id
                                    ]);
                                }
                                else{

                                    $this->termsAndConditionsPageHowToEarnPointsCardsOfCard->create([
                                        'descriptionEn' => $card_of_card['descriptionEn'] ,
                                        'descriptionAr' => $card_of_card['descriptionAr'] ,
                                        'card' => $termsAndConditionsPageHowToEarnPointsCards->id
                                    ]);
                                }
                            }
                        }
                    }else{



                        $termsAndConditionsPageHowToEarnPointsCards = $this->termsAndConditionsPageHowToEarnPointsCards->create([
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'subTitleEn' => $card['subTitleEn'] ,
                            'subTitleAr' => $card['subTitleAr'] ,
                            'card' => $termsAndConditionsPageHowToEarnPoints->id
                        ]);

                        if($cards_of_cards_count > 0){
                            foreach($cards_of_cards as $key => $card_of_card){

                                $this->termsAndConditionsPageHowToEarnPointsCardsOfCard->create([
                                    'descriptionEn' => $card_of_card['descriptionEn'] ,
                                    'descriptionAr' => $card_of_card['descriptionAr'] ,
                                    'card' => $termsAndConditionsPageHowToEarnPointsCards->id
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
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions How To Earn Points Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $termsAndConditionsPageHowToEarnPointsCards = $this->termsAndConditionsPageHowToEarnPointsCards->find($request->id);
            if(!$termsAndConditionsPageHowToEarnPointsCards){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions How To Earn Points Card Opreation Failed',true,400);
            }

            $termsAndConditionsPageHowToEarnPointsCards->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions How To Earn Points Card Opreation Success',true,200);


        }
    }

    public function deleteCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions How To Earn Points Card Of Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $termsAndConditionsPageHowToEarnPointsCardsOfCard = $this->termsAndConditionsPageHowToEarnPointsCardsOfCard->find($request->id);
            if(!$termsAndConditionsPageHowToEarnPointsCardsOfCard){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions How To Earn Points Card Of Card Opreation Failed',true,400);
            }

            $termsAndConditionsPageHowToEarnPointsCardsOfCard->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions How To Earn Points Card Of Card Opreation Success',true,200);


        }
    }
}
