<?php

namespace App\Http\Controllers\API\Dashboard\ServicesPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ServicesPage\ServicesHeaderContent;
use Illuminate\Http\Request;

class HeaderContentController extends Controller
{
    use Response;
    public $servicesHeaderContent;

    public function __construct()
    {
        $this->servicesHeaderContent = new ServicesHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $servicesHeaderContent = $this->servicesHeaderContent->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;


        if(!$servicesHeaderContent){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/ServicesPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/ServicesPage/HeaderContent',$imageName);
            }
            $this->servicesHeaderContent->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }else{

            if($request->image == "null"){
                $imageName = null;
                if($servicesHeaderContent->image){
                    unlink($servicesHeaderContent->image);
                }
            }
            else{
                $imageName = $servicesHeaderContent->image;
                if(is_file($request->image)){
                    if($servicesHeaderContent->image){
                        unlink($imageName);
                    }
                    $imageName = 'media/ServicesPage/HeaderContent/'.time().'-'.$request->image->getClientOriginalName();
                    $request->image->move('media/ServicesPage/HeaderContent',$imageName);
                }
            }



            
            $servicesHeaderContent->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'image' => $imageName
            ]);
        }
        return $this->ResponseData(null,'Update Services Header Content Opreation Success',true,200);
    }
}
