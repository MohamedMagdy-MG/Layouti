<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\LearnUiRequest;
use App\Http\Resources\Dashboard\Configurations\CountriesResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIDesignPackageResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIHeaderContentResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIHighlitsDesignResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIQuestionsCollapseResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIStepsReachCardsResource;
use App\Http\Resources\Frontend\LearnUI\LearnUITestimonialsResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIUXDesignPackageResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIUXUIDesignPackageResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIWhatOfferResource;
use App\Http\Resources\Frontend\LearnUI\LearnUIWhoCanAttendResource;
use App\Http\Traits\Response;
use App\Models\Configurations\Countries;
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
use App\Models\LearnUI\SendLearnUI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class LearnUiController extends Controller
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
    public $country;
    public $learnUiRequest;
    public $sendLearnUI;

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
        $this->country = new Countries();
        $this->learnUiRequest = new LearnUiRequest();
        $this->sendLearnUI = new SendLearnUI();


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


    public function getCountry()
    {
        try{
            $ip = request()->ip();
            $json = Http::get('http://ipinfo.io/'.$ip.'/geo');
            $code =  $json['country'];

        }catch(\Exception $ex){
            return $this->ResponseData(null , 'cant find Country' , false,400);
        }
        $country = $this->country->where('code',$code)->first();
        return $this->ResponseData(new CountriesResource($country), 'Success To get Country Code ' , true,200);;
    }


    public function send(Request $request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        if($language == 'ar'){
            $errMessag = "فشلت عملية التسجيل فى الكورس ";
            $successMessag = "نجحت عملية ارسال التسجيل فى الكورس";
        }else{
            $errMessag = "Send Register To Course Opreation Failed.";
            $successMessag = "Send Register To Course Opreation Success.";
        }
        $validator = Validator::make($request->only('fullName','email','phone','package','country'),$this->learnUiRequest->rules(),$this->learnUiRequest->Message());
        if($validator->fails()){
            return $this->ResponseData(null,$errMessag,false,400,$validator->errors());
        }else{
            $this->sendLearnUI->create([
                'fullName'  => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'package' => $request->package,
                'country' => $request->country
            ]);

            return $this->ResponseData(null,$successMessag,true,200);

        }
    }

}
