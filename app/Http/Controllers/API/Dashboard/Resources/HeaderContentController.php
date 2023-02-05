<?php

namespace App\Http\Controllers\API\Dashboard\Resources;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Resources\ResourcesHeaderContentResource;
use App\Http\Traits\Response;
use App\Models\Resources\ResourcesHeaderContent;
use Illuminate\Http\Request;

class HeaderContentController extends Controller
{
    use Response;
    public $resourcesHeaderContent;

    public function __construct()
    {
        $this->resourcesHeaderContent = new ResourcesHeaderContent();
        $this->middleware('checkAuth');
    }

    public function index()
    {
        $this->resourcesHeaderContent->first() != null ? $data = new ResourcesHeaderContentResource($this->resourcesHeaderContent->first()) : $data = null;
        return $this->ResponseData($data,'get Resources Header Content Data Success',true,200);
    }

    public function save(Request $request)
    {

        $resourcesHeaderContent = $this->resourcesHeaderContent->first();

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 


        if(!$resourcesHeaderContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/Resources/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/Resources/HeaderContent',$imageName);
            }
            $this->resourcesHeaderContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr,
                'image' => $imageName 
            ]);
        }else{
            if($request->image == "null"){
                $imageName = null;
                if($resourcesHeaderContent->image){
                    unlink($resourcesHeaderContent->image);
                }
            }
            else{
                $imageName = $resourcesHeaderContent->image;
                if(is_file($request->image)){
                    if($resourcesHeaderContent->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/Resources/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/Resources/HeaderContent',$imageName);
                }
            }
            $resourcesHeaderContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
                
            ]);
        }
        return $this->ResponseData(null,'Update Resources Header Content Opreation Success',true,200);
    }
}
