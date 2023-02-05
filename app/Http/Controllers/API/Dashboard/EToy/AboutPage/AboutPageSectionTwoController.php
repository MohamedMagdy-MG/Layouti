<?php

namespace App\Http\Controllers\API\Dashboard\EToy\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\AboutPage\AboutPageSecitonTwo;
use App\Models\EToy\AboutPage\AboutPageSecitonTwoCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AboutPageSectionTwoController extends Controller
{
    use Response;
    public $aboutPageSecitonTwo;
    public $aboutPageSecitonTwoCards;

    public function __construct()
    {
        $this->aboutPageSecitonTwo = new AboutPageSecitonTwo();
        $this->aboutPageSecitonTwoCards = new AboutPageSecitonTwoCards();
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



        $aboutPageSecitonTwo = $this->aboutPageSecitonTwo->first();
        if(!$aboutPageSecitonTwo){

            $aboutPageSecitonTwo = $this->aboutPageSecitonTwo->create([
                'titleOneEn' => $request->titleOneEn ,
                'titleOneAr' => $request->titleOneAr ,
                'titleTwoEn' => $request->titleTwoEn ,
                'titleTwoAr' => $request->titleTwoAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $iconName = null;
                    if(array_key_exists('icon',$card)){
                        if(is_file($card['icon'])){
                            $iconName = 'media/EToy/AboutPage/SectionTwo/'.time().'-'.$card['icon']->getClientOriginalName();
                            $card['icon']->move('media/EToy/AboutPage/SectionTwo',$iconName);
                        }
                    }
                    $this->aboutPageSecitonTwoCards->create([
                        'icon' => $iconName,
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,
                        'descriptionEn' => $card['descriptionEn'] ,
                        'descriptionAr' => $card['descriptionAr'] ,
                        'card' => $aboutPageSecitonTwo->id
                    ]);
                }
            }
        }else{



            $aboutPageSecitonTwo->update([
                'titleOneEn' => $request->titleOneEn ,
                'titleOneAr' => $request->titleOneAr ,
                'titleTwoEn' => $request->titleTwoEn ,
                'titleTwoAr' => $request->titleTwoAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $aboutPageSecitonTwoCards = $this->aboutPageSecitonTwoCards->skip($key)->first();
                    if($aboutPageSecitonTwoCards != null){


                        $iconName = $aboutPageSecitonTwoCards->icon;
                        if(array_key_exists('icon',$card)){
                            if(is_file($card['icon'])){
                                if($aboutPageSecitonTwoCards->icon != null){
                                    unlink($aboutPageSecitonTwoCards->icon);
                                }
                                $iconName = 'media/EToy/AboutPage/SectionTwo/'.time().'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/EToy/AboutPage/SectionTwo',$iconName);
                            }
                        }
                        $aboutPageSecitonTwoCards->update([
                            'icon' => $iconName,
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $aboutPageSecitonTwo->id
                        ]);
                    }else{
                        $iconName = null;
                        if(array_key_exists('icon',$card)){
                            if(is_file($card['icon'])){
                                $iconName = 'media/EToy/AboutPage/SectionTwo/'.time().'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/EToy/AboutPage/SectionTwo',$iconName);
                            }
                        }
                        $this->aboutPageSecitonTwoCards->create([
                            'icon' => $iconName,
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $aboutPageSecitonTwo->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy About Page Section Two Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy About Page Section Two Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $aboutPageSecitonTwoCards = $this->aboutPageSecitonTwoCards->find($request->id);
            if(!$aboutPageSecitonTwoCards){
                return $this->ResponseData(null,'Delete Etoy About Page Section Two Card Opreation Failed',true,400);
            }


            if($aboutPageSecitonTwoCards->icon != null){
                unlink($aboutPageSecitonTwoCards->icon);
            }

            $aboutPageSecitonTwoCards->delete();
            return $this->ResponseData(null,'Delete Etoy About Page Section Two Card Opreation Success',true,200);


        }
    }
}
