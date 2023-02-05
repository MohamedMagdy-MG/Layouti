<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\SeoPage\SeoPageTermsAndConditionsPage;
use Illuminate\Http\Request;

class TermsAndConditionsPageSeoController extends Controller
{
    use Response;
    public $seoPageTermsAndConditionsPage;

    public function __construct()
    {
        $this->seoPageTermsAndConditionsPage = new SeoPageTermsAndConditionsPage();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {



        $seoPageTermsAndConditionsPage = $this->seoPageTermsAndConditionsPage->first();
        if(!$seoPageTermsAndConditionsPage){
            $facebookImageName = null;
            if(is_file($request->facebookImage)){
                $facebookImageName = 'media/EToy/TermsAndConditionsPage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/TermsAndConditionsPage/Seo',$facebookImageName);
            }


            $this->seoPageTermsAndConditionsPage->create([
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

            $facebookImageName = $seoPageTermsAndConditionsPage->facebookImage;

            if(is_file($request->facebookImage)){
                if($seoPageTermsAndConditionsPage->facebookImage != null){
                    unlink($seoPageTermsAndConditionsPage->facebookImage);
                }
                $facebookImageName = 'media/EToy/TermsAndConditionsPage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/TermsAndConditionsPage/Seo',$facebookImageName);
            }

            $seoPageTermsAndConditionsPage->update([
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

        return $this->ResponseData(null,'Update Etoy Terms And Conditions Page SEO Opreation Success',true,200);


    }
}
