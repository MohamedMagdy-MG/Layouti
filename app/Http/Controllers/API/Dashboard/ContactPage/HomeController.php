<?php

namespace App\Http\Controllers\API\Dashboard\ContactPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ContactPage\HeaderContentResource;
use App\Http\Resources\Dashboard\ContactPage\ContactWeFiredUpInnovatedResource;
use App\Http\Resources\Dashboard\ContactPage\ContactInformationResource;
use App\Http\Resources\Dashboard\ContactPage\ContactCompanyDeckResource;
use App\Http\Resources\Dashboard\ContactPage\ContactFAQsResource;
use App\Http\Traits\Response;
use App\Models\ContactPage\ContactCompanyDeck;
use App\Models\ContactPage\ContactFAQs;
use App\Models\ContactPage\ContactHeaderContent;
use App\Models\ContactPage\ContactInformation;
use App\Models\ContactPage\ContactWeFiredUpInnovated;

class HomeController extends Controller
{
    use Response;

    public $contactHeaderContent;
    public $contactWeFiredUpInnovated;
    public $contactInformation;
    public $contactCompanyDeck;
    public $contactFAQs;

    public function __construct()
    {

        $this->contactHeaderContent = new ContactHeaderContent();
        $this->contactWeFiredUpInnovated = new ContactWeFiredUpInnovated();
        $this->contactInformation = new ContactInformation();
        $this->contactCompanyDeck = new ContactCompanyDeck();
        $this->contactFAQs = new ContactFAQs();
        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'HeaderContent' => new HeaderContentResource($this->contactHeaderContent->first()??''),
            'WeFiredUpInnovated'=> new ContactWeFiredUpInnovatedResource($this->contactWeFiredUpInnovated->first()??''),
            'Information' => new ContactInformationResource($this->contactInformation->first()??''),
            'CompanyDeck' => new ContactCompanyDeckResource($this->contactCompanyDeck->first()??''),
            'FAQs' => new ContactFAQsResource($this->contactFAQs->first()??''),

        ];

        return $this->ResponseData($data,'get Contact Page Data Success',true,200);
    }
}
