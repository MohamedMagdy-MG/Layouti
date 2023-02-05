<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\DesignHeaderContent;
use Illuminate\Http\Request;

class DesignHeaderContentController extends Controller
{
    use Response;
    public $designHeaderContent;

    public function __construct()
    {
        $this->designHeaderContent = new DesignHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $designHeaderContent = $this->designHeaderContent->first();

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 
        $request->smallDescriptionEn == "null" ? $smallDescriptionEn = null : $smallDescriptionEn = $request->smallDescriptionEn; 
        $request->smallDescriptionAr == "null" ? $smallDescriptionAr = null : $smallDescriptionAr = $request->smallDescriptionAr; 


        if(!$designHeaderContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/365Design/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/HeaderContent',$imageName);
            }
            $this->designHeaderContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'smallDescriptionEn' => $smallDescriptionEn ,
                'smallDescriptionAr' => $smallDescriptionAr ,
                'image' => $imageName
            ]);
        }else{
            $imageName = $designHeaderContent->image;
            if(is_file($request->image)){
                if($designHeaderContent->image != null){
                    unlink($imageName);
                }
                $imageName = 'media/365Design/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/365Design/HeaderContent',$imageName);
            }
            $designHeaderContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'smallDescriptionEn' => $smallDescriptionEn ,
                'smallDescriptionAr' => $smallDescriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update 365Design Header Content Opreation Success',true,200);
    }
}
