<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignHeaderContent;
use Illuminate\Http\Request;

class CvDesignHeaderContentController extends Controller
{
    use Response;
    public $cvDesignHeaderContent;

    public function __construct()
    {
        $this->cvDesignHeaderContent = new CvDesignHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $cvDesignHeaderContent = $this->cvDesignHeaderContent->first();

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 


        if(!$cvDesignHeaderContent){
            $imageName = null;
            $topLeftImageName = null;
            $topRightImageName = null;
            $bottomLeftImageName = null;
            $bottomRightImageName = null;
            if(is_file($request->image)){
                $imageName = 'media/365Design/CV/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/CV/HeaderContent',$imageName);
            }
            if(is_file($request->topLeftImage)){
                $topLeftImageName = 'media/365Design/CV/HeaderContent/'.time().'-topLeftImage-'.$request->topLeftImage->getClientOriginalName();
                $request->topLeftImage->move('media/365Design/CV/HeaderContent',$topLeftImageName);
            }
            if(is_file($request->topRightImage)){
                $topRightImageName = 'media/365Design/CV/HeaderContent/'.time().'-topRightImage-'.$request->topRightImage->getClientOriginalName();
                $request->topRightImage->move('media/365Design/CV/HeaderContent',$topRightImageName);
            }
            if(is_file($request->bottomLeftImage)){
                $bottomLeftImageName = 'media/365Design/CV/HeaderContent/'.time().'-bottomLeftImage-'.$request->bottomLeftImage->getClientOriginalName();
                $request->bottomLeftImage->move('media/365Design/CV/HeaderContent',$bottomLeftImageName);
            }
            if(is_file($request->bottomRightImage)){
                $bottomRightImageName = 'media/365Design/CV/HeaderContent/'.time().'-bottomRightImage-'.$request->bottomRightImage->getClientOriginalName();
                $request->bottomRightImage->move('media/365Design/CV/HeaderContent',$bottomRightImageName);
            }
            $this->cvDesignHeaderContent->create([
                'image' => $imageName,
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'topLeftImage' => $topLeftImageName,
                'topRightImage' => $topRightImageName,
                'bottomLeftImage' => $bottomLeftImageName,
                'bottomRightImage' => $bottomRightImageName
                
            ]);
        }else{
            $imageName = $cvDesignHeaderContent->image;
            $topLeftImageName = $cvDesignHeaderContent->topLeftImage;
            $topRightImageName = $cvDesignHeaderContent->topRightImage;
            $bottomLeftImageName = $cvDesignHeaderContent->bottomLeftImage;
            $bottomRightImageName = $cvDesignHeaderContent->bottomRightImage;
            if(is_file($request->image)){
                if($cvDesignHeaderContent->image != null){
                    unlink($imageName);
                }
                $imageName = 'media/365Design/CV/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/CV/HeaderContent',$imageName);
            }

            if(is_file($request->topLeftImage)){
                if($cvDesignHeaderContent->topLeftImage != null){
                    unlink($topLeftImageName);
                }
                $topLeftImageName = 'media/365Design/CV/HeaderContent/'.time().'-topLeftImage-'.$request->topLeftImage->getClientOriginalName();
                $request->topLeftImage->move('media/365Design/CV/HeaderContent',$topLeftImageName);
            }
            if(is_file($request->topRightImage)){
                if($cvDesignHeaderContent->topRightImage != null){
                    unlink($topRightImageName);
                }
                $topRightImageName = 'media/365Design/CV/HeaderContent/'.time().'-topRightImage-'.$request->topRightImage->getClientOriginalName();
                $request->topRightImage->move('media/365Design/CV/HeaderContent',$topRightImageName);
            }
            if(is_file($request->bottomLeftImage)){
                if($cvDesignHeaderContent->bottomLeftImage != null){
                    unlink($bottomLeftImageName);
                }
                $bottomLeftImageName = 'media/365Design/CV/HeaderContent/'.time().'-bottomLeftImage-'.$request->bottomLeftImage->getClientOriginalName();
                $request->bottomLeftImage->move('media/365Design/CV/HeaderContent',$bottomLeftImageName);
            }
            if(is_file($request->bottomRightImage)){
                if($cvDesignHeaderContent->bottomRightImage != null){
                    unlink($bottomRightImageName);
                }
                $bottomRightImageName = 'media/365Design/CV/HeaderContent/'.time().'-bottomRightImage-'.$request->bottomRightImage->getClientOriginalName();
                $request->bottomRightImage->move('media/365Design/CV/HeaderContent',$bottomRightImageName);
            }
            $cvDesignHeaderContent->update([
                'image' => $imageName,
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'topLeftImage' => $topLeftImageName,
                'topRightImage' => $topRightImageName,
                'bottomLeftImage' => $bottomLeftImageName,
                'bottomRightImage' => $bottomRightImageName
            ]);
        }
        return $this->ResponseData(null,'Update 365Design CV Header Content Opreation Success',true,200);
    }
}
