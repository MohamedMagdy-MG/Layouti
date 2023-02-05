<?php

namespace App\Http\Controllers\API\Dashboard\EToy\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\SeoPage\SeoPageHomePage;
use Illuminate\Http\Request;

class HomePageSeoController extends Controller
{
    use Response;
    public $seoPageHomePage;

    public function __construct()
    {
        $this->seoPageHomePage = new SeoPageHomePage();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {



        $seoPageHomePage = $this->seoPageHomePage->first();
        if(!$seoPageHomePage){
            $facebookImageName = null;
            if(is_file($request->facebookImage)){
                $facebookImageName = 'media/EToy/HomePage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/HomePage/Seo',$facebookImageName);
            }


            $this->seoPageHomePage->create([
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

            $facebookImageName = $seoPageHomePage->facebookImage;

            if(is_file($request->facebookImage)){
                if($seoPageHomePage->facebookImage != null){
                    unlink($seoPageHomePage->facebookImage);
                }
                $facebookImageName = 'media/EToy/HomePage/Seo/'.time().'-'.$request->facebookImage->getClientOriginalName();
                $request->facebookImage->move('media/EToy/HomePage/Seo',$facebookImageName);
            }

            $seoPageHomePage->update([
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

        return $this->ResponseData(null,'Update Etoy Home Page SEO Opreation Success',true,200);


    }





}
