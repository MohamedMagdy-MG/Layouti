<?php

namespace App\Http\Controllers\API\Dashboard\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\AboutPage\AboutCheckOutOurClients;
use App\Models\AboutPage\AboutCheckOutOurClientsCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LearnCheckOutOurClientsController extends Controller
{
    use Response;
    public $aboutCheckOutOurClients;
    public $aboutCheckOutOurClientsCard;

    public function __construct()
    {
        $this->aboutCheckOutOurClients = new AboutCheckOutOurClients();
        $this->aboutCheckOutOurClientsCard = new AboutCheckOutOurClientsCard();
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



        $aboutCheckOutOurClients = $this->aboutCheckOutOurClients->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;


        if(!$aboutCheckOutOurClients){

            $aboutCheckOutOurClients = $this->aboutCheckOutOurClients->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/AboutPage/CheckOutOurClients/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/AboutPage/CheckOutOurClients',$imageName);
                    }

                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;
                    $card['industryEn'] != "null" ? $industryEn = $card['industryEn'] : $industryEn = null;
                    $card['industryAr'] != "null" ? $industryAr = $card['industryAr'] : $industryAr = null;

                    $this->aboutCheckOutOurClientsCard->create([
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'industryEn' => $industryEn ,
                        'industryAr' => $industryAr ,
                        'image' => $imageName,
                        'card' => $aboutCheckOutOurClients->id
                    ]);
                }
            }
        }else{

            $aboutCheckOutOurClients->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $aboutCheckOutOurClientsCard = $this->aboutCheckOutOurClientsCard->skip($key)->first();
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;
                    $card['industryEn'] != "null" ? $industryEn = $card['industryEn'] : $industryEn = null;
                    $card['industryAr'] != "null" ? $industryAr = $card['industryAr'] : $industryAr = null;

                    if($aboutCheckOutOurClientsCard != null){

                        if($card['image'] == "null"){
                            $imageName = null;
                            if($aboutCheckOutOurClientsCard->image != null){
                                unlink($aboutCheckOutOurClientsCard->image);
                            }
                        }
                        else{
                            $imageName = $aboutCheckOutOurClientsCard->image;
                            if(is_file($card['image'])){
                                if($imageName != null){
                                    unlink($imageName);
                                }
                                $imageName = 'media/AboutPage/CheckOutOurClients/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                                $card['image']->move('media/AboutPage/CheckOutOurClients',$imageName);
                            }
                        }
                        
                        $aboutCheckOutOurClientsCard->update([
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'industryEn' => $industryEn ,
                            'industryAr' => $industryAr ,
                            'image' => $imageName,
                            'card' => $aboutCheckOutOurClients->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){

                            $imageName = 'media/AboutPage/CheckOutOurClients/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/AboutPage/CheckOutOurClients',$imageName);
                        }
                        $this->aboutCheckOutOurClientsCard->create([
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'industryEn' => $industryEn ,
                            'industryAr' => $industryAr ,
                            'image' => $imageName,
                            'card' => $aboutCheckOutOurClients->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Check Out Our Clients Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete about Check Out Our Clients Card Opreation Failed.',false,400);
        }else{
            $aboutCheckOutOurClientsCard = $this->aboutCheckOutOurClientsCard->find($request->id);
            if(!$aboutCheckOutOurClientsCard){
                return $this->ResponseData(null,'Delete about Check Out Our Clients Card Opreation Failed',true,400);
            }

            if(is_file($aboutCheckOutOurClientsCard->image)){
                if($aboutCheckOutOurClientsCard->image != null){
                    unlink($aboutCheckOutOurClientsCard->image);
                }
            }
            
            $aboutCheckOutOurClientsCard->delete();
            return $this->ResponseData(null,'Delete about Check Out Our Clients Card Opreation Success',true,200);


        }
    }
}
