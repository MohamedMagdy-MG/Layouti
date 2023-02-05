<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageHeaderContent;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageHeaderContentCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TermsAndConditionsPageHeaderContentController extends Controller
{
    use Response;
    public $termsAndConditionsPageHeaderContent;
    public $termsAndConditionsPageHeaderContentCards;

    public function __construct()
    {
        $this->termsAndConditionsPageHeaderContent = new TermsAndConditionsPageHeaderContent();
        $this->termsAndConditionsPageHeaderContentCards = new TermsAndConditionsPageHeaderContentCards();
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

        $termsAndConditionsPageHeaderContent = $this->termsAndConditionsPageHeaderContent->first();
        if(!$termsAndConditionsPageHeaderContent){

            $termsAndConditionsPageHeaderContent = $this->termsAndConditionsPageHeaderContent->create([
                'color' => $request->color ,
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $termsAndConditionsPageHeaderContentCards = $this->termsAndConditionsPageHeaderContentCards->skip($key)->first();
                    if($termsAndConditionsPageHeaderContentCards != null){
                        $termsAndConditionsPageHeaderContentCards->update([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $termsAndConditionsPageHeaderContent->id
                        ]);
                    }else{

                        $this->termsAndConditionsPageHeaderContentCards->create([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $termsAndConditionsPageHeaderContent->id
                        ]);

                    }

                }
            }


        }else{



            $termsAndConditionsPageHeaderContent->update([
                'color' => $request->color ,
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $termsAndConditionsPageHeaderContentCards = $this->termsAndConditionsPageHeaderContentCards->skip($key)->first();
                    if($termsAndConditionsPageHeaderContentCards != null){
                        $termsAndConditionsPageHeaderContentCards->update([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $termsAndConditionsPageHeaderContent->id
                        ]);
                    }else{

                        $this->termsAndConditionsPageHeaderContentCards->create([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $termsAndConditionsPageHeaderContent->id
                        ]);

                    }

                }
            }


        }
        return $this->ResponseData(null,'Update Etoy Terms And Conditions Page Header Content Opreation Success',true,200);
    }
    
    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Page Header Content Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $termsAndConditionsPageHeaderContentCards = $this->termsAndConditionsPageHowToEarnPointsCards->find($request->id);
            if(!$termsAndConditionsPageHeaderContentCards){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions Page Header Content Card Opreation Failed',true,400);
            }

            $termsAndConditionsPageHeaderContentCards->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Page Header Content Card Opreation Success',true,200);


        }
    }
}
