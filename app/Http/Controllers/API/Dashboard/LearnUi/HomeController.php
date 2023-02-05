<?php

namespace App\Http\Controllers\API\Dashboard\LearnUI;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\LearnUI\LearnUIDesignPackageResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIHeaderContentResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIHighlitsDesignResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIQuestionsCollapseResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIStepsReachCardsResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUITestimonialsResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIUXDesignPackageResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIUXUIDesignPackageResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIWhatOfferResource;
use App\Http\Resources\Dashboard\LearnUI\LearnUIWhoCanAttendResource;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIDesignPackage;
use App\Models\LearnUI\LearnUIHeaderContent;
use App\Models\LearnUI\LearnUIHighlitsDesign;
use App\Models\LearnUI\LearnUIQuestionsCollapse;
use App\Models\LearnUI\LearnUIStepsReachCards;
use App\Models\LearnUI\LearnUITestimonials;
use App\Models\LearnUI\LearnUIUXDesignPackage;
use App\Models\LearnUI\LearnUIUXUIDesignPackage;
use App\Models\LearnUI\LearnUIWhatOffer;
use App\Models\LearnUI\LearnUIWhoCanAttend;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use Response;

    public $learnUIHeaderContent;
    public $learnUIWhoCanAttend;
    public $learnUIWhatOffer;
    public $learnUIHighlitsDesign;
    public $learnUITestimonials;
    public $learnUIDesignPackage;
    public $learnUIUXDesignPackage;
    public $learnUIUXUIDesignPackage;
    public $learnUIStepsReachCards;
    public $learnUIQuestionsCollapse;

    public function __construct()
    {

        $this->learnUIHeaderContent = new LearnUIHeaderContent();
        $this->learnUIWhoCanAttend = new LearnUIWhoCanAttend();
        $this->learnUIWhatOffer = new LearnUIWhatOffer();
        $this->learnUIHighlitsDesign = new LearnUIHighlitsDesign();
        $this->learnUITestimonials = new LearnUITestimonials();
        $this->learnUIDesignPackage = new LearnUIDesignPackage();
        $this->learnUIUXDesignPackage = new LearnUIUXDesignPackage();
        $this->learnUIUXUIDesignPackage = new LearnUIUXUIDesignPackage();
        $this->learnUIStepsReachCards = new LearnUIStepsReachCards();
        $this->learnUIQuestionsCollapse = new LearnUIQuestionsCollapse();


        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'HeaderContent' => new LearnUIHeaderContentResource($this->learnUIHeaderContent->first()??''),
            'WhoCanAttend' => new LearnUIWhoCanAttendResource($this->learnUIWhoCanAttend->first()??''),
            'WhatOffer' => new LearnUIWhatOfferResource($this->learnUIWhatOffer->first()??''),
            'HighlitsDesign' => new LearnUIHighlitsDesignResource($this->learnUIHighlitsDesign->first()??''),
            'Testimonials' => new LearnUITestimonialsResource($this->learnUITestimonials->first()??''),
            'UIDesignPackage' => new LearnUIDesignPackageResource($this->learnUIDesignPackage->first()??''),
            'UXDesignPackage' => new LearnUIUXDesignPackageResource($this->learnUIUXDesignPackage->first()??''),
            'UXUIDesignPackage' => new LearnUIUXUIDesignPackageResource($this->learnUIUXUIDesignPackage->first()??''),
            'StepsReachCards' => new LearnUIStepsReachCardsResource($this->learnUIStepsReachCards->first()??''),
            'QuestionsCollapse' => new LearnUIQuestionsCollapseResource($this->learnUIQuestionsCollapse->first()??''),


        ];

        return $this->ResponseData($data,'get Learn UI Home Page Data Success',true,200);
    }
}
