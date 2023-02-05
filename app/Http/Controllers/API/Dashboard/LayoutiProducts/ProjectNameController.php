<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductProjectName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProjectNameController extends Controller
{
    use Response;

    public $productProjectName;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productProjectName = new ProductProjectName();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        $ProjectInformationCards_count   = count($request->cards);
        $ProjectInformationCards  = $request->cards;
        $this->addProductProjectName($ProjectInformationCards,$ProjectInformationCards_count,$productGeneralInformation->id);

        return $this->ResponseData(null,'Save Project Name Operation Success',true,200);


    }

    public function addProductProjectName($cards,$cardsCount,$project)
    {

        if($cardsCount > 0){
            foreach($cards as $key => $card){
                $productProjectName = $this->productProjectName->where('project',$project)->skip($key)->first();

                $card['titleEn'] == "null" ?  $titleEn = null : $titleEn = $card['titleEn'];
                $card['titleAr'] == "null" ?  $titleAr = null : $titleAr = $card['titleAr'];
                $card['labelEn'] == "null" ?  $labelEn = null : $labelEn = $card['labelEn'];
                $card['labelAr'] == "null" ?  $labelAr = null : $labelAr = $card['labelAr'];

                if($productProjectName != null){
                    $productProjectName->update([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'project' => $project
                    ]);
                }
                else{
                    $this->productProjectName->create([
                        'labelEn' => $labelEn,
                        'labelAr' => $labelAr,
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'project' => $project
                    ]);
                }

            }
        }
    }

    public function DeleteProjctName(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Product Projct Name Operation Failed',false,400,$validator->errors());
        }else{
            $productProjectName = $this->productProjectName->find($request->id);
            if($productProjectName == null){
                return $this->ResponseData(null,'Product Project Name Not Found',false,400);
            }
            $productProjectName->delete();
            return $this->ResponseData(null,'Delete Product Projct Name Operation success',true,200);

        }
    }
}
