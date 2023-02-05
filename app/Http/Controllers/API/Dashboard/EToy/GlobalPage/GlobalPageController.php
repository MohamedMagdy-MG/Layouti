<?php

namespace App\Http\Controllers\API\Dashboard\EToy\GlobalPage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\EToy\EToyGlobal\GlobalPageAdsResource;
use App\Http\Resources\Dashboard\EToy\EToyGlobal\GlobalPageEtoyAppSettingResource;
use App\Http\Resources\Dashboard\EToy\EToyGlobal\GlobalPageFaqResource;
use App\Http\Traits\Response;
use App\Models\EToy\GlobalPage\GlobalPageEtoyAds;
use App\Models\EToy\GlobalPage\GlobalPageEtoyAppSetting;
use App\Models\EToy\GlobalPage\GlobalPageEtoyFaq;
use Illuminate\Http\Request;

class GlobalPageController extends Controller
{
    use Response;

    public $globalPageEtoyAppSetting;
    public $globalPageEtoyFaq;
    public $globalPageEtoyAds;

    public function __construct()
    {

        $this->globalPageEtoyAppSetting = new GlobalPageEtoyAppSetting();
        $this->globalPageEtoyFaq = new GlobalPageEtoyFaq();
        $this->globalPageEtoyAds = new GlobalPageEtoyAds();

        $this->middleware('checkAuth');
    }
    public function index()
    {
        $data = [
            'appSetting' => new  GlobalPageEtoyAppSettingResource($this->globalPageEtoyAppSetting->first()??''),
            'faq' => new GlobalPageFaqResource($this->globalPageEtoyFaq->first()??''),
            'ads' => new GlobalPageAdsResource($this->globalPageEtoyAds->first()??''),

        ];

        return $this->ResponseData($data,'get EToy Global Page Data Success',true,200);
    }
}
