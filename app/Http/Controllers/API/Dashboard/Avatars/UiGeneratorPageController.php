<?php

namespace App\Http\Controllers\API\Dashboard\Avatars;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Avatars\AvatarsUIGenerator;
use Illuminate\Http\Request;

class UiGeneratorPageController extends Controller
{
    use Response;

    public $avatarsUIGenerator;
    

    public function __construct()
    {
        $this->avatarsUIGenerator = new AvatarsUIGenerator();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $avatarsUIGenerator = $this->avatarsUIGenerator->first();

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 
        $request->smallDescriptionEn == "null" ? $smallDescriptionEn = null : $smallDescriptionEn = $request->smallDescriptionEn; 
        $request->smallDescriptionAr == "null" ? $smallDescriptionAr = null : $smallDescriptionAr = $request->smallDescriptionAr; 


        if(!$avatarsUIGenerator){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/Avatars/UiGeneratorPage/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Avatars/UiGeneratorPage',$imageName);
            }
            $this->avatarsUIGenerator->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'smallDescriptionEn' => $smallDescriptionEn ,
                'smallDescriptionAr' => $smallDescriptionAr ,
                'image' => $imageName
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($avatarsUIGenerator->image != null){
                    unlink($avatarsUIGenerator->image);
                }
            }else{
                $imageName = $avatarsUIGenerator->image;
                if(is_file($request->image)){
                    if($avatarsUIGenerator->image != null){
                        unlink($imageName);
                    }
                    $imageName = 'media/Avatars/UiGeneratorPage/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/Avatars/UiGeneratorPage',$imageName);
                }
            }
            $avatarsUIGenerator->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'smallDescriptionEn' => $smallDescriptionEn ,
                'smallDescriptionAr' => $smallDescriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update Avatars Ui Generator Page Opreation Success',true,200);
    }

    
}
