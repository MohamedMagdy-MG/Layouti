<?php

namespace App\Http\Controllers\API\Dashboard\Avatars;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Avatars\AvatarsContentGenerator;
use Illuminate\Http\Request;

class ContentGeneratorPageController extends Controller
{
    use Response;

    public $avatarsContentGenerator;
    

    public function __construct()
    {
        $this->avatarsContentGenerator = new AvatarsContentGenerator();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $avatarsContentGenerator = $this->avatarsContentGenerator->first();

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 
        $request->smallDescriptionEn == "null" ? $smallDescriptionEn = null : $smallDescriptionEn = $request->smallDescriptionEn; 
        $request->smallDescriptionAr == "null" ? $smallDescriptionAr = null : $smallDescriptionAr = $request->smallDescriptionAr; 


        if(!$avatarsContentGenerator){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/Avatars/ContentGenerator/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Avatars/ContentGenerator',$imageName);
            }
            $this->avatarsContentGenerator->create([
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
                if($avatarsContentGenerator->image != null){
                    unlink($avatarsContentGenerator->image);
                }
            }else{
                $imageName = $avatarsContentGenerator->image;
                if(is_file($request->image)){
                    if($avatarsContentGenerator->image != null){
                        unlink($imageName);
                    }
                    $imageName = 'media/Avatars/ContentGenerator/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/Avatars/ContentGenerator',$imageName);
                }
            }
            $avatarsContentGenerator->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'smallDescriptionEn' => $smallDescriptionEn ,
                'smallDescriptionAr' => $smallDescriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update Avatars Content Generator Page Opreation Success',true,200);
    }

    
}
