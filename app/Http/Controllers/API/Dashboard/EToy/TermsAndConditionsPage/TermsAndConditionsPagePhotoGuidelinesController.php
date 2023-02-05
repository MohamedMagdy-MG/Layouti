<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPagePhotoGuidelines;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPagePhotoGuidelinesCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TermsAndConditionsPagePhotoGuidelinesController extends Controller
{
    use Response;
    public $TermsAndConditionsPagePhotoGuidelines;
    public $TermsAndConditionsPagePhotoGuidelinesCards;

    public function __construct()
    {
        $this->TermsAndConditionsPagePhotoGuidelines = new TermsAndConditionsPagePhotoGuidelines();
        $this->TermsAndConditionsPagePhotoGuidelinesCards = new TermsAndConditionsPagePhotoGuidelinesCards();
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



        $TermsAndConditionsPagePhotoGuidelines = $this->TermsAndConditionsPagePhotoGuidelines->first();
        if(!$TermsAndConditionsPagePhotoGuidelines){
            $TermsAndConditionsPagePhotoGuidelines = $this->TermsAndConditionsPagePhotoGuidelines->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'subTitleEn' => $request->subTitleEn ,
                'subTitleAr' => $request->subTitleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $this->TermsAndConditionsPagePhotoGuidelinesCards->create([
                        'descriptionEn' => $card['descriptionEn'] ,
                        'descriptionAr' => $card['descriptionAr'] ,
                        'card' => $TermsAndConditionsPagePhotoGuidelines->id
                    ]);
                }
            }
        }else{

            $TermsAndConditionsPagePhotoGuidelines->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'subTitleEn' => $request->subTitleEn ,
                'subTitleAr' => $request->subTitleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $TermsAndConditionsPagePhotoGuidelinesCards = $this->TermsAndConditionsPagePhotoGuidelinesCards->skip($key)->first();
                    if($TermsAndConditionsPagePhotoGuidelinesCards != null){
                        $TermsAndConditionsPagePhotoGuidelinesCards->update([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $TermsAndConditionsPagePhotoGuidelines->id
                        ]);
                    }else{

                        $this->TermsAndConditionsPagePhotoGuidelinesCards->create([
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $TermsAndConditionsPagePhotoGuidelines->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy Terms And Conditions Photo Guidelines Page Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Photo Guidelines Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $TermsAndConditionsPagePhotoGuidelinesCards = $this->TermsAndConditionsPagePhotoGuidelinesCards->find($request->id);
            if(!$TermsAndConditionsPagePhotoGuidelinesCards){
                return $this->ResponseData(null,'Delete Etoy Terms And Conditions Photo Guidelines Card Opreation Failed',true,400);
            }

            $TermsAndConditionsPagePhotoGuidelinesCards->delete();
            return $this->ResponseData(null,'Delete Etoy Terms And Conditions Photo Guidelines Card Opreation Success',true,200);


        }
    }
}
