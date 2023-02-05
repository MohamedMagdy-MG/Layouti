<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductOurClients;
use Illuminate\Http\Request;

class OurClientsController extends Controller
{
    use Response;

    public $productOurClients;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productOurClients = new ProductOurClients();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        
        $this->addProductOurClients($request->userNameEn,$request->userNameAr,
        $request->positionEn,$request->positionAr,
        $request->descriptionEn,$request->descriptionAr,
        $request->image,$productGeneralInformation->id);
       

        return $this->ResponseData(null,'Save Project Our Clients Operation Success',true,200);


    }

    public function addProductOurClients($userNameEn,$userNameAr,$positionEn,$positionAr,$descriptionEn,$descriptionAr,$image,$project)
    {

        $productOurClients = $this->productOurClients->where('project',$project)->first();

        $userNameEn == "null" ?  $userNameEn = null : $userNameEn = $userNameEn;
        $userNameAr == "null" ?  $userNameAr = null : $userNameAr = $userNameAr;
        $positionEn == "null" ?  $positionEn = null : $positionEn = $positionEn;
        $positionAr == "null" ?  $positionAr = null : $positionAr = $positionAr;
        $descriptionEn == "null" ?  $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ?  $descriptionAr = null : $descriptionAr = $descriptionAr;
                
        if($productOurClients != null){

            if($image == "null"){
                $imageName = null;
                if($productOurClients->image != null){
                    unlink($productOurClients->image);
                }

            }else{
                $imageName = $productOurClients->image;
                if(is_file($image)){
                    if($productOurClients->image != null){
                        unlink($productOurClients->image);
                    }
                    $imageName = 'media/ProductPage/OurClients/'.time().'-'.$image->getClientOriginalName();
                    $image->move('media/ProductPage/OurClients',$imageName);
                }
            }


            
            $productOurClients->update([
                'userNameEn' => $userNameEn,
                'userNameAr' => $userNameAr,
                'positionEn' => $positionEn,
                'positionAr' => $positionAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }else{
            $imageName = null;
            if(is_file($image)){
                $imageName = 'media/ProductPage/OurClients/'.time().'-'.$image->getClientOriginalName();
                $image->move('media/ProductPage/OurClients',$imageName);
            }
            $this->productOurClients->create([
                'userNameEn' => $userNameEn,
                'userNameAr' => $userNameAr,
                'positionEn' => $positionEn,
                'positionAr' => $positionAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'image' => $imageName,
                'project' => $project
            ]);
        }

    }
}
