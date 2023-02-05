<?php

namespace App\Http\Controllers\API\Dashboard\EToy\GlobalPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\GlobalPage\GlobalPageEtoyAds;
use Illuminate\Http\Request;

class GlobalPageEtoyAppAdsController extends Controller
{
    use Response;
    public $globalPageEtoyAds;

    public function __construct()
    {
        $this->globalPageEtoyAds = new GlobalPageEtoyAds();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $globalPageEtoyAds = $this->globalPageEtoyAds->first();
        if(!$globalPageEtoyAds){
            $globalPageEtoyAds = $this->globalPageEtoyAds->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);


        }else{

            $globalPageEtoyAds->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);


        }
        return $this->ResponseData(null,'Update Etoy Global Add Ads Page Opreation Success',true,200);
    }


}
