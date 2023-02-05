<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignLinks;
use App\Models\DaysDesign\DesignLinksCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesignLinksController extends Controller
{
    use Response;
    public $designLinks;
    public $designLinksCards;

    public function __construct()
    {
        $this->designLinks = new DesignLinks();
        $this->designLinksCards = new DesignLinksCards();
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


        $designLinks = $this->designLinks->first();

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 
        $request->linksTitleEn == "null" ? $linksTitleEn = null : $linksTitleEn = $request->linksTitleEn; 
        $request->linksTitleAr == "null" ? $linksTitleAr = null : $linksTitleAr = $request->linksTitleAr; 


        if(!$designLinks){
            $imageName = null;
            $topLeftImageName = null;
            $topRightImageName = null;
            $bottomLeftImageName = null;
            $bottomRightImageName = null;

            if(is_file($request->image)){
                $imageName = 'media/365Design/Links/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/Links',$imageName);
            }
            if(is_file($request->topLeftImage)){
                $topLeftImageName = 'media/365Design/Links/'.time().'-topLeftImage-'.$request->topLeftImage->getClientOriginalName();
                $request->topLeftImage->move('media/365Design/Links',$topLeftImageName);
            }
            if(is_file($request->topRightImage)){
                $topRightImageName = 'media/365Design/Links/'.time().'-topRightImage-'.$request->topRightImage->getClientOriginalName();
                $request->topRightImage->move('media/365Design/Links',$topRightImageName);
            }

            if(is_file($request->bottomLeftImage)){
                $bottomLeftImageName = 'media/365Design/Links/'.time().'-bottomLeftImage-'.$request->bottomLeftImage->getClientOriginalName();
                $request->bottomLeftImage->move('media/365Design/Links',$bottomLeftImageName);
            }
            if(is_file($request->bottomRightImage)){
                $bottomRightImageName = 'media/365Design/Links/'.time().'-bottomRightImage-'.$request->bottomRightImage->getClientOriginalName();
                $request->bottomRightImage->move('media/365Design/Links',$bottomRightImageName);
            }



            $designLinks = $this->designLinks->create([
                'image' => $imageName,
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'topLeftImage' => $topLeftImageName,
                'topRightImage' => $topRightImageName,
                'bottomLeftImage' => $bottomLeftImageName,
                'bottomRightImage' => $bottomRightImageName,
                'linksTitleEn' => $linksTitleEn,
                'linksTitleAr' => $linksTitleAr,
            ]);
        }else{
            $imageName = $designLinks->image;
            $topLeftImageName = $designLinks->topLeftImage;
            $topRightImageName = $designLinks->topRightImage;
            $bottomLeftImageName = $designLinks->bottomLeftImage;
            $bottomRightImageName = $designLinks->bottomRightImage;

            if(is_file($request->image)){
                if($designLinks->image != null){
                    unlink($imageName);
                }
                $imageName = 'media/365Design/Links/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/Links',$imageName);
            }

            if(is_file($request->topLeftImage)){
                if($designLinks->topLeftImage != null){
                    unlink($topLeftImageName);
                }
                $topLeftImageName = 'media/365Design/Links/'.time().'-topLeftImage-'.$request->topLeftImage->getClientOriginalName();
                $request->topLeftImage->move('media/365Design/Links',$topLeftImageName);
            }
            if(is_file($request->topRightImage)){
                if($designLinks->topRightImage != null){
                    unlink($topRightImageName);
                }
                $topRightImageName = 'media/365Design/Links/'.time().'-topRightImage-'.$request->topRightImage->getClientOriginalName();
                $request->topRightImage->move('media/365Design/Links',$topRightImageName);
            }

            if(is_file($request->bottomLeftImage)){
                if($designLinks->bottomLeftImage != null){
                    unlink($bottomLeftImageName);
                }
                $bottomLeftImageName = 'media/365Design/Links/'.time().'-bottomLeftImage-'.$request->bottomLeftImage->getClientOriginalName();
                $request->bottomLeftImage->move('media/365Design/Links',$bottomLeftImageName);
            }
            if(is_file($request->bottomRightImage)){
                if($designLinks->bottomRightImage != null){
                    unlink($bottomRightImageName);
                }
                $bottomRightImageName = 'media/365Design/Links/'.time().'-bottomRightImage-'.$request->bottomRightImage->getClientOriginalName();
                $request->bottomRightImage->move('media/365Design/Links',$bottomRightImageName);
            }

            $designLinks->update([
                'image' => $imageName,
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'topLeftImage' => $topLeftImageName,
                'topRightImage' => $topRightImageName,
                'bottomLeftImage' => $bottomLeftImageName,
                'bottomRightImage' => $bottomRightImageName,
                'linksTitleEn' => $linksTitleEn,
                'linksTitleAr' => $linksTitleAr,
            ]);
        }


        if($cards_count > 0){
            foreach($cards as $key => $card){

                $designLinksCards = $this->designLinksCards->skip($key)->first();

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn']; 
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr']; 
                $card['link'] == "null" ? $link = null : $link = $card['link']; 

                if($designLinksCards != null){


                    $designLinksCards->update([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'link' => $link,
                        'card' => $designLinks->id,
                    ]);
                }
                else{

                    $designLinksCards = $this->designLinksCards->create([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'link' => $link,
                        'card' => $designLinks->id,
                    ]);
                }



            }
        }
        return $this->ResponseData(null,'Update 365Design Links Opreation Success',true,200);
    }

    public function deleteCard(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete 365Design Links Card Opreation Failed.',false,400);
        }else{
            $designLinksCards = $this->designLinksCards->find($request->id);
            if(!$designLinksCards){
                return $this->ResponseData(null,'Delete 365Design Links Card Opreation Failed',true,400);
            }

            $designLinksCards->delete();
            return $this->ResponseData(null,'Delete 365Design Links Card Opreation Success',true,200);
        }
    }
}
