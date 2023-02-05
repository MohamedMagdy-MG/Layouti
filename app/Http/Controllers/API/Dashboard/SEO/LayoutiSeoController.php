<?php

namespace App\Http\Controllers\API\Dashboard\SEO;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\SEO\Layouti\LayoutiHomePage;
use Illuminate\Http\Request;

class LayoutiSeoController extends Controller
{
    
    use Response;

    public $layoutiHomePage;

    public function __construct()
    {
        $this->layoutiHomePage = new LayoutiHomePage();

    }

    public function saveHomePage(Request $request)
    {

    
        $request->titleEn == "null" ?  $titleEn = null : $titleEn = $request->titleEn;
        $request->titleAr == "null" ?  $titleAr = null : $titleAr = $request->titleAr;
        $request->descriptionEn == "null" ?  $descriptionEn = null : $descriptionEn = $request->descriptionEn;
        $request->descriptionAr == "null" ?  $descriptionAr = null : $descriptionAr = $request->descriptionAr;
        $request->keywordsEn == "null" ?  $keywordsEn = null : $keywordsEn = $request->keywordsEn;
        $request->keywordsAr == "null" ?  $keywordsAr = null : $keywordsAr = $request->keywordsAr;
        $request->slugEn == "null" ?  $slugEn = null : $slugEn = $request->slugEn;
        $request->slugAr == "null" ?  $slugAr = null : $slugAr = $request->slugAr;
        $request->facebookTitleEn == "null" ?  $facebookTitleEn = null : $facebookTitleEn = $request->facebookTitleEn;
        $request->facebookTitleAr == "null" ?  $facebookTitleAr = null : $facebookTitleAr = $request->facebookTitleAr;
        $request->facebookDescriptionEn == "null" ?  $facebookDescriptionEn = null : $facebookDescriptionEn = $request->facebookDescriptionEn;
        $request->facebookDescriptionAr == "null" ?  $facebookDescriptionAr = null : $facebookDescriptionAr = $request->facebookDescriptionAr;

        $layoutiHomePage = $this->layoutiHomePage->first();

        if($layoutiHomePage != null){

            if($request->image == "null"){
                $imageName = null;
                if($layoutiHomePage->image != null){
                    unlink($layoutiHomePage->image);
                }

            }else{
                $imageName = $layoutiHomePage->image;
                if(is_file($request->image)){
                    if($layoutiHomePage->image != null){
                        unlink($layoutiHomePage->image);
                    }
                    $imageName = 'media/SEO/Layouti/HomePage'.time().'-Image-'.$request->image->getClientOriginalName();
                    $request->image->move('media/SEO/Layouti/HomePage',$imageName);
                }
            }
            if($request->facebookImage == "null"){
                $facebookImageName = null;
                if($layoutiHomePage->facebookImage != null){
                    unlink($layoutiHomePage->facebookImage);
                }

            }else{
                $facebookImageName = $layoutiHomePage->facebookImage;
                if(is_file($request->facebookImage)){
                    if($layoutiHomePage->facebookImage != null){
                        unlink($layoutiHomePage->facebookImage);
                    }
                    $facebookImageName = 'media/SEO/Layouti/HomePage'.time().'-facebookImage-'.$request->facebookImage->getClientOriginalName();
                    $request->facebookImage->move('media/SEO/Layouti/HomePage',$imageName);
                }
            }

            
            
            $layoutiHomePage->update([
                
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'keywordsEn' => $keywordsEn,
                'keywordsAr' => $keywordsAr,
                'slugEn' => $slugEn,
                'slugAr' => $slugAr,
                'image' => $imageName,
                'facebookTitleEn' => $facebookTitleEn,
                'facebookTitleAr' => $facebookTitleAr,
                'facebookDescriptionEn' => $facebookDescriptionEn,
                'facebookDescriptionAr' => $facebookDescriptionAr,
                'facebookImage' => $facebookImageName,
            ]);
        }else{
            $imageName = null;
            $facebookImageName = null;
            if(is_file($request->image)){
                $imageName = 'media/SEO/Layouti/HomePage'.time().'-Image-'.$request->image->getClientOriginalName();
                $request->image->move('media/SEO/Layouti/HomePage',$imageName);
            }
            if(is_file($request->facebookImage)){
                $facebookImageName = 'media/ProductPage/SEO/Layouti/HomePage/'.time().'-facebookImage-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/ProductPage/SEO/Layouti/HomePage',$facebookImageName);
            }
            $this->layoutiHomePage->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'keywordsEn' => $keywordsEn,
                'keywordsAr' => $keywordsAr,
                'slugEn' => $slugEn,
                'slugAr' => $slugAr,
                'image' => $imageName,
                'facebookTitleEn' => $facebookTitleEn,
                'facebookTitleAr' => $facebookTitleAr,
                'facebookDescriptionEn' => $facebookDescriptionEn,
                'facebookDescriptionAr' => $facebookDescriptionAr,
                'facebookImage' => $facebookImageName,
            ]);
        }

        return $this->ResponseData(null,'Save SEO Layouti Home Page Operation Success',true,200);


    }

    
}
