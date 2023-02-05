<?php

namespace App\Http\Controllers\API\Dashboard\Configurations;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Configurations\DashboardSettingResource;
use App\Http\Traits\Response;
use App\Models\Configurations\DashboardSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardSettingController extends Controller
{
    use Response;

    public $dashboardSetting;
    

    public function __construct()
    {
        $this->dashboardSetting = new DashboardSetting();
        $this->middleware('checkAuth');
    }

    public function index()
    {
        

        $dashboardSetting = $this->dashboardSetting->first();
        return $this->ResponseData(new DashboardSettingResource($dashboardSetting), 'get Dashboard Setting Data Success',true, 200);

    }
    public function Save(Request $request)
    {
        $dashboardSetting = $this->dashboardSetting->first();

        $request->buttonColor == "null" ? $buttonColor = null : $buttonColor = $request->buttonColor;
        $request->textSideBarColor == "null" ? $textSideBarColor = null : $textSideBarColor = $request->textSideBarColor;
        $request->sideBarColor == "null" ? $sideBarColor = null : $sideBarColor = $request->sideBarColor;
        
        if($dashboardSetting == null){
            $iconName = null;
            $favIconName = null;
            if(is_file($request->icon)){
                $iconName = 'media/Configurations/DashboardSetting/'.time().'-icon-'.$request->icon->getClientOriginalName();
                $request->icon->move('media/Configurations/DashboardSetting',$iconName);
            }
            if(is_file($request->favIcon)){
                $favIconName = 'media/Configurations/DashboardSetting/'.time().'-favIcon-'.$request->favIcon->getClientOriginalName();
                $request->favIcon->move('media/Configurations/DashboardSetting',$favIconName);
            }

            $this->dashboardSetting->create([
                'icon' => $iconName,
                'favIcon' => $favIconName,
                'buttonColor' => $buttonColor,
                'textSideBarColor' => $textSideBarColor,
                'sideBarColor' => $sideBarColor,
            ]);
        }else{

            if($request->icon == "null"){
                $iconName = null;
                if($dashboardSetting->icon != null){
                    unlink($dashboardSetting->icon);
                }
            }
            else{
                $iconName = $dashboardSetting->icon;
                if(is_file($request->icon)){
                    if($dashboardSetting->icon != null){
                        unlink($dashboardSetting->icon);
                    }
                    $iconName = 'media/Configurations/DashboardSetting/'.time().'-icon-'.$request->icon->getClientOriginalName();
                    $request->icon->move('media/Configurations/DashboardSetting',$iconName);
                }
            }

            if($request->favIcon == "null"){
                $favIconName = null;
                if($dashboardSetting->favIcon != null){
                    unlink($dashboardSetting->favIcon);
                }
            }
            else{
                $favIconName = $dashboardSetting->favIcon;
                if(is_file($request->favIcon)){
                    if($dashboardSetting->favIcon != null){
                        unlink($dashboardSetting->favIcon);
                    }
                    $favIconName = 'media/Configurations/DashboardSetting/'.time().'-favIcon-'.$request->favIcon->getClientOriginalName();
                    $request->favIcon->move('media/Configurations/DashboardSetting',$favIconName);
                }
            }

            $dashboardSetting->update([
                'icon' => $iconName,
                'favIcon' => $favIconName,
                'buttonColor' => $buttonColor,
                'textSideBarColor' => $textSideBarColor,
                'sideBarColor' => $sideBarColor,
            ]);
        }

        

        
        return $this->ResponseData(null,'Add Dashboard Setting Data Operation Success',true,200);

    }

    
}
