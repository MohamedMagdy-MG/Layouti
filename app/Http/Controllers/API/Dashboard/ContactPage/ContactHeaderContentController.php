<?php

namespace App\Http\Controllers\API\Dashboard\ContactPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ContactPage\ContactHeaderContent;
use Illuminate\Http\Request;

class ContactHeaderContentController extends Controller
{
    use Response;
    public $contactHeaderContent;

    public function __construct()
    {
        $this->contactHeaderContent = new ContactHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $contactHeaderContent = $this->contactHeaderContent->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$contactHeaderContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/ContactPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/ContactPage/HeaderContent',$imageName);
            }
            $this->contactHeaderContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($contactHeaderContent->image){
                    unlink($contactHeaderContent->image);
                }
            }
            else{
                $imageName = $contactHeaderContent->image;
                if(is_file($request->image)){
                    if($contactHeaderContent->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/ContactPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/ContactPage/HeaderContent',$imageName);
                }
            }

            
            $contactHeaderContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update Contact Header Content Opreation Success',true,200);
    }
}
