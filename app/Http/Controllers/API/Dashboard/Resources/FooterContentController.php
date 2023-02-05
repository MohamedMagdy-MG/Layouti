<?php

namespace App\Http\Controllers\API\Dashboard\Resources;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Resources\ResourcesFooterContentResource;
use App\Http\Traits\Response;
use App\Models\Resources\ResourcesFooterContent;
use Illuminate\Http\Request;

class FooterContentController extends Controller
{
    use Response;
    public $resourcesFooterContent;

    public function __construct()
    {
        $this->resourcesFooterContent = new ResourcesFooterContent();
        $this->middleware('checkAuth');
    }

    public function index()
    {
        $this->resourcesFooterContent->first() != null ? $data = new ResourcesFooterContentResource($this->resourcesFooterContent->first()) : $data = null;
        return $this->ResponseData($data,'get Resources Footer Content Data Success',true,200);
    }

    public function save(Request $request)
    {

        $resourcesFooterContent = $this->resourcesFooterContent->first();

        $request->titleEn == "null" ? $titleEn = null : $titleEn = $request->titleEn; 
        $request->titleAr == "null" ? $titleAr = null : $titleAr = $request->titleAr; 
        $request->descriptionEn == "null" ? $descriptionEn = null : $descriptionEn = $request->descriptionEn; 
        $request->descriptionAr == "null" ? $descriptionAr = null : $descriptionAr = $request->descriptionAr; 


        if(!$resourcesFooterContent){
            $this->resourcesFooterContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr    
            ]);
        }else{
            $resourcesFooterContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                
            ]);
        }
        return $this->ResponseData(null,'Update Resources Footer Content Opreation Success',true,200);
    }
}
