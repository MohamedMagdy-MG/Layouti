<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\HomePage\NeedLayoutiForYourProject;
use App\Models\HomePage\NeedLayoutiForYourProject_Cards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NeedLayoutiForYourProjectController extends Controller
{
    use Response;
    public $needLayoutiForYourProject;
    public $needLayoutiForYourProjectCard;

    public function __construct()
    {
        $this->needLayoutiForYourProject = new NeedLayoutiForYourProject();
        $this->needLayoutiForYourProjectCard = new NeedLayoutiForYourProject_Cards();
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



        $needLayoutiForYourProject = $this->needLayoutiForYourProject->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$needLayoutiForYourProject){

            $needLayoutiForYourProject = $this->needLayoutiForYourProject->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;

                    $card['titleEn'] == "null" ? $titleEn =null :  $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr =  $card['titleAr'];
                    $card['descriptionEn'] == "null" ? $descriptionEn = null :  $descriptionEn = $card['descriptionEn'];
                    $card['descriptionAr'] == "null" ? $descriptionAr = null :  $descriptionAr = $card['descriptionAr'];
                    

                    if(is_file($card['image'])){
                        $imageName = 'media/HomePage/NeedLayoutiForYourProject/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/HomePage/NeedLayoutiForYourProject',$imageName);
                    }
                    $this->needLayoutiForYourProjectCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'image' => $imageName,
                        'card' => $needLayoutiForYourProject->id
                    ]);
                }
            }
        }else{

            $needLayoutiForYourProject->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $needLayoutiForYourProjectCard = $this->needLayoutiForYourProjectCard->skip($key)->first();

                    $card['titleEn'] == "null" ? $titleEn =null :  $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr =  $card['titleAr'];
                    $card['descriptionEn'] == "null" ? $descriptionEn = null :  $descriptionEn = $card['descriptionEn'];
                    $card['descriptionAr'] == "null" ? $descriptionAr = null :  $descriptionAr = $card['descriptionAr'];

                    if($needLayoutiForYourProjectCard != null){

                        if($card['image'] == "null"){
                            $imageName = null;
                            if($needLayoutiForYourProjectCard->image != null){
                                unlink($needLayoutiForYourProjectCard->image);
                            }
                        }else{
                            $imageName = $needLayoutiForYourProjectCard->image;
                            if(is_file($card['image'])){
                                if($imageName != null){
                                    unlink($imageName);
                                }
                                $imageName = 'media/HomePage/NeedLayoutiForYourProject/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                                $card['image']->move('media/HomePage/NeedLayoutiForYourProject',$imageName);
                            }
                        }
                        
                        $needLayoutiForYourProjectCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $needLayoutiForYourProject->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){

                            $imageName = 'media/HomePage/NeedLayoutiForYourProject/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/HomePage/NeedLayoutiForYourProject',$imageName);
                        }
                        $this->needLayoutiForYourProjectCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'image' => $imageName,
                            'card' => $needLayoutiForYourProject->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Need Layouti For Your Project Opreation Success',true,200);
    }


    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Need Layouti For Your Project Card Opreation Failed.',false,400);
        }else{
            $needLayoutiForYourProjectCard = $this->needLayoutiForYourProjectCard->find($request->id);
            if(!$needLayoutiForYourProjectCard){
                return $this->ResponseData(null,'Delete Need Layouti For Your Project Card Opreation Failed',true,400);
            }

            if(is_file($needLayoutiForYourProjectCard->image)){
                if($needLayoutiForYourProjectCard->image != null){
                    unlink($needLayoutiForYourProjectCard->image);
                }
            }
            $needLayoutiForYourProjectCard->delete();
            return $this->ResponseData(null,'Delete Need Layouti For Your Project Card Opreation Success',true,400);


        }
    }
}
