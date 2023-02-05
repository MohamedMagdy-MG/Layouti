<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Blog\BlogAuthorResource;
use App\Http\Resources\Dashboard\Blog\BlogCategoryResource;
use App\Http\Resources\Dashboard\Configurations\AdminsResource;
use App\Http\Resources\Dashboard\Configurations\BudgetResource;
use App\Http\Resources\Dashboard\Configurations\DeliverableResource;
use App\Http\Resources\Dashboard\Configurations\INeedResource;
use App\Http\Resources\Dashboard\Configurations\LayoutiCategoriesFaqsResource;
use App\Http\Resources\Dashboard\Configurations\LayoutiCategoriesResource;
use App\Http\Resources\Dashboard\Configurations\LayoutiCategoriesServicesResource;
use App\Http\Resources\Dashboard\Configurations\ResourcesCategoryResource;
use App\Http\Resources\Dashboard\Configurations\ResourcesSubCategoryResource;
use App\Http\Resources\Dashboard\Configurations\ScopeResource;
use App\Http\Traits\Response;
use App\Models\Blog\BlogAuthor;
use App\Models\Blog\BlogCategory;
use App\Models\Configurations\Deliverable;
use App\Models\Configurations\LayoutiBudget;
use App\Models\Configurations\LayoutiCategories;
use App\Models\Configurations\LayoutiCategoriesFaqs;
use App\Models\Configurations\LayoutiCategoriesServices;
use App\Models\Configurations\LayoutiINeed;
use App\Models\Configurations\LayoutiScope;
use App\Models\Configurations\ResourcesCategory;
use App\Models\Configurations\ResourcesSubCategory;
use App\Models\DaysDesign\DesignCategory;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    use Response;

    public $layoutiCategories;
    public $DesignCategory;
    public $layoutiCategoriesServices;
    public $layoutiCategoriesFaqs;
    public $blogCategory;
    public $resourcesCategory;
    public $resourcesSubCategory;
    public $blogAuthor;
    public $layoutiBudget;
    public $layoutiINeed;
    public $layoutiScope;
    public $deliverable;

    public function __construct()
    {
        $this->DesignCategory = new DesignCategory();
        $this->layoutiCategories = new LayoutiCategories();
        $this->layoutiCategoriesServices = new LayoutiCategoriesServices();
        $this->layoutiCategoriesFaqs = new LayoutiCategoriesFaqs();
        $this->blogCategory = new BlogCategory();
        $this->resourcesCategory = new ResourcesCategory();
        $this->resourcesSubCategory = new ResourcesSubCategory();
        $this->blogAuthor = new BlogAuthor();
        $this->layoutiBudget = new LayoutiBudget();
        $this->layoutiINeed = new LayoutiINeed();
        $this->layoutiScope = new LayoutiScope();
        $this->deliverable = new Deliverable();
        $this->middleware('checkAuth');
        
    }

    public function index()
    {
        $DesignCategory = $this->DesignCategory->orderBy('order','ASC')->get();
        $layoutiCategories = $this->layoutiCategories->orderBy('order','ASC')->get();
        $layoutiCategoriesServices = $this->layoutiCategoriesServices->orderBy('order','ASC')->get();
        $layoutiCategoriesFaqs = $this->layoutiCategoriesFaqs->orderBy('order','ASC')->get();
        $blogCategory = $this->blogCategory->orderBy('order','ASC')->get();
        $resourcesCategory = $this->resourcesCategory->orderBy('order','ASC')->get();
        $resourcesSubCategory = $this->resourcesSubCategory->orderBy('order','ASC')->get();
        $blogAuthor = $this->blogAuthor->get();
        $layoutiBudget = $this->layoutiBudget->orderBy('order','ASC')->get();
        $layoutiINeed = $this->layoutiINeed->orderBy('order','ASC')->get();
        $layoutiScope = $this->layoutiScope->get();
        $deliverable = $this->deliverable->get();




        $data = [
            '365DesignCategory' => AdminsResource::collection($DesignCategory),
            'layoutiCategoriesServices'=> LayoutiCategoriesServicesResource::collection($layoutiCategoriesServices),
            'LayoutiCategories' => LayoutiCategoriesResource::collection($layoutiCategories),
            'blogCategory'=> BlogCategoryResource::collection($blogCategory),
            'layoutiCategoriesFaqs'=> LayoutiCategoriesFaqsResource::collection($layoutiCategoriesFaqs),
            'resourcesCategory'=> ResourcesCategoryResource::collection($resourcesCategory),
            'resourcesSubCategory'=> ResourcesSubCategoryResource::collection($resourcesSubCategory),
            'blogAuthor'=> BlogAuthorResource::collection($blogAuthor),
            'layoutiBudget'=> BudgetResource::collection($layoutiBudget),
            'layoutiINeed'=> INeedResource::collection($layoutiINeed),
            'layoutiScope'=> ScopeResource::collection($layoutiScope),
            'deliverable'=> DeliverableResource::collection($deliverable),
        ];

        return $this->ResponseData($data,'Get All Layouti Configurations Operation Success',true,200);
    }
}
