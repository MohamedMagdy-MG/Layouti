<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\ServicesPage\CategoriesResource;
use App\Http\Resources\Frontend\ServicesPage\HeaderContentResource;
use App\Http\Resources\Frontend\ServicesPage\LearnAboutLayoutiResource;
use App\Http\Resources\Frontend\ServicesPage\ProcessTimelineResource;
use App\Http\Traits\Response;
use App\Models\ServicesPage\ServicesCategories;
use App\Models\ServicesPage\ServicesHeaderContent;
use App\Models\ServicesPage\ServicesLearnAboutLayouti;
use App\Models\ServicesPage\ServicesProcessTimeline;


use App\Models\ProductPage\ProductGeneralInformation;
use App\Http\Resources\Frontend\WorkPage\ProjectsResource;

class ServicesController extends Controller
{
    use Response;

    public $headerContent;
    public $learnAboutLayouti;
    public $processTimeline;
    public $categories;


    public function __construct()
    {

        $this->headerContent = new ServicesHeaderContent();
        $this->learnAboutLayouti = new ServicesLearnAboutLayouti();
        $this->processTimeline = new ServicesProcessTimeline();
        $this->categories = new ServicesCategories();
    }
    public function index()
    {
        $data = [
            'HeaderContent' => new HeaderContentResource($this->headerContent->first()??''),
            'LearnAboutLayouti'=> new LearnAboutLayoutiResource($this->learnAboutLayouti->first()??''),
            'ProcessTimeline' => new ProcessTimelineResource($this->processTimeline->first()??''),
            'Categories' => CategoriesResource::collection($this->categories->get()),

        ];

        return $this->ResponseData($data,'get Services Page Data Success',true,200);
    }
}
