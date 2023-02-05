<?php

namespace App\Http\Controllers\API\Dashboard\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\AboutPage\AboutLearnAboutLayouti;
use Illuminate\Http\Request;

class LearnAboutLayoutiController extends Controller
{
    use Response;
    public $aboutLearnAboutLayouti;

    public function __construct()
    {
        $this->aboutLearnAboutLayouti = new AboutLearnAboutLayouti();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $aboutLearnAboutLayouti = $this->aboutLearnAboutLayouti->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->otherDescriptionEn != "null" ? $otherDescriptionEn = $request->otherDescriptionEn : $otherDescriptionEn = null;
        $request->otherDescriptionAr != "null" ? $otherDescriptionAr = $request->otherDescriptionAr : $otherDescriptionAr = null;

        if(!$aboutLearnAboutLayouti){
            $rightImageName = null;
            $leftImageName = null;
            $otherRightImageName = null;
            $otherLeftImageName = null;
            if(is_file($request->leftImage)){
                $leftImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-leftImage-'.$request->leftImage->getClientOriginalName();
                $request->leftImage->move('media/AboutPage/LearnAboutLayouti',$leftImageName);
            }
            if(is_file($request->rightImage)){
                $rightImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-rightImage-'.$request->rightImage->getClientOriginalName();
                $request->rightImage->move('media/AboutPage/LearnAboutLayouti',$rightImageName);
            }
            if(is_file($request->otherLeftImage)){
                $otherLeftImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-otherLeftImage-'.$request->otherLeftImage->getClientOriginalName();
                $request->otherLeftImage->move('media/AboutPage/LearnAboutLayouti',$otherLeftImageName);
            }
            if(is_file($request->otherRightImage)){
                $otherRightImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-otherRightImage-'.$request->otherRightImage->getClientOriginalName();
                $request->otherRightImage->move('media/AboutPage/LearnAboutLayouti',$otherRightImageName);
            }
            $this->aboutLearnAboutLayouti->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'leftImage' => $leftImageName,
                'rightImage' => $rightImageName,
                'otherDescriptionEn' => $otherDescriptionEn ,
                'otherDescriptionAr' => $otherDescriptionAr ,
                'otherLeftImage' => $otherLeftImageName,
                'otherRightImage' => $otherRightImageName
            ]);
        }else{

            
            
           
            

            if($request->leftImage == "null"){
                $leftImageName = null;
                if($aboutLearnAboutLayouti->leftImage){
                    unlink($aboutLearnAboutLayouti->leftImage);
                }
            }
            else{
                $leftImageName = $aboutLearnAboutLayouti->leftImage;
                if(is_file($request->leftImage)){
                    if($aboutLearnAboutLayouti->leftImage){
                        unlink($leftImageName);
                    }
                    $leftImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-leftImage-'.$request->leftImage->getClientOriginalName();
                    $request->leftImage->move('media/AboutPage/LearnAboutLayouti',$leftImageName);
                }
            }

            if($request->rightImage == "null"){
                $rightImageName = null;
                if($aboutLearnAboutLayouti->rightImage){
                    unlink($aboutLearnAboutLayouti->rightImage);
                }
            }
            else{
                $rightImageName = $aboutLearnAboutLayouti->rightImage;
            
                if(is_file($request->rightImage)){
                    if($aboutLearnAboutLayouti->rightImage){
                        unlink($rightImageName);
                    }
                    $rightImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-rightImage-'.$request->rightImage->getClientOriginalName();
                    $request->rightImage->move('media/AboutPage/LearnAboutLayouti',$rightImageName);
                }
            }

            if($request->otherLeftImage == "null"){
                $otherLeftImageName = null;
                if($aboutLearnAboutLayouti->otherLeftImage){
                    unlink($aboutLearnAboutLayouti->otherLeftImage);
                }
            }
            else{

                $otherLeftImageName = $aboutLearnAboutLayouti->otherLeftImage;
                if(is_file($request->otherLeftImage)){
                    if($aboutLearnAboutLayouti->otherLeftImage){
                        unlink($otherLeftImageName);
                    }
                    $otherLeftImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-otherLeftImage-'.$request->otherLeftImage->getClientOriginalName();
                    $request->otherLeftImage->move('media/AboutPage/LearnAboutLayouti',$otherLeftImageName);
                }
            } 

            if($request->otherRightImage == "null"){
                $otherRightImageName = null;
                if($aboutLearnAboutLayouti->otherRightImage){
                    unlink($aboutLearnAboutLayouti->otherRightImage);
                }
            }
            else{

                $otherRightImageName = $aboutLearnAboutLayouti->otherRightImage;
                if(is_file($request->otherRightImage)){
                    if($aboutLearnAboutLayouti->otherRightImage){
                        unlink($otherRightImageName);
                    }
                    $otherRightImageName = 'media/AboutPage/LearnAboutLayouti/'.time().'-otherRightImage-'.$request->otherRightImage->getClientOriginalName();
                    $request->otherRightImage->move('media/AboutPage/LearnAboutLayouti',$otherRightImageName);
                }
            }

            $aboutLearnAboutLayouti->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'leftImage' => $leftImageName,
                'rightImage' => $rightImageName,
                'otherDescriptionEn' => $otherDescriptionEn ,
                'otherDescriptionAr' => $otherDescriptionAr ,
                'otherLeftImage' => $otherLeftImageName,
                'otherRightImage' => $otherRightImageName
            ]);
        }
        return $this->ResponseData(null,'Update About Learn About Layouti Content Opreation Success',true,200);
    }
}
