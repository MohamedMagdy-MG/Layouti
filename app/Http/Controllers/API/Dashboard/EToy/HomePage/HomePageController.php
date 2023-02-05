<?php

namespace App\Http\Controllers\API\Dashboard\EToy\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\EToy\Home\HomePageHeaderContentResource;
use App\Http\Resources\Dashboard\EToy\Home\HomePageSectionFourResource;
use App\Http\Resources\Dashboard\EToy\Home\HomePageSectionOneResource;
use App\Http\Resources\Dashboard\EToy\Home\HomePageSectionThreeResource;
use App\Http\Resources\Dashboard\EToy\Home\HomePageSectionTwoResource;

use App\Http\Resources\Dashboard\EToy\Home\HomePageSeoResource;


use App\Http\Traits\Response;
use App\Models\EToy\HomePage\HomePageHeaderContent;
use App\Models\EToy\HomePage\HomePageSecitonFour;
use App\Models\EToy\HomePage\HomePageSecitonOne;
use App\Models\EToy\HomePage\HomePageSecitonThree;
use App\Models\EToy\HomePage\HomePageSecitonTwo;

use App\Models\EToy\SeoPage\SeoPageHomePage;


use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use Response;

    public $homePageHeaderContent;
    public $homePageSecitonOne;
    public $homePageSecitonTwo;
    public $homePageSecitonThree;
    public $homePageSecitonFour;
    public $seoPageHomePage;

    public function __construct()
    {

        $this->homePageHeaderContent = new HomePageHeaderContent();
        $this->homePageSecitonOne = new HomePageSecitonOne();
        $this->homePageSecitonTwo = new HomePageSecitonTwo();
        $this->homePageSecitonThree = new HomePageSecitonThree();
        $this->homePageSecitonFour = new HomePageSecitonFour();
        $this->seoPageHomePage = new SeoPageHomePage();

        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'headerContent' => new HomePageHeaderContentResource($this->homePageHeaderContent->first()??''),
            'sectionOne' => new HomePageSectionOneResource($this->homePageSecitonOne->first()??''),
            'secitonTwo' => new HomePageSectionTwoResource($this->homePageSecitonTwo->first()??''),
            'sectionThree' => new HomePageSectionThreeResource($this->homePageSecitonThree->first()??''),
            'secitonFour' => new HomePageSectionFourResource($this->homePageSecitonFour->first()??''),
            'seo' => new HomePageSeoResource($this->seoPageHomePage->first()??''),

        ];

        return $this->ResponseData($data,'get EToy Home Page Data Success',true,200);
    }
}
