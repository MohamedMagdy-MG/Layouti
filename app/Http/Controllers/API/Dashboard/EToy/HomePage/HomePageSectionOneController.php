<?php

namespace App\Http\Controllers\API\Dashboard\EToy\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\HomePage\HomePageSecitonOne;
use App\Models\EToy\HomePage\HomePageSecitonOneCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomePageSectionOneController extends Controller
{
    use Response;
    public $homePageSecitonOne;
    public $homePageSecitonOneCards;

    public function __construct()
    {
        $this->homePageSecitonOne = new HomePageSecitonOne();
        $this->homePageSecitonOneCards = new HomePageSecitonOneCards();
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



        $homePageSecitonOne = $this->homePageSecitonOne->first();
        if(!$homePageSecitonOne){


            $homePageSecitonOne = $this->homePageSecitonOne->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $iconName = null;
                    if(array_key_exists('icon',$card)){
                        if(is_file($card['icon'])){
                            $iconName = 'media/EToy/HomePage/SecionOne/'.time().'-'.$card['icon']->getClientOriginalName();
                            $card['icon']->move('media/EToy/HomePage/SecionOne',$iconName);
                        }
                    }
                    $this->homePageSecitonOneCards->create([
                        'icon' => $iconName,
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,
                        'descriptionEn' => $card['descriptionEn'] ,
                        'descriptionAr' => $card['descriptionAr'] ,
                        'card' => $homePageSecitonOne->id
                    ]);
                }
            }
        }else{



            $homePageSecitonOne->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $homePageSecitonOneCards = $this->homePageSecitonOneCards->skip($key)->first();
                    if($homePageSecitonOneCards != null){


                        $iconName = $homePageSecitonOneCards->icon;
                        if(array_key_exists('icon',$card)){
                            if(is_file($card['icon'])){
                                if($homePageSecitonOneCards->icon != null){
                                    unlink($homePageSecitonOneCards->icon);
                                }
                                $iconName = 'media/EToy/HomePage/SecionOne/'.time().'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/EToy/HomePage/SecionOne',$iconName);
                            }
                        }
                        $homePageSecitonOneCards->update([
                            'icon' => $iconName,
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $homePageSecitonOne->id
                        ]);
                    }else{
                        $iconName = null;
                        if(array_key_exists('icon',$card)){
                            if(is_file($card['icon'])){
                                $iconName = 'media/EToy/HomePage/SecionOne/'.time().'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/EToy/HomePage/SecionOne',$iconName);
                            }
                        }
                        $this->homePageSecitonOneCards->create([
                            'icon' => $iconName,
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $homePageSecitonOne->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy Home Page Section One Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Home Page Section One Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $homePageSecitonOneCards = $this->homePageSecitonOneCards->find($request->id);
            if(!$homePageSecitonOneCards){
                return $this->ResponseData(null,'Delete Etoy Home Page Section One Card Opreation Failed',true,400);
            }


            if($homePageSecitonOneCards->icon != null){
                unlink($homePageSecitonOneCards->icon);
            }

            $homePageSecitonOneCards->delete();
            return $this->ResponseData(null,'Delete Etoy Home Page Section One Card Opreation Success',true,200);


        }
    }
}
