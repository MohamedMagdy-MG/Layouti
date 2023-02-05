<?php

namespace App\Http\Controllers\API\Dashboard\ThingsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ThingsPage\ThingsHeaderContent;
use Illuminate\Http\Request;

class HeaderContentController extends Controller
{
    use Response;
    public $thingsHeaderContent;

    public function __construct()
    {
        $this->thingsHeaderContent = new ThingsHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $thingsHeaderContent = $this->thingsHeaderContent->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;


        if(!$thingsHeaderContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/ThingsPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/ThingsPage/HeaderContent',$imageName);
            }
            $this->thingsHeaderContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($thingsHeaderContent->image){
                    unlink($thingsHeaderContent->image);
                }
            }
            else{
                $imageName = $thingsHeaderContent->image;
                if(is_file($request->image)){
                    if($thingsHeaderContent->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/ThingsPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/ThingsPage/HeaderContent',$imageName);
                }
            }


            
            $thingsHeaderContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update 100Things Header Content Opreation Success',true,200);
    }
}
