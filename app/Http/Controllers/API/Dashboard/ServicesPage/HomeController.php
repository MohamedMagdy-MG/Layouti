<?php

namespace App\Http\Controllers\API\Dashboard\ServicesPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ServicesPage\CategoriesResource;
use App\Http\Resources\Dashboard\ServicesPage\HeaderContentResource;
use App\Http\Resources\Dashboard\ServicesPage\LearnAboutLayoutiResource;
use App\Http\Resources\Dashboard\ServicesPage\ProcessTimelineResource;
use App\Http\Resources\Dashboard\ServicesPage\ProjectsResource;
use App\Http\Traits\Response;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Models\ServicesPage\ServicesCategories;
use App\Models\ServicesPage\ServicesHeaderContent;
use App\Models\ServicesPage\ServicesLearnAboutLayouti;
use App\Models\ServicesPage\ServicesProcessTimeline;

class HomeController extends Controller
{
    use Response;

    public $headerContent;
    public $learnAboutLayouti;
    public $processTimeline;
    public $categories;
    public $productGeneralInformation;

    public function __construct()
    {

        $this->headerContent = new ServicesHeaderContent();
        $this->learnAboutLayouti = new ServicesLearnAboutLayouti();
        $this->processTimeline = new ServicesProcessTimeline();
        $this->categories = new ServicesCategories();
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'HeaderContent' => new HeaderContentResource($this->headerContent->first()??''),
            'LearnAboutLayouti'=> new LearnAboutLayoutiResource($this->learnAboutLayouti->first()??''),
            'ProcessTimeline' => new ProcessTimelineResource($this->processTimeline->first()??''),
            'Categories' => CategoriesResource::collection($this->categories->get()),
            'Projects' => ProjectsResource::collection($this->productGeneralInformation->latest()->get()),

        ];

        return $this->ResponseData($data,'get Services Page Data Success',true,200);
    }
}
