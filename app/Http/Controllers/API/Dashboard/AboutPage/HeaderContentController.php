<?php

namespace App\Http\Controllers\API\Dashboard\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\AboutPage\AboutHeaderContent;
use Illuminate\Http\Request;

class HeaderContentController extends Controller
{
    use Response;
    public $aboutHeaderContent;

    public function __construct()
    {
        $this->aboutHeaderContent = new AboutHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $aboutHeaderContent = $this->aboutHeaderContent->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;


        if(!$aboutHeaderContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/AboutPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/AboutPage/HeaderContent',$imageName);
            }
            $this->aboutHeaderContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($aboutHeaderContent->image){
                    unlink($aboutHeaderContent->image);
                }
            }
            else{
                $imageName = $aboutHeaderContent->image;
                if(is_file($request->image)){
                    if($aboutHeaderContent->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/AboutPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/AboutPage/HeaderContent',$imageName);
                }
            }

            
            $aboutHeaderContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update About Header Content Opreation Success',true,200);
    }
}
