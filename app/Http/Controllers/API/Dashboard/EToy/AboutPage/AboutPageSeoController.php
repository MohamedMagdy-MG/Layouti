<?php

namespace App\Http\Controllers\API\Dashboard\EToy\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\SeoPage\SeoPageAboutPage;
use Illuminate\Http\Request;

class AboutPageSeoController extends Controller
{
    use Response;
    public $seoPageAboutPage;

    public function __construct()
    {
        $this->seoPageAboutPage = new SeoPageAboutPage();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {



        $seoPageAboutPage = $this->seoPageAboutPage->first();
        if(!$seoPageAboutPage ){
            $facebookImageName = null;
            if(is_file($request->facebookImage)){
                $facebookImageName = 'media/EToy/AboutPage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/AboutPage/Seo',$facebookImageName);
            }


            $this->seoPageAboutPage->create([
                'focusKeypharseEn' => $request->focusKeypharseEn,
                'focusKeypharseAr' => $request->focusKeypharseAr,
                'seoTitleEn' => $request->seoTitleEn,
                'seoTitleAr' => $request->seoTitleAr,
                'slugEn' => $request->slugEn,
                'slugAr' => $request->slugAr,
                'descriptionEn' => $request->descriptionEn,
                'descriptionAr' => $request->descriptionAr,
                'facebookImage' => $facebookImageName,
                'facebookTitleEn' => $request->facebookTitleEn,
                'facebookTitleAr' => $request->facebookTitleAr,
                'facebookDescriptionEn' => $request->facebookDescriptionEn,
                'facebookDescriptionAr' => $request->facebookDescriptionAr,
            ]);



        }else{

            $facebookImageName = $seoPageAboutPage->facebookImage;

            if(is_file($request->facebookImage)){
                if($seoPageAboutPage->facebookImage != null){
                    unlink($seoPageAboutPage->facebookImage);
                }
                $facebookImageName = 'media/EToy/AboutPage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/AboutPage/Seo',$facebookImageName);
            }

            $seoPageAboutPage->update([
                'focusKeypharseEn' => $request->focusKeypharseEn,
                'focusKeypharseAr' => $request->focusKeypharseAr,
                'seoTitleEn' => $request->seoTitleEn,
                'seoTitleAr' => $request->seoTitleAr,
                'slugEn' => $request->slugEn,
                'slugAr' => $request->slugAr,
                'descriptionEn' => $request->descriptionEn,
                'descriptionAr' => $request->descriptionAr,
                'facebookImage' => $facebookImageName,
                'facebookTitleEn' => $request->facebookTitleEn,
                'facebookTitleAr' => $request->facebookTitleAr,
                'facebookDescriptionEn' => $request->facebookDescriptionEn,
                'facebookDescriptionAr' => $request->facebookDescriptionAr,
            ]);




        }

        return $this->ResponseData(null,'Update Etoy About Page SEO Opreation Success',true,200);


    }
}
