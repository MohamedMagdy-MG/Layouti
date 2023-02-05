<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProjectInformation;
use Illuminate\Http\Request;

class ProjectInformationController extends Controller
{
    use Response;

    public $projectInformation;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->projectInformation = new ProjectInformation();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        $this->addProjectInformation($request->nameEn,$request->nameAr,
        $request->slogenEn,$request->slogenAr,$request->descriptionEn,
        $request->descriptionAr,$productGeneralInformation->id);


       

        return $this->ResponseData(null,'Save Project Information Operation Success',true,200);


    }

    public function addProjectInformation($nameEn,$nameAr,$slogenEn,$slogenAr,$descriptionEn,$descriptionAr,$project)
    {

        $projectInformation = $this->projectInformation->where('project',$project)->first();

        $nameEn == "null" ?  $nameEn = null : $nameEn = $nameEn;
        $nameAr == "null" ?  $nameAr = null : $nameAr = $nameAr;
        $slogenEn == "null" ?  $slogenEn = null : $slogenEn = $slogenEn;
        $slogenAr == "null" ?  $slogenAr = null : $slogenAr = $slogenAr;
        $descriptionEn == "null" ?  $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ?  $descriptionAr = null : $descriptionAr = $descriptionAr;

        if($projectInformation != null){
            $projectInformation->update([
                'nameEn' => $nameEn,
                'nameAr' => $nameAr,
                'slogenEn' => $slogenEn,
                'slogenAr' => $slogenAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }else{
            $projectInformation = $this->projectInformation->create([
                'nameEn' => $nameEn,
                'nameAr' => $nameAr,
                'slogenEn' => $slogenEn,
                'slogenAr' => $slogenAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'project' => $project
            ]);
        }


    }

    
}
