<?php

namespace App\Http\Controllers\API\Dashboard\LayoutiProducts;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiScope;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductScopeOfWork;
use Illuminate\Http\Request;

class ScopeOfWorkController extends Controller
{
    use Response;

    public $productScopeOfWork;
    public $layoutiScope;
    public $productGeneralInformation;

    public function __construct()
    {
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->productScopeOfWork = new ProductScopeOfWork();
        $this->layoutiScope = new LayoutiScope();

    }


    public function save(Request $request)
    {
        $productGeneralInformation = $this->productGeneralInformation->find($request->PID);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }

        $this->addProductScopeOfWork($request->titleEn,$request->titleAr,$request->descriptionEn,
        $request->descriptionAr,$request->category,$productGeneralInformation->id);

       

        return $this->ResponseData(null,'Save Project Scope Of Work Operation Success',true,200);


    }

    public function addProductScopeOfWork($titleEn,$titleAr,$descriptionEn,$descriptionAr,$category,$project)
    {
        $layoutiScope = NULL;
         if($this->layoutiScope->find($category) != NULL){
            $layoutiScope = $this->layoutiScope->find($category)->id;
        }

        $productScopeOfWork = $this->productScopeOfWork->where('project',$project)->first();

        $titleEn == "null" ?  $titleEn = null : $titleEn = $titleEn;
        $titleAr == "null" ?  $titleAr = null : $titleAr = $titleAr;
        $descriptionEn == "null" ?  $descriptionEn = null : $descriptionEn = $descriptionEn;
        $descriptionAr == "null" ?  $descriptionAr = null : $descriptionAr = $descriptionAr;


        if($productScopeOfWork != null){
            $productScopeOfWork->update([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'scope' => $layoutiScope,
                'project' => $project
            ]);
        }else{
            $this->productScopeOfWork->create([
                'titleEn' => $titleEn,
                'titleAr' => $titleAr,
                'descriptionEn' => $descriptionEn,
                'descriptionAr' => $descriptionAr,
                'scope' => $layoutiScope,
                'project' => $project
            ]);
        }

    }
}
