<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductBodyBranding;
use App\Models\ProductPage\ProductBodyBrandingImages;
use App\Models\ProductPage\ProductGeneralInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandingController extends Controller
{
    use Response;

    public $productBodyBranding;
    public $productBodyBrandingImages;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productBodyBranding = new ProductBodyBranding();
        $this->productBodyBrandingImages = new ProductBodyBrandingImages();
    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        $BodyBrandingCards_count = 0;
        $BodyBrandingCards = [];
        if($request->has('cards')){
            $BodyBrandingCards_count   = count($request->cards);
            $BodyBrandingCards  = $request->cards;
        }

        
        if($BodyBrandingCards_count > 0){
            $this->addProductBodyBranding($BodyBrandingCards,$BodyBrandingCards_count,$productGeneralInformation->id);
        }
        
        $BodyBrandingImagesCards_count = 0;
        $BodyBrandingImagesCards = [];

        if($request->has('Images')){
            $BodyBrandingImagesCards_count   = count($request->Images);
            $BodyBrandingImagesCards  = $request->Images;
        }
        if($BodyBrandingImagesCards_count > 0){
            $this->addProductBodyBrandingImages($BodyBrandingImagesCards,$BodyBrandingImagesCards_count,$productGeneralInformation->id);
        }
        
        

        
        return $this->ResponseData(null,'Save Project Branding Body Section Operation Success',true,200);


    }

    public function addProductBodyBranding($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productBodyBranding = $this->productBodyBranding->where('project',$project)->skip($key)->first();

                $card['titleEn'] == "null" ?  $titleEn = null : $titleEn = $card['titleEn'];
                $card['titleAr'] == "null" ?  $titleAr = null : $titleAr = $card['titleAr'];
                $card['descriptionEn'] == "null" ?  $descriptionEn = null : $descriptionEn = $card['descriptionEn'];
                $card['descriptionAr'] == "null" ?  $descriptionAr = null : $descriptionAr = $card['descriptionAr'];
                if($productBodyBranding != null){
                    $productBodyBranding->update([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'project' => $project
                    ]);
                }
                else{
                    $this->productBodyBranding->create([
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function addProductBodyBrandingImages($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productBodyBrandingImages = $this->productBodyBrandingImages->where('project',$project)->skip($key)->first();
                if($productBodyBrandingImages != null){

                    $imageName = $productBodyBrandingImages->image;
                    if(is_file($card['image'])){
                        if($productBodyBrandingImages->image != null){
                            unlink($productBodyBrandingImages->image);
                        }
                        $imageName = 'media/ProductPage/BodyBrandingImagesCards/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/BodyBrandingImagesCards',$imageName);
                    }
                    $productBodyBrandingImages->update([
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }
                else{

                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/ProductPage/BodyBrandingImagesCards/'.time().'-image-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/ProductPage/BodyBrandingImagesCards',$imageName);
                    }
                    $this->productBodyBrandingImages->create([
                        'image' => $imageName,
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function DeleteProductBodyBranding(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Body Branding Operation Failed',false,400,$validator->errors());
        }else{
            $productBodyBranding = $this->productBodyBranding->find($request->id);
            if($productBodyBranding == null){
                return $this->ResponseData(null,'Product Body Branding Not Found',false,400);
            }
            $productBodyBranding->delete();
            return $this->ResponseData(null,'Delete Product Body Branding Operation success',true,200);

        }
    }

    public function DeleteProductBodyBrandingImage(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Body Branding Image Operation Failed',false,400,$validator->errors());
        }else{
            $productBodyBrandingImages = $this->productBodyBrandingImages->find($request->id);
            if($productBodyBrandingImages == null){
                return $this->ResponseData(null,'Product Body Branding Image Not Found',false,400);
            }
            if($productBodyBrandingImages->image != null){
                unlink($productBodyBrandingImages->image);
            }
            $productBodyBrandingImages->delete();
            return $this->ResponseData(null,'Delete Product Body Branding Image Operation success',true,200);

        }
    }

    
}
