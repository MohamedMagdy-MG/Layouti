<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\HomePage\HeaderContentResource;
use App\Http\Resources\Dashboard\HomePage\NeedLayoutiForYourProjectResource;
use App\Http\Resources\Dashboard\HomePage\OurLastWorkResource;
use App\Http\Resources\Dashboard\HomePage\ProcessDesignSkillsResource;
use App\Http\Resources\Dashboard\HomePage\TestimonialsResource;
use App\Http\Resources\Dashboard\HomePage\ThingsResource;
use App\Http\Resources\Dashboard\HomePage\WhatWeWillServeResource;
use App\Http\Traits\Response;
use App\Models\HomePage\HeaderContent;
use App\Models\HomePage\NeedLayoutiForYourProject;
use App\Models\HomePage\OurLastWork;
use App\Models\HomePage\ProcessDesignSkills;
use App\Models\HomePage\Testimonials;
use App\Models\HomePage\things;
use App\Models\HomePage\WhatWeWillServe;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Http\Resources\Dashboard\ServicesPage\ProjectsResource;



class HomeController extends Controller
{
    use Response;

    public $headerContent;
    public $needLayoutiForYourProject;
    public $ourLastWork;
    public $processDesignSkills;
    public $testimonials;
    public $things;
    public $whatWeWillServe;
    public $productGeneralInformation;
    
    public function __construct()
    {

        $this->headerContent = new HeaderContent();
        $this->needLayoutiForYourProject = new NeedLayoutiForYourProject();
        $this->ourLastWork = new OurLastWork();
        $this->processDesignSkills = new ProcessDesignSkills();
        $this->testimonials = new Testimonials();
        $this->things = new things();
        $this->whatWeWillServe = new WhatWeWillServe();
        $this->productGeneralInformation = new ProductGeneralInformation();
        
        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'HeaderContent' => new HeaderContentResource($this->headerContent->first()??''),
            'WhatWeWillServe'=> new WhatWeWillServeResource($this->whatWeWillServe->first()??''),
            'OurLastWork' => new OurLastWorkResource($this->ourLastWork->first()??''),
            'ProcessDesignSkills' => new ProcessDesignSkillsResource($this->processDesignSkills->first()??''),
            'Testimonials' => new TestimonialsResource($this->testimonials->first()??''),
            'Things' => new ThingsResource($this->things->first()??''),
            'NeedLayoutiForYourProject' => new NeedLayoutiForYourProjectResource($this->needLayoutiForYourProject->first()??''),
            'Projects' => ProjectsResource::collection($this->productGeneralInformation->latest()->get()),

        ];

        return $this->ResponseData($data,'get Home Page Data Success',true,200);
    }

    
}
