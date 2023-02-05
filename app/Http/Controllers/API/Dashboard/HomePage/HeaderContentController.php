<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\HomePage\HeaderContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HeaderContentController extends Controller
{
    use Response;
    public $headerContent;
    
    public function __construct()
    {
        $this->headerContent = new HeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        
        $headerContent = $this->headerContent->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$headerContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/HomePage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/HomePage/HeaderContent',$imageName);
            }
            $this->headerContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName 
            ]);
        }else{
            if($request->image == "null"){
                $imageName = null;
                if($headerContent->image){
                    unlink($headerContent->image);
                }
            }
            else{
                $imageName = $headerContent->image;
                if(is_file($request->image)){
                    if($headerContent->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/HomePage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/HomePage/HeaderContent',$imageName);
                }
            }
            
            $headerContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update Header Content Opreation Success',true,200);
    }
}
