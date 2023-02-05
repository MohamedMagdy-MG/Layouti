<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIWhatOffer;
use App\Models\LearnUI\LearnUIWhatOfferPoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhatOfferController extends Controller
{
    use Response;
    public $LearnUIWhatOffer;
    public $LearnUIWhatOfferPoints;

    public function __construct()
    {
        $this->LearnUIWhatOffer = new LearnUIWhatOffer();
        $this->LearnUIWhatOfferPoints = new LearnUIWhatOfferPoints();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $LearnUIWhatOffer = $this->LearnUIWhatOffer->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->subTitleEn != "null" ? $subTitleEn = $request->subTitleEn : $subTitleEn = null;
        $request->subTitleAr != "null" ? $subTitleAr = $request->subTitleAr : $subTitleAr = null;



        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }
        if(!$LearnUIWhatOffer){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/LearnUI/WhatOffer/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/WhatOffer',$imageName);
            }
            $LearnUIWhatOffer = $this->LearnUIWhatOffer->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'image' => $imageName
            ]);


            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $card['pointEn'] != "null" ? $pointEn = $card['pointEn'] : $pointEn = null;
                    $card['pointAr'] != "null" ? $pointAr = $card['pointAr'] : $pointAr = null;

                    $this->LearnUIWhatOfferPoints->create([
                        'pointEn' => $pointEn,
                        'pointAr' => $pointAr,
                        'card' => $LearnUIWhatOffer->id
                    ]);
                }
            }

        }else{

            $request->image != "null" ? $imageName = $LearnUIWhatOffer->image : $imageName = null;
            if($imageName == "null"){
                unlink($LearnUIWhatOffer->image);
            }
            if(is_file($request->image)){
                if($LearnUIWhatOffer->image){
                    unlink($imageName);
                }
                $imageName = 'media/LearnUI/WhatOffer/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/WhatOffer',$imageName);
            }
            $LearnUIWhatOffer->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'image' => $imageName
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $LearnUIWhatOfferPoints = $this->LearnUIWhatOfferPoints->skip($key)->first();

                    $card['pointEn'] != "null" ? $pointEn = $card['pointEn'] : $pointEn = null;
                    $card['pointAr'] != "null" ? $pointAr = $card['pointAr'] : $pointAr = null;

                    if($LearnUIWhatOfferPoints != null){

                        $LearnUIWhatOfferPoints->update([
                            'pointEn' => $pointEn ,
                            'pointAr' => $pointAr ,
                            'card' => $LearnUIWhatOffer->id
                        ]);
                    }else{

                        $this->LearnUIWhatOfferPoints->create([
                            'pointEn' => $pointEn ,
                            'pointAr' => $pointAr ,
                            'card' => $LearnUIWhatOffer->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI What Offer Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI What Offer Point Opreation Failed.',false,400,$validator->errors());
        }else{
            $LearnUIWhatOfferPoints = $this->LearnUIWhatOfferPoints->find($request->id);
            if(!$LearnUIWhatOfferPoints){
                return $this->ResponseData(null,'Delete LearnUI What Offer Point Opreation Failed',true,400);
            }
            $LearnUIWhatOfferPoints->delete();
            return $this->ResponseData(null,'Delete LearnUI What Offer Point Opreation Success',true,400);


        }
    }
}
