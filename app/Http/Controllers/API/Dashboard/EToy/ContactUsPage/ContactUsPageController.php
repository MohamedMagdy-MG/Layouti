<?php

namespace App\Http\Controllers\API\Dashboard\EToy\ContactUsPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\EToy\ContactUs\ContactUsPageHeaderContentResource;
use App\Http\Resources\Dashboard\EToy\ContactUs\ContactUsPageSectionOneResource;
use App\Http\Resources\Dashboard\EToy\ContactUs\ContactUsPageSectionTwoResource;

use App\Http\Resources\Dashboard\EToy\ContactUs\ContactUsPageSeoResource;


use App\Http\Traits\Response;
use App\Models\EToy\ContactUsPage\ContactUsPageHeaderContent;
use App\Models\EToy\ContactUsPage\ContactUsPageSectionOne;
use App\Models\EToy\ContactUsPage\ContactUsPageSectionTwo;

use App\Models\EToy\SeoPage\SeoPageContactPage;


class ContactUsPageController extends Controller
{
    use Response;

    public $contactUsPageHeaderContent;
    public $contactUsPageSectionOne;
    public $contactUsPageSectionTwo;
    
    public $seoPageContactPage;

    public function __construct()
    {

        $this->contactUsPageHeaderContent = new ContactUsPageHeaderContent();
        $this->contactUsPageSectionOne = new ContactUsPageSectionOne();
        $this->contactUsPageSectionTwo = new ContactUsPageSectionTwo();
        
        $this->seoPageContactPage = new SeoPageContactPage();

        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'headerContent' => new ContactUsPageHeaderContentResource($this->contactUsPageHeaderContent->first()??''),
            'sectionOne' => new ContactUsPageSectionOneResource($this->contactUsPageSectionOne->first()??''),
            'secitonTwo' => new ContactUsPageSectionTwoResource($this->contactUsPageSectionTwo->first()??''),
            'seo' => new ContactUsPageSeoResource($this->seoPageContactPage->first()??''),

        ];

        return $this->ResponseData($data,'get EToy Contact Us Page Data Success',true,200);
    }
}
