<?php

namespace App\Http\Controllers\API\Dashboard\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\AboutPage\AboutThroughOurValues;
use App\Models\AboutPage\AboutThroughOurValuesCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LearnTroughAboutLayoutiController extends Controller
{
    use Response;
    public $aboutThroughOurValues;
    public $aboutThroughOurValuesCard;

    public function __construct()
    {
        $this->aboutThroughOurValues = new AboutThroughOurValues();
        $this->aboutThroughOurValuesCard = new AboutThroughOurValuesCard();
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



        $aboutThroughOurValues = $this->aboutThroughOurValues->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;


        if(!$aboutThroughOurValues){

            $aboutThroughOurValues = $this->aboutThroughOurValues->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/AboutPage/ThroughOurValues/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/AboutPage/ThroughOurValues',$imageName);
                    }

                    $card['nameEn'] != "null" ? $nameEn = $card['nameEn'] : $nameEn = null;
                    $card['nameAr'] != "null" ? $nameAr = $card['nameAr'] : $nameAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;


                    $this->aboutThroughOurValuesCard->create([
                        'nameEn' => $nameEn ,
                        'nameAr' => $nameAr ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'image' => $imageName,
                        'card' => $aboutThroughOurValues->id
                    ]);
                }
            }
        }else{

            $aboutThroughOurValues->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $aboutThroughOurValuesCard = $this->aboutThroughOurValuesCard->skip($key)->first();

                    $card['nameEn'] != "null" ? $nameEn = $card['nameEn'] : $nameEn = null;
                    $card['nameAr'] != "null" ? $nameAr = $card['nameAr'] : $nameAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;


                    if($aboutThroughOurValuesCard != null){

                        if($card['image'] =="null"){
                            if($aboutThroughOurValuesCard->image != null){
                                unlink($aboutThroughOurValuesCard->image);
                            }
                        }else{
                            $imageName = $aboutThroughOurValuesCard->image;
                            if(is_file($card['image'])){
                                if($imageName != null){
                                    unlink($imageName);
                                }
                                $imageName = 'media/AboutPage/ThroughOurValues/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                                $card['image']->move('media/AboutPage/ThroughOurValues',$imageName);
                            }
                        }
                        
                        $aboutThroughOurValuesCard->update([
                            'nameEn' => $nameEn ,
                            'nameAr' => $nameAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $aboutThroughOurValues->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){

                            $imageName = 'media/AboutPage/ThroughOurValues/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/AboutPage/ThroughOurValues',$imageName);
                        }
                        $this->aboutThroughOurValuesCard->create([
                            'nameEn' => $nameEn ,
                            'nameAr' => $nameAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $aboutThroughOurValues->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Through Our Values Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete about Through Our  Values Card Opreation Failed.',false,400);
        }else{
            $aboutThroughOurValuesCard = $this->aboutThroughOurValuesCard->find($request->id);
            if(!$aboutThroughOurValuesCard){
                return $this->ResponseData(null,'Delete about Through Our  Values Card Opreation Failed',true,400);
            }

            if(is_file($aboutThroughOurValuesCard->image)){
                if($aboutThroughOurValuesCard->image != null){
                    unlink($aboutThroughOurValuesCard->image);
                }
            }
            $aboutThroughOurValuesCard->delete();
            return $this->ResponseData(null,'Delete about Through Our  Values Card Opreation Success',true,200);


        }
    }
}
