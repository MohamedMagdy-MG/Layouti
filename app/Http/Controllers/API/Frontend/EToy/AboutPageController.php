<?php

namespace App\Http\Controllers\API\Frontend\EToy;

use App\Http\Controllers\Controller;
use App\Http\Resources\Frontend\EToy\About\AboutPageHeaderContentResource;
use App\Http\Resources\Frontend\EToy\About\AboutPageSectionOneResource;
use App\Http\Resources\Frontend\EToy\About\AboutPageSectionTwoResource;

use App\Http\Resources\Frontend\EToy\About\AboutPageSeoResource;


use App\Http\Traits\Response;
use App\Models\EToy\AboutPage\AboutPageHeaderContent;
use App\Models\EToy\AboutPage\AboutPageSecitonTwo;
use App\Models\EToy\AboutPage\AboutPageSectionOne;

use App\Models\EToy\SeoPage\SeoPageAboutPage;


use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    use Response;

    public $aboutPageHeaderContent;
    public $aboutPageSectionOne;
    public $aboutPageSecitonTwo;
    public $seoPageAboutPage;

    public function __construct()
    {

        $this->aboutPageHeaderContent = new AboutPageHeaderContent();
        $this->aboutPageSectionOne = new AboutPageSectionOne();
        $this->aboutPageSecitonTwo = new AboutPageSecitonTwo();

        $this->seoPageAboutPage = new SeoPageAboutPage();

    }
    public function index()
    {
        $data = [
            'headerContent' => new AboutPageHeaderContentResource($this->aboutPageHeaderContent->first()??''),
            'sectionOne' => new AboutPageSectionOneResource($this->aboutPageSectionOne->first()??''),
            'secitonTwo' => new AboutPageSectionTwoResource($this->aboutPageSecitonTwo->first()??''),
            'seo' => new AboutPageSeoResource($this->seoPageAboutPage->first()??''),

        ];

        return $this->ResponseData($data,'get EToy About Page Data Success',true,200);
    }
}
