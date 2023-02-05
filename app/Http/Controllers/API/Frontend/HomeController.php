<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Traits\Response;
use App\Models\HomePage\HeaderContent;
use App\Models\HomePage\NeedLayoutiForYourProject;
use App\Models\HomePage\OurLastWork;
use App\Models\HomePage\ProcessDesignSkills;
use App\Models\HomePage\Testimonials;
use App\Models\ThingsPage\ThingsOpportunityAlwaysExists;
use App\Models\HomePage\WhatWeWillServe;
use App\Models\HomePage\things;

use App\Http\Resources\Frontend\HomePage\HeaderContentResource;
use App\Http\Resources\Frontend\HomePage\NeedLayoutiForYourProjectResource;
use App\Http\Resources\Frontend\HomePage\OurLastWorkResource;
use App\Http\Resources\Frontend\HomePage\ProcessDesignSkillsResource;
use App\Http\Resources\Frontend\HomePage\TestimonialsResource;
use App\Http\Resources\Frontend\HomePage\ThingsResource;
use App\Http\Resources\Frontend\HomePage\ThingsCardsResource;
use App\Http\Resources\Frontend\HomePage\WhatWeWillServeResource;
use App\Http\Resources\Frontend\ProductPage\ProductGeneralInformationResource;
use App\Models\ProductPage\ProductGeneralInformation;
use App\Http\Resources\Frontend\WorkPage\ProjectsResource;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use App\Models\Configurations\Countries;
use App\Models\HomePage\Pages;
use App\Models\HomePage\PagesVisitors;


class HomeController extends Controller
{
    use Response;

    public $headerContent;
    public $needLayoutiForYourProject;
    public $ourLastWork;
    public $processDesignSkills;
    public $testimonials;
    public $things;
    public $thingsCards;
    public $whatWeWillServe;
    public $productGeneralInformation;
    public $countries;
    public $pages;
    public $pagesVisitors;


    public function __construct()
    {

        $this->headerContent = new HeaderContent();
        $this->needLayoutiForYourProject = new NeedLayoutiForYourProject();
        $this->ourLastWork = new OurLastWork();
        $this->processDesignSkills = new ProcessDesignSkills();
        $this->testimonials = new Testimonials();
        $this->things = new things();
        $this->thingsCards = new ThingsOpportunityAlwaysExists();
        $this->whatWeWillServe = new WhatWeWillServe();
        $this->productGeneralInformation = new ProductGeneralInformation();
        $this->countries = new Countries();
        $this->pages = new Pages();
        $this->pagesVisitors = new PagesVisitors();

        
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
            'ThingsCards' => ThingsCardsResource::collection($this->thingsCards->latest()->take(2)->get()),
            'NeedLayoutiForYourProject' => new NeedLayoutiForYourProjectResource($this->needLayoutiForYourProject->first()??''),
            'projects' => ProductGeneralInformationResource::collection($this->productGeneralInformation->whereIn('id',json_decode($this->ourLastWork->first()->lastwork))->get())

        ];

        return $this->ResponseData($data,'get Home Page Data Success',true,200);
    }

    public function NotFound()
    {
        return $this->ResponseData(null,'Page Not Found',false,404);
    }

    public function Visitor(Request $request)
    {

        $validator = Validator::make($request->only('page'),[
            'page' => 'required'
        ]);
        if($validator->fails()){
            return $this->ResponseData(null,'Add Visitor Page Operation Failed',false,400,$validator->errors());
        }

        $page = $this->pages->where('page','LIKE','%'.$request->page.'%')->first();
        if($page != null){
            $count = $page->count +1 ;
            $page->update([
                'count' => $count
            ]);
        }else{
            $count = 1 ;
            $page = $this->pages->create([
                'page' => $request->page,
                'count' => $count
            ]);
        }

        try{
            $ip = $request->ip();
            $json = Http::get('http://ipinfo.io/'.$ip.'/geo');
            $countryName =  $json['country'];
            if($countryName == "IL"){
                $countryName = "PS";
                        
            }
        }
        catch(Exception $ex){
            $countryName = "AE";
        }

        $country = $this->countries->where('code',$countryName)->first();
        $country != null ? $countryID = $country->id : $countryID = null;
        
        $pagesVisitors = $this->pagesVisitors->where('country',$countryID)->where('page',$page->id)->first();
        if($pagesVisitors != null){
            $count = $pagesVisitors->count +1 ;
            $pagesVisitors->update([
                'count' => $count
            ]);
        }else{
            $count = 1 ;
            $pagesVisitors = $this->pagesVisitors->create([
                'country' => $countryID,
                'page' => $page->id,
                'count' => $count
            ]);
        }

        return $this->ResponseData(null,'Add Visitor Page Operation Success',true,200);


        
       
    }
}
