<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\ProductPage\ProductGeneralInformationResource;
use App\Http\Resources\Frontend\WorkPage\LayoutiCategoriesResource;
use App\Http\Resources\Frontend\WorkPage\ProjectsResource;
use App\Http\Resources\Frontend\WorkPage\WorkHeaderContentResource;
use App\Http\Resources\Frontend\WorkPage\WorkWorkWeFiredUpInnovatedResource;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiCategories;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ProductPage\ProductViwers;
use App\Models\ProductPage\ProjectInformation;
use App\Models\WorkPage\WorkHeaderContent;
use App\Models\WorkPage\WorkWeFiredUpInnovated;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    use Response;

    public $workHeaderContent;
    public $workWeFiredUpInnovated;
    public $productGeneralInformation;
    public $layoutiCategories;
    public $projectInformation;
    public $productViwers;

    public function __construct()
    {

        $this->workHeaderContent = new WorkHeaderContent();
        $this->workWeFiredUpInnovated = new WorkWeFiredUpInnovated();
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->projectInformation = new ProjectInformation();
        $this->layoutiCategories = new LayoutiCategories();
        $this->productViwers = new ProductViwers();
    }



    public function find(Request $request)
    {

        $projectInformation = $this->projectInformation->where('nameEn',$request->name)->orWhere('nameAr',$request->name)->first();
        if(!$projectInformation){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }
        $productGeneralInformation = $this->productGeneralInformation->find($projectInformation->project);
        if($productGeneralInformation == null){
            return $this->ResponseData(null,'Project Not Found',false,400);
        }
        $productGeneralInformationRelated = $this->productGeneralInformation->where('id','!=',$productGeneralInformation->id)->take(3)->latest()->get();


        $this->productViwers->create([
            'ip' => $request->ip(),
            'project' => $productGeneralInformation->id
        ]);
        
        

        $data = [
            'project' => new ProductGeneralInformationResource($productGeneralInformation),
            'relatedProjects' => ProductGeneralInformationResource::collection($productGeneralInformationRelated)
        ];
        return $this->ResponseData($data, 'Find Product General Information Operation Success',true, 200);
    }
    public function index()
    {
        $category = null;
        if(array_key_exists('category',$_GET)){
            $category = $_GET['category'];
        }

        if($category != null){
            $category = $this->layoutiCategories->where('nameEn','LIKE','%'.$category.'%')->orWhere('nameEn','LIKE','%'.$category.'%')->first();
            $projects = [];

            foreach ($category->Products as $product) {
                if($product->Project != null){
                    array_push($projects,$product->Project->id);
                }
                
            }

            $data = [
                'WorkHeaderContent' => new WorkHeaderContentResource($this->workHeaderContent->first()??''),
                'WorkWeFiredUpInnovated'=> new WorkWorkWeFiredUpInnovatedResource($this->workWeFiredUpInnovated->first()??''),
                'Projcts' => ProductGeneralInformationResource::collection($this->productGeneralInformation->orderBy('order','ASC')->whereIn('id',$projects)->latest()->get()),
                'categories' => LayoutiCategoriesResource::collection($this->layoutiCategories->latest()->get())
    
            ];
        }
        else{
            $data = [
                'WorkHeaderContent' => new WorkHeaderContentResource($this->workHeaderContent->first()??''),
                'WorkWeFiredUpInnovated'=> new WorkWorkWeFiredUpInnovatedResource($this->workWeFiredUpInnovated->first()??''),
                'Projcts' => ProductGeneralInformationResource::collection($this->productGeneralInformation->orderBy('order','ASC')->latest()->get()),
                'categories' => LayoutiCategoriesResource::collection($this->layoutiCategories->latest()->get())
    
            ];
        }
        

        return $this->ResponseData($data,'get Work Page Data Success',true,200);
    }
}
