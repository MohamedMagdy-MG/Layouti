<?php

namespace App\Http\Controllers\API\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\ContactPage\HeaderContentResource;
use App\Http\Resources\Frontend\ContactPage\ContactWeFiredUpInnovatedResource;
use App\Http\Resources\Frontend\ContactPage\ContactInformationResource;
use App\Http\Resources\Frontend\ContactPage\ContactCompanyDeckResource;
use App\Http\Resources\Frontend\ContactPage\ContactFAQsResource;
use App\Http\Resources\Frontend\ContactPage\CategoryFaqsResource;
use App\Http\Traits\Response;
use App\Models\ContactPage\ContactCompanyDeck;
use App\Models\ContactPage\ContactFAQs;
use App\Models\ContactPage\ContactHeaderContent;
use App\Models\ContactPage\ContactInformation;
use App\Models\ContactPage\ContactWeFiredUpInnovated;
use App\Models\Configurations\LayoutiCategoriesFaqs;


class ContactController extends Controller
{
    use Response;

    public $contactHeaderContent;
    public $contactWeFiredUpInnovated;
    public $contactInformation;
    public $contactCompanyDeck;
    public $layoutiCategoriesFaqs;
    public $contactFAQs;

    public function __construct()
    {

        $this->contactHeaderContent = new ContactHeaderContent();
        $this->contactWeFiredUpInnovated = new ContactWeFiredUpInnovated();
        $this->contactInformation = new ContactInformation();
        $this->contactCompanyDeck = new ContactCompanyDeck();
        $this->layoutiCategoriesFaqs = new LayoutiCategoriesFaqs();
        $this->contactFAQs = new ContactFAQs();
    }
    public function index()
    {
        $data = [
            'HeaderContent' => new HeaderContentResource($this->contactHeaderContent->first()??''),
            'WeFiredUpInnovated'=> new ContactWeFiredUpInnovatedResource($this->contactWeFiredUpInnovated->first()??''),
            'Information' => new ContactInformationResource($this->contactInformation->first()??''),
            'CompanyDeck' => new ContactCompanyDeckResource($this->contactCompanyDeck->first()??''),
            'FAQs' => new ContactFAQsResource($this->contactFAQs->first()),

            'FAQsCards' => CategoryFaqsResource::collection($this->layoutiCategoriesFaqs->get()->all()),

        ];

        return $this->ResponseData($data,'get Contact Page Data Success',true,200);
    }
}
