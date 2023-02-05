<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\HomePage\WhatWeWillServe;
use App\Models\HomePage\WhatWeWillServe_Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhatWeWillServeController extends Controller
{
    use Response;
    public $whatWeWillServe;
    public $whatWeWillServeCard;

    public function __construct()
    {
        $this->whatWeWillServe = new WhatWeWillServe();
        $this->whatWeWillServeCard = new WhatWeWillServe_Cards();
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



        $whatWeWillServe = $this->whatWeWillServe->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$whatWeWillServe){

            $whatWeWillServe = $this->whatWeWillServe->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/HomePage/WhatWeWillServe/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/HomePage/WhatWeWillServe',$imageName);
                    }

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                    $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr'];

                    $this->whatWeWillServeCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'image' => $imageName,
                        'card' => $whatWeWillServe->id
                    ]);
                }
            }
        }else{

            $whatWeWillServe->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $whatWeWillServeCard = $this->whatWeWillServeCard->skip($key)->first();

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                    $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr'];

                    if($whatWeWillServeCard != null){

                        if($card['image'] == "null"){
                            $imageName = null;
                            if($whatWeWillServeCard->image != null){
                                unlink($whatWeWillServeCard->image);
                            }
                        }else{
                            $imageName = $whatWeWillServeCard->image;
                            if(is_file($card['image'])){
                                if($imageName != null){
                                    unlink($imageName);
                                }
                                $imageName = 'media/HomePage/WhatWeWillServe/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                                $card['image']->move('media/HomePage/WhatWeWillServe',$imageName);
                            }
                        }

                        
                        $whatWeWillServeCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $whatWeWillServe->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){
                            $imageName = 'media/HomePage/WhatWeWillServe/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/HomePage/WhatWeWillServe',$imageName);
                        }
                        $this->whatWeWillServeCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $whatWeWillServe->id
                        ]);
                    }
                }
            }
        }
        return $this->ResponseData(null,'Update What We Will Serve Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete What We Will Serve Card Opreation Failed.',false,400);
        }else{
            $whatWeWillServeCard = $this->whatWeWillServeCard->find($request->id);
            if(!$whatWeWillServeCard){
                return $this->ResponseData(null,'Delete What We Will Serve Card Opreation Failed',true,400);
            }

            if(is_file($whatWeWillServeCard->image)){
                if($whatWeWillServeCard->image != null){
                    unlink($whatWeWillServeCard->image);
                }
            }
            $whatWeWillServeCard->delete();
            return $this->ResponseData(null,'Delete What We Will Serve Card Opreation Success',true,200);


        }
    }
}
