<?php

namespace App\Http\Controllers\API\Dashboard\EToy\GlobalPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\GlobalPage\GlobalPageEtoyAppSetting;
use Illuminate\Http\Request;

class GlobalPageEtoyAppSettingController extends Controller
{
    use Response;
    public $globalPageEtoyAppSetting;

    public function __construct()
    {
        $this->globalPageEtoyAppSetting = new GlobalPageEtoyAppSetting();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $globalPageEtoyAppSetting = $this->globalPageEtoyAppSetting->first();
        if(!$globalPageEtoyAppSetting){
            $favIconName = null;
            $lightLogoName = null;
            $darkLogoName = null;

            if(is_file($request->favIcon)){
                $favIconName = 'media/EToy/GlobalPage/AppSetting/'.time().'-'.$request->favIcon->getClientOriginalName();
                $request->favIcon->move('media/EToy/GlobalPage/AppSetting',$favIconName);
            }

            if(is_file($request->lightLogo)){
                $lightLogoName = 'media/EToy/GlobalPage/AppSetting/'.time().'-'.'lightLogo'.'-'.$request->lightLogo->getClientOriginalName();
                $request->lightLogo->move('media/EToy/GlobalPage/AppSetting',$lightLogoName);
            }

            if(is_file($request->darkLogo)){
                $darkLogoName = 'media/EToy/GlobalPage/AppSetting/'.time().'-'.'darkLogo'.'-'.$request->darkLogo->getClientOriginalName();
                $request->darkLogo->move('media/EToy/GlobalPage/AppSetting',$darkLogoName);
            }


            $this->globalPageEtoyAppSetting->create([
                'favIcon' => $favIconName,
                'lightLogo' => $lightLogoName ,
                'darkLogo' => $darkLogoName ,


            ]);
        }else{
            $favIconName = $globalPageEtoyAppSetting->favIcon;
            $lightLogoName = $globalPageEtoyAppSetting->lightLogo;
            $darkLogoName = $globalPageEtoyAppSetting->darkLogo;

            if(is_file($request->favIcon)){
                if($globalPageEtoyAppSetting->favIcon){
                    unlink($favIconName);
                }
                $favIconName = 'media/EToy/GlobalPage/AppSetting/'.time().'-'.$request->favIcon->getClientOriginalName();
                $request->favIcon->move('media/EToy/GlobalPage/AppSetting',$favIconName);
            }

            if(is_file($request->lightLogo)){
                if($globalPageEtoyAppSetting->lightLogo){
                    unlink($lightLogoName);
                }
                $lightLogoName = 'media/EToy/GlobalPage/AppSetting/'.time().'-'.'lightLogo'.'-'.$request->lightLogo->getClientOriginalName();
                $request->lightLogo->move('media/EToy/GlobalPage/AppSetting',$lightLogoName);
            }

            if(is_file($request->darkLogo)){
                if($globalPageEtoyAppSetting->darkLogo){
                    unlink($darkLogoName);
                }
                $darkLogoName = 'media/EToy/GlobalPage/AppSetting/'.time().'-'.'darkLogo'.'-'.$request->darkLogo->getClientOriginalName();
                $request->darkLogo->move('media/EToy/GlobalPage/AppSetting',$darkLogoName);
            }



            $globalPageEtoyAppSetting->update([
                'favIcon' => $favIconName,
                'lightLogo' => $lightLogoName ,
                'darkLogo' => $darkLogoName ,

            ]);
        }
        return $this->ResponseData(null,'Update Etoy Global Page App Setting Opreation Success',true,200);
    }
}
