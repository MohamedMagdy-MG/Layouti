<?php

namespace App\Http\Controllers\API\Dashboard\WorkPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\WorkPage\WorkHeaderContent;
use Illuminate\Http\Request;

class HeaderContentController extends Controller
{
    use Response;
    public $workHeaderContent;

    public function __construct()
    {
        $this->workHeaderContent = new WorkHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $workHeaderContent = $this->workHeaderContent->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$workHeaderContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/WorkPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/WorkPage/HeaderContent',$imageName);
            }
            $this->workHeaderContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($workHeaderContent->image){
                    unlink($workHeaderContent->image);
                }
            }
            else{
                $imageName = $workHeaderContent->image;
                if(is_file($request->image)){
                    if($workHeaderContent->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/WorkPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/WorkPage/HeaderContent',$imageName);
                }
            }

            
            $workHeaderContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update Work Header Content Opreation Success',true,200);
    }
}
