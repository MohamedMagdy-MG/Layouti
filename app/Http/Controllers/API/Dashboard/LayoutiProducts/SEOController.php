<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductSEO;
use Illuminate\Http\Request;

class SEOController extends Controller
{
    use Response;

    public $productSEO;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productSEO = new ProductSEO();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        
        $this->addProductSEO($request->focusKeypharseEn,$request->focusKeypharseAr,$request->seoTitleEn,
        $request->seoTitleAr,$request->slugEn,$request->slugAr,$request->descriptionEn,
        $request->descriptionAr,$request->facebookTitleEn,$request->facebookTitleAr,
        $request->facebookDescriptionEn,$request->facebookDescriptionAr,
        $request->facebookImage,$productGeneralInformation->id);
       

        return $this->ResponseData(null,'Save Project SEO Operation Success',true,200);


    }

    public function addProductSEO($focusKeypharseEn,$focusKeypharseAr,$seoTitleEn,$seoTitleAr,$slugEn,$slugAr,$descriptionEn,
    $descriptionAr,$facebookTitleEn,$facebookTitleAr,$facebookDescriptionEn,$facebookDescriptionAr,
    $facebookImage,$project)
    {


        $productSEO = $this->productSEO->where('project',$project)->first();

        $focusKeypharseEn == "null" ?  $focusKeypharseEn = null : $focusKeypharseEn = $focusKeypharseEn;
        $focusKeypharseAr == "null" ?  $focusKeypharseAr = null : $focusKeypharseAr = $focusKeypharseAr;
        $seoTitleEn == "null" ?  $seoTitleEn = null : $seoTitleEn = $seoTitleEn;
        $seoTitleAr == "null" ?  $seoTitleAr = null : $seoTitleAr = $seoTitleAr;
        $slugEn == "null" ?  $slugEn = null : $slugEn = $slugEn;
        $slugAr == "null" ?  $slugAr = null : $slugAr = $slugAr;
        $descriptionEn == "null" ?  $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ?  $descriptionAr = null : $descriptionAr = $descriptionAr;
        $facebookTitleEn == "null" ?  $facebookTitleEn = null : $facebookTitleEn = $facebookTitleEn;
        $facebookTitleAr == "null" ?  $facebookTitleAr = null : $facebookTitleAr = $facebookTitleAr;
        $facebookDescriptionEn == "null" ?  $facebookDescriptionEn = null : $facebookDescriptionEn = $facebookDescriptionEn;
        $facebookDescriptionAr == "null" ?  $facebookDescriptionAr = null : $facebookDescriptionAr = $facebookDescriptionAr;

        if($productSEO != null){

            if($facebookImage == "null"){
                $imageName = null;
                if($productSEO->facebookImage != null){
                    unlink($productSEO->facebookImage);
                }

            }else{
                $imageName = $productSEO->facebookImage;
                if(is_file($facebookImage)){
                    if($productSEO->facebookImage != null){
                        unlink($productSEO->facebookImage);
                    }
                    $imageName = 'media/ProductPage/SEO/'.time().'-facebookImage-'.$facebookImage->getClientOriginalName();
                    $facebookImage->move('media/ProductPage/SEO',$imageName);
                }
            }

            
            
            $productSEO->update([
                'focusKeypharseEn' => $focusKeypharseEn,
                'focusKeypharseAr' => $focusKeypharseAr,
                'seoTitleEn' => $seoTitleEn,
                'seoTitleAr' => $seoTitleAr,
                'slugEn' => $slugEn,
                'slugAr' => $slugAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'facebookTitleEn' => $facebookTitleEn,
                'facebookTitleAr' => $facebookTitleAr,
                'facebookDescriptionEn' => $facebookDescriptionEn,
                'facebookDescriptionAr' => $facebookDescriptionAr,
                'facebookImage' => $imageName,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($facebookImage)){
                $imageName = 'media/ProductPage/SEO/'.time().'-facebookImage-'.$facebookImage->getClientOriginalName();
                $facebookImage->move('media/ProductPage/SEO',$imageName);
            }
            $this->productSEO->create([
                'focusKeypharseEn' => $focusKeypharseEn,
                'focusKeypharseAr' => $focusKeypharseAr,
                'seoTitleEn' => $seoTitleEn,
                'seoTitleAr' => $seoTitleAr,
                'slugEn' => $slugEn,
                'slugAr' => $slugAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'facebookTitleEn' => $facebookTitleEn,
                'facebookTitleAr' => $facebookTitleAr,
                'facebookDescriptionEn' => $facebookDescriptionEn,
                'facebookDescriptionAr' => $facebookDescriptionAr,
                'facebookImage' => $imageName,
                'project' => $project
            ]);
        }

    }
}
