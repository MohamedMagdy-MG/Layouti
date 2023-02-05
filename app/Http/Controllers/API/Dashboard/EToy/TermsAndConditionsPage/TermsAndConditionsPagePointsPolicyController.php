<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPagePointsPolicy;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPagePointsPolicyCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermsAndConditionsPagePointsPolicyController extends Controller
{
    use Response;
    public $TermsAndConditionsPagePointsPolicy;
    public $TermsAndConditionsPagePointsPolicyCards;

    public function __construct()
    {
        $this->TermsAndConditionsPagePointsPolicy = new TermsAndConditionsPagePointsPolicy();
        $this->TermsAndConditionsPagePointsPolicyCards = new TermsAndConditionsPagePointsPolicyCards();
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



        $TermsAndConditionsPagePointsPolicy = $this->TermsAndConditionsPagePointsPolicy->first();
        if(!$TermsAndConditionsPagePointsPolicy){
            $TermsAndConditionsPagePointsPolicy = $this->TermsAndConditionsPagePointsPolicy->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $this->TermsAndConditionsPagePointsPolicyCards->create([
                        'descriptionEn' => $card['descriptionEn'] ,
                        'descriptionAr' => $card['descriptionAr'] ,
                        'card' => $TermsAndConditionsPagePointsPolicy->id
                    ]);
                }
            }
        }else{

            $TermsAndConditionsPagePointsPolicy->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $TermsAndConditionsPagePointsPolicyCards = $this->TermsAndConditionsPagePointsPolicyCards->skip($key)->first();
                    if($TermsAndConditionsPagePointsPolicyCards != null){
                        $TermsAndConditionsPagePointsPolicyCards->update([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $TermsAndConditionsPagePointsPolicy->id
                        ]);
                    }else{

                        $this->TermsAndConditionsPagePointsPolicyCards->create([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $TermsAndConditionsPagePointsPolicy->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy Terms And Conditions Points Policy Page Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Points Policy Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $TermsAndConditionsPagePointsPolicyCards = $this->TermsAndConditionsPagePointsPolicyCards->find($request->id);
            if(!$TermsAndConditionsPagePointsPolicyCards){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions Points Policy Card Opreation Failed',true,400);
            }

            $TermsAndConditionsPagePointsPolicyCards->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Points Policy Card Opreation Success',true,200);


        }
    }
}
