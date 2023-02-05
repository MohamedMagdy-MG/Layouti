<?php

namespace App\Http\Controllers\API\Dashboard\EToy\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\AboutPage\AboutPageSectionOne;
use Illuminate\Http\Request;

class AboutPageSectionOneController extends Controller
{
    use Response;
    public $aboutPageSectionOne;

    public function __construct()
    {
        $this->aboutPageSectionOne = new AboutPageSectionOne();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $aboutPageSectionOne = $this->aboutPageSectionOne->first();
        if(!$aboutPageSectionOne){

            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/EToy/AboutPage/SectionOne/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/AboutPage/SectionOne',$imageName);
            }
            $this->aboutPageSectionOne->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
                'image' => $imageName
            ]);


        }else{

            $imageName = $aboutPageSectionOne->image;
            if(is_file($request->image)){
                if($aboutPageSectionOne->image != null){
                    unlink($aboutPageSectionOne->image);
                }
                $imageName = 'media/EToy/AboutPage/SectionOne/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/AboutPage/SectionOne',$imageName);
            }

            $aboutPageSectionOne->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
                'image' => $imageName
            ]);


        }
        return $this->ResponseData(null,'Update Etoy About Page Section One Opreation Success',true,200);
    }
}
