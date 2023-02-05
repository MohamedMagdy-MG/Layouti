<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignproductsStatic;
use App\Models\DaysDesign\DesignproductsStaticCards;
use App\Models\DaysDesign\DesignproductsStaticCardsOfCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignProductsStaticController extends Controller
{
    use Response;
    public $designproductsStatic;
    public $designproductsStaticCards;
    public $designproductsStaticCardsOfCards;

    public function __construct()
    {
        $this->designproductsStatic = new DesignproductsStatic();
        $this->designproductsStaticCards = new DesignproductsStaticCards();
        $this->designproductsStaticCardsOfCards = new DesignproductsStaticCardsOfCards();
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


        $designproductsStatic = $this->designproductsStatic->first();
        if(!$designproductsStatic){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/365Design/ProductsStatic/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/ProductsStatic',$imageName);
            }
            $designproductsStatic = $this->designproductsStatic->create([
                'image' => $imageName
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($designproductsStatic->image){
                    unlink($designproductsStatic->image);
                }
            }
            else{
                $imageName = $designproductsStatic->image;
                if(is_file($request->image)){
                    if($designproductsStatic->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/365Design/ProductsStatic/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/365Design/ProductsStatic',$imageName);
                }
            }
            $designproductsStatic->update([
                'image' => $imageName
            ]);
        }


        if($cards_count > 0){
            foreach($cards as $key => $card){

                $cardsOfCards_count  = 0 ;
                $cardsOfCards = [];
                if(array_key_exists('cards',$card)){
                    $cardsOfCards_count   = count($card['cards']);
                    $cardsOfCards  = $card['cards'];
                }

                $designproductsStaticCards = $this->designproductsStaticCards->where('card',$designproductsStatic->id)->skip($key)->first();
                if($designproductsStaticCards != null){

                    
                    

                    if($card['logo'] == "null"){
                        $logoName = null;
                        if($designproductsStaticCards->logo){
                            unlink($designproductsStaticCards->logo);
                        }
                    }
                    else{
                        $logoName = $designproductsStaticCards->logo;
                        if(is_file($card['logo'])){
                            if($designproductsStaticCards->logo){
                                unlink($logoName);
                            }
                            $logoName = 'media/365Design/ProductsStaticCards/'.time().'-logo-'.$card['logo']->getClientOriginalName();
                            $card['logo']->move('media/365Design/ProductsStaticCards',$logoName);
                        }
                    }

                    if($card['slide'] == "null"){
                        $slideName = null;
                        if($designproductsStaticCards->slide){
                            unlink($designproductsStaticCards->slide);
                        }
                    }
                    else{
                        $slideName = $designproductsStaticCards->slide;
                        if(is_file($card['slide'])){
                            if($designproductsStaticCards->slide){
                                unlink($slideName);
                            }
                            $slideName = 'media/365Design/ProductsStaticCards/'.time().'-slide-'.$card['slide']->getClientOriginalName();
                            $card['slide']->move('media/365Design/ProductsStaticCards',$slideName);
                        }
                        
                    }
                    

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn']; 
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr']; 
                    $card['subTitleEn'] == "null" ? $subTitleEn = null : $subTitleEn = $card['subTitleEn']; 
                    $card['subTitleAr'] == "null" ? $subTitleAr = null : $subTitleAr = $card['subTitleAr']; 
                    $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn']; 
                    $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr']; 
                    $card['reviewLink'] == "null" ? $reviewLink = null : $reviewLink = $card['reviewLink']; 
                    $card['downloadLink'] == "null" ? $downloadLink = null : $downloadLink = $card['downloadLink']; 

                    $designproductsStaticCards->update([
                        'logo' => $logoName,
                        'slide' => $slideName,
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'subTitleEn' => $subTitleEn,
                        'subTitleAr' => $subTitleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'reviewLink' => $reviewLink,
                        'downloadLink' => $downloadLink,
                        'card' => $designproductsStatic->id,
                    ]);
                }
                else{
                    $logoName = null;
                    $slideName = null;
                    if(is_file($card['logo'])){

                        $logoName = 'media/365Design/ProductsStaticCards/'.time().'-logo-'.$card['logo']->getClientOriginalName();
                        $card['logo']->move('media/365Design/ProductsStaticCards',$logoName);
                    }
                    if(is_file($card['slide'])){

                        $slideName = 'media/365Design/ProductsStaticCards/'.time().'-slide-'.$card['slide']->getClientOriginalName();
                        $card['slide']->move('media/365Design/ProductsStaticCards',$slideName);
                    }

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn']; 
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr']; 
                    $card['subTitleEn'] == "null" ? $subTitleEn = null : $subTitleEn = $card['subTitleEn']; 
                    $card['subTitleAr'] == "null" ? $subTitleAr = null : $subTitleAr = $card['subTitleAr']; 
                    $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn']; 
                    $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr']; 
                    $card['reviewLink'] == "null" ? $reviewLink = null : $reviewLink = $card['reviewLink']; 
                    $card['downloadLink'] == "null" ? $downloadLink = null : $downloadLink = $card['downloadLink']; 


                    $designproductsStaticCards = $this->designproductsStaticCards->create([
                        'logo' => $logoName,
                        'slide' => $slideName,
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'subTitleEn' => $subTitleEn,
                        'subTitleAr' => $subTitleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'reviewLink' => $reviewLink,
                        'downloadLink' => $downloadLink,
                        'card' => $designproductsStatic->id,
                    ]);
                }

                if($cardsOfCards_count > 0){
                    foreach($cardsOfCards as $key => $cardsOfCard){
                        $designproductsStaticCardsOfCards = $this->designproductsStaticCardsOfCards->where('card',$designproductsStaticCards->id)->skip($key)->first();

                        $cardsOfCard['titleEn'] == "null" ? $titleEn = null : $titleEn = $cardsOfCard['titleEn']; 
                        $cardsOfCard['titleAr'] == "null" ? $titleAr = null : $titleAr = $cardsOfCard['titleAr']; 
                        $cardsOfCard['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $cardsOfCard['descriptionEn']; 
                        $cardsOfCard['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $cardsOfCard['descriptionAr']; 



                        if($designproductsStaticCardsOfCards != null){

                            $designproductsStaticCardsOfCards->update([
                                'titleEn' => $titleEn,
                                'titleAr' => $titleAr,
                                'descriptionEn'  => $descriptionEn,
                                'descriptionAr'  => $descriptionAr,
                                'card' => $designproductsStaticCards->id,
                            ]);
                        }
                        else{

                            $designproductsStaticCardsOfCards = $this->designproductsStaticCardsOfCards->create([
                                'titleEn' => $titleEn,
                                'titleAr' => $titleAr,
                                'descriptionEn'  => $descriptionEn,
                                'descriptionAr'  => $descriptionAr,
                                'card' => $designproductsStaticCards->id,
                            ]);
                        }
                    }
                }


            }
        }
        return $this->ResponseData(null,'Update 365Design Products Static Opreation Success',true,200);
    }

    public function deleteCardOfCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete 365Design Products Static Card Of Card Opreation Failed.',false,400);
        }else{
            $designproductsStaticCardsOfCards = $this->designproductsStaticCardsOfCards->find($request->id);
            if(!$designproductsStaticCardsOfCards){
                return $this->ResponseData(null,'Delete 365Design Products Static Card Of Card Opreation Failed',true,400);
            }

            $designproductsStaticCardsOfCards->delete();
            return $this->ResponseData(null,'Delete 365Design Products Static Card Of Card Opreation Success',true,200);
        }
    }

    public function deleteCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete 365Design Products Static Card Opreation Failed.',false,400);
        }else{
            $designproductsStaticCards = $this->designproductsStaticCards->find($request->id);
            if(!$designproductsStaticCards){
                return $this->ResponseData(null,'Delete 365Design Products Static Card Opreation Failed',true,400);
            }

            if($designproductsStaticCards->logo != null){
                unlink($designproductsStaticCards->logo);
            }

            if($designproductsStaticCards->slide != null){
                unlink($designproductsStaticCards->slide);
            }

            $designproductsStaticCards->delete();
            return $this->ResponseData(null,'Delete 365Design Products Static Card Opreation Success',true,200);
        }
    }
}
