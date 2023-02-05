<?php

namespace App\Http\Controllers\API\Dashboard\EToy\ContactUsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\SeoPage\SeoPageContactPage;
use Illuminate\Http\Request;

class ContactUsPageSeoController extends Controller
{
    use Response;
    public $seoPageContactPage;

    public function __construct()
    {
        $this->seoPageContactPage = new SeoPageContactPage();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {



        $seoPageContactPage = $this->seoPageContactPage->first();
        if(!$seoPageContactPage){
            $facebookImageName = null;
            if(is_file($request->facebookImage)){
                $facebookImageName = 'media/EToy/ContactUsPage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/ContactUsPage/Seo',$facebookImageName);
            }


            $this->seoPageContactPage->create([
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

            $facebookImageName = $seoPageContactPage->facebookImage;

            if(is_file($request->facebookImage)){
                if($seoPageContactPage->facebookImage != null){
                    unlink($seoPageContactPage->facebookImage);
                }
                $facebookImageName = 'media/EToy/ContactUsPage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/ContactUsPage/Seo',$facebookImageName);
            }

            $seoPageContactPage->update([
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

        return $this->ResponseData(null,'Update Etoy Contact Us Page SEO Opreation Success',true,200);


    }
}
