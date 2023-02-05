<?php

namespace App\Http\Controllers\API\Dashboard\EToy\TermsAndConditionsPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\EToy\TermsAndConditions\TermsAndConditionsPageHeaderContentResource;
use App\Http\Resources\Dashboard\EToy\TermsAndConditions\TermsAndConditionsPageHowToEarnPointsResource;
use App\Http\Resources\Dashboard\EToy\TermsAndConditions\TermsAndConditionsPagePhotoGuidelinesResource;
use App\Http\Resources\Dashboard\EToy\TermsAndConditions\TermsAndConditionsPagePointsPolicyResource;
use App\Http\Resources\Dashboard\EToy\TermsAndConditions\TermsAndConditionsPageRegistrationResource;
use App\Http\Resources\Dashboard\EToy\TermsAndConditions\TermsAndConditionsPageTermsOfUseResource;

use App\Http\Resources\Dashboard\EToy\TermsAndConditions\TermsAndConditionsPageSeoResource;

use App\Http\Traits\Response;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageHeaderContent;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageHowToEarnPoints;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPagePhotoGuidelines;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPagePointsPolicy;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageRegistration;
use App\Models\EToy\TermsAndConditionsPage\TermsAndConditionsPageTermsOfUse;

use App\Models\EToy\SeoPage\SeoPageTermsAndConditionsPage;

use Illuminate\Http\Request;

class TermsAndConditionsPageController extends Controller
{
    use Response;

    public $termsAndConditionsPageHeaderContent;
    public $termsAndConditionsPageTermsOfUse;
    public $termsAndConditionsPageRegistration;
    public $termsAndConditionsPagePhotoGuidelines;
    public $termsAndConditionsPagePointsPolicy;
    public $termsAndConditionsPageHowToEarnPoints;
    public $seoPageTermsAndConditionsPage;

    public function __construct()
    {

        $this->termsAndConditionsPageHeaderContent = new TermsAndConditionsPageHeaderContent();
        $this->termsAndConditionsPageTermsOfUse = new TermsAndConditionsPageTermsOfUse();
        $this->termsAndConditionsPageRegistration = new TermsAndConditionsPageRegistration();
        $this->termsAndConditionsPagePhotoGuidelines = new TermsAndConditionsPagePhotoGuidelines();
        $this->termsAndConditionsPagePointsPolicy = new TermsAndConditionsPagePointsPolicy();
        $this->termsAndConditionsPageHowToEarnPoints = new TermsAndConditionsPageHowToEarnPoints();
        $this->seoPageTermsAndConditionsPage = new SeoPageTermsAndConditionsPage();

        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'headerContent' => new TermsAndConditionsPageHeaderContentResource($this->termsAndConditionsPageHeaderContent->first()??''),
            'termsOfUse' => new TermsAndConditionsPageTermsOfUseResource($this->termsAndConditionsPageTermsOfUse->first()??''),
            'registration' => new TermsAndConditionsPageRegistrationResource($this->termsAndConditionsPageRegistration->first()??''),
            'photoGuidelines' => new TermsAndConditionsPagePhotoGuidelinesResource($this->termsAndConditionsPagePhotoGuidelines->first()??''),
            'pointsPolicy' => new TermsAndConditionsPagePointsPolicyResource($this->termsAndConditionsPagePointsPolicy->first()??''),
            'howToEarnPoints' => new TermsAndConditionsPageHowToEarnPointsResource($this->termsAndConditionsPageHowToEarnPoints->first()??''),
            'seo' => new TermsAndConditionsPageSeoResource($this->seoPageTermsAndConditionsPage->first()??''),

        ];

        return $this->ResponseData($data,'get EToy Terms And Conditions Page Data Success',true,200);
    }
}
