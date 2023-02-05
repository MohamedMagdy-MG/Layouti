<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIHeaderContent;
use Illuminate\Http\Request;

class HeaderContentController extends Controller
{
    use Response;
    public $headerContent;

    public function __construct()
    {
        $this->headerContent = new LearnUIHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $headerContent = $this->headerContent->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->subTitleEn != "null" ? $subTitleEn = $request->subTitleEn : $subTitleEn = null;
        $request->subTitleAr != "null" ? $subTitleAr = $request->subTitleAr : $subTitleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->createByEn != "null" ? $createByEn = $request->createByEn : $createByEn = null;
        $request->createdByAr != "null" ? $createdByAr = $request->createdByAr : $createdByAr = null;
        $request->createdInEn != "null" ? $createdInEn = $request->createdInEn : $createdInEn = null;
        $request->createdInAr != "null" ? $createdInAr = $request->createdInAr : $createdInAr = null;
        $request->speakerEn != "null" ? $speakerEn = $request->speakerEn : $speakerEn = null;
        $request->speakerAr != "null" ? $speakerAr = $request->speakerAr : $speakerAr = null;
        if(!$headerContent){
            $imageName = null;
            $imageNameIconOfCreated = null;
            $imageNameIconInCreated = null;
            $imageNameIconOfSpeaker = null;

            if(is_file($request->image)){
                $imageName = 'media/LearnUI/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/HeaderContent',$imageName);
            }

            if(is_file($request->iconOfCreated)){
                $imageNameIconOfCreated = 'media/LearnUI/HeaderContent/'.time().'-'.'iconOfCreated'.'-'.$request->iconOfCreated->getClientOriginalName();
                $request->iconOfCreated->move('media/LearnUI/HeaderContent',$imageNameIconOfCreated);
            }

            if(is_file($request->iconInCreated)){
                $imageNameIconInCreated = 'media/LearnUI/HeaderContent/'.time().'-'.'iconInCreated'.'-'.$request->iconInCreated->getClientOriginalName();
                $request->iconInCreated->move('media/LearnUI/HeaderContent',$imageNameIconInCreated);
            }

            if(is_file($request->iconOfSpeaker)){
                $imageNameIconOfSpeaker = 'media/LearnUI/HeaderContent/'.time().'-'.'iconOfSpeaker'.'-'.$request->iconOfSpeaker->getClientOriginalName();
                $request->iconOfSpeaker->move('media/LearnUI/HeaderContent',$imageNameIconOfSpeaker);
            }
            $this->headerContent->create([
                'image' => $imageName,
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'createByEn' => $createByEn ,
                'createdByAr' => $createdByAr ,
                'iconOfCreated' => $imageNameIconOfCreated ,
                'createdInEn' => $createdInEn ,
                'createdInAr' => $createdInAr ,
                'iconInCreated' => $imageNameIconInCreated ,
                'speakerEn' => $speakerEn ,
                'speakerAr' => $speakerAr ,
                'iconOfSpeaker' => $imageNameIconOfSpeaker ,


            ]);
        }else{
            $request->image != "null" ? $imageName = $headerContent->image : $imageName = null;
            $request->iconOfCreated != "null" ? $imageNameIconOfCreated = $headerContent->iconOfCreated : $imageNameIconOfCreated = null;
            $request->iconInCreated != "null" ? $imageNameIconInCreated = $headerContent->iconInCreated : $imageNameIconInCreated = null;
            $request->iconOfSpeaker != "null" ? $imageNameIconOfSpeaker = $headerContent->iconOfSpeaker : $imageNameIconOfSpeaker = null;

            if($imageName == "null"){
                unlink($headerContent->image);
            }
            if($imageNameIconOfCreated == "null"){
                unlink($headerContent->iconOfCreated);
            }
            if($imageNameIconInCreated == "null"){
                unlink($headerContent->iconInCreated);
            }
            if($imageNameIconOfSpeaker == "null"){
                unlink($headerContent->iconOfSpeaker);
            }
            if(is_file($request->image)){
                if($headerContent->image){
                    unlink($imageName);
                }
                $imageName = 'media/LearnUI/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/HeaderContent',$imageName);
            }

            if(is_file($request->iconOfCreated)){
                if($headerContent->iconOfCreated){
                    unlink($imageNameIconOfCreated);
                }
                $imageNameIconOfCreated = 'media/LearnUI/HeaderContent/'.time().'-'.'iconOfCreated'.'-'.$request->iconOfCreated->getClientOriginalName();
                $request->iconOfCreated->move('media/LearnUI/HeaderContent',$imageNameIconOfCreated);
            }

            if(is_file($request->iconInCreated)){
                if($headerContent->iconInCreated){
                    unlink($imageNameIconInCreated);
                }
                $imageNameIconInCreated = 'media/LearnUI/HeaderContent/'.time().'-'.'iconInCreated'.'-'.$request->iconInCreated->getClientOriginalName();
                $request->iconInCreated->move('media/LearnUI/HeaderContent',$imageNameIconInCreated);
            }

            if(is_file($request->iconOfSpeaker)){
                if($headerContent->iconOfSpeaker){
                    unlink($imageNameIconOfSpeaker);
                }
                $imageNameIconOfSpeaker = 'media/LearnUI/HeaderContent/'.time().'-'.'iconOfSpeaker'.'-'.$request->iconOfSpeaker->getClientOriginalName();
                $request->iconOfSpeaker->move('media/LearnUI/HeaderContent',$imageNameIconOfSpeaker);
            }


            
            $headerContent->update([
                'image' => $imageName,
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'createByEn' => $createByEn ,
                'createdByAr' => $createdByAr ,
                'iconOfCreated' => $imageNameIconOfCreated ,
                'createdInEn' => $createdInEn ,
                'createdInAr' => $createdInAr ,
                'iconInCreated' => $imageNameIconInCreated ,
                'speakerEn' => $speakerEn ,
                'speakerAr' => $speakerAr ,
                'iconOfSpeaker' => $imageNameIconOfSpeaker ,
            ]);
        }
        return $this->ResponseData(null,'Update LearnUI Header Content Opreation Success',true,200);
    }
}
