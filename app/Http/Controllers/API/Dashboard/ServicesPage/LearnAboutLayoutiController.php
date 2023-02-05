<?php

namespace App\Http\Controllers\API\Dashboard\ServicesPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ServicesPage\ServicesLearnAboutLayouti;
use Illuminate\Http\Request;

class LearnAboutLayoutiController extends Controller
{
    use Response;
    public $servicesLearnAboutLayouti;

    public function __construct()
    {
        $this->servicesLearnAboutLayouti = new ServicesLearnAboutLayouti();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $servicesLearnAboutLayouti = $this->servicesLearnAboutLayouti->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->downImageDescriptionEn != "null" ? $downImageDescriptionEn = $request->downImageDescriptionEn : $downImageDescriptionEn = null;
        $request->downImageDescriptionAr != "null" ? $downImageDescriptionAr = $request->downImageDescriptionAr : $downImageDescriptionAr = null;


        if(!$servicesLearnAboutLayouti){
            $topImageName = null;
            $downImageName = null;
            if(is_file($request->topImage)){
                $topImageName = 'media/ServicesPage/LearnAboutLayouti/'.time().'-top-'.$request->topImage->getClientOriginalName();
                $request->topImage->move('media/ServicesPage/LearnAboutLayouti',$topImageName);
            }
            if(is_file($request->downImage)){
                $downImageName = 'media/ServicesPage/LearnAboutLayouti/'.time().'-down-'.$request->downImage->getClientOriginalName();
                $request->downImage->move('media/ServicesPage/LearnAboutLayouti',$downImageName);
            }
            $this->servicesLearnAboutLayouti->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'downImageDescriptionEn' => $downImageDescriptionEn ,
                'downImageDescriptionAr' => $downImageDescriptionAr ,
                'topImage' => $topImageName,
                'downImage' => $downImageName
            ]);
        }else{

            if($request->topImage == "null"){
                $topImageName = null;
                if($servicesLearnAboutLayouti->topImage){
                    unlink($servicesLearnAboutLayouti->topImage);
                }
            }
            else{
                $topImageName = $servicesLearnAboutLayouti->topImage;
                if(is_file($request->topImage)){
                    if($servicesLearnAboutLayouti->topImage){
                        unlink($topImageName);
                    }
                    $topImageName = 'media/ServicesPage/LearnAboutLayouti/'.time().'-top-'.$request->topImage->getClientOriginalName();
                    $request->topImage->move('media/ServicesPage/LearnAboutLayouti',$topImageName);
                }
            }

            if($request->topImage == "null"){
                $downImageName = null;
                if($servicesLearnAboutLayouti->downImage){
                    unlink($servicesLearnAboutLayouti->downImage);
                }
            }
            else{
                $downImageName = $servicesLearnAboutLayouti->downImage;
            

                if(is_file($request->downImage)){
                    if($servicesLearnAboutLayouti->downImage){
                        unlink($downImageName);
                    }
                    $downImageName = 'media/ServicesPage/LearnAboutLayouti/'.time().'-top-'.$request->downImage->getClientOriginalName();
                    $request->downImage->move('media/ServicesPage/LearnAboutLayouti',$downImageName);
                }
            }
           
            
            $servicesLearnAboutLayouti->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'downImageDescriptionEn' => $downImageDescriptionEn ,
                'downImageDescriptionAr' => $downImageDescriptionAr ,
                'topImage' => $topImageName,
                'downImage' => $downImageName
            ]);
        }
        return $this->ResponseData(null,'Update Services Learn About Layouti Opreation Success',true,200);
    }
}
