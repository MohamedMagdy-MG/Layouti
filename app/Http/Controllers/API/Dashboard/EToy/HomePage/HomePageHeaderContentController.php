<?php

namespace App\Http\Controllers\API\Dashboard\EToy\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\HomePage\HomePageHeaderContent;
use Illuminate\Http\Request;

class HomePageHeaderContentController extends Controller
{
    use Response;
    public $homePageHeaderContent;

    public function __construct()
    {
        $this->homePageHeaderContent = new HomePageHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $homePageHeaderContent = $this->homePageHeaderContent->first();
        if(!$homePageHeaderContent){
            $availabilityAndroidIconName = null;
            $availabilityIOSIconName = null;
            $topLeftImageName = null;
            $topRightImageName = null;
            $bottomLeftImageName = null;
            $bottomRightImageName = null;
            $bottomImageName = null;

            if(is_file($request->availabilityAndroidIcon)){
                $availabilityAndroidIconName = 'media/EToy/HomePage/HeaderContent/'.time().'-availabilityAndroidIcon-'.$request->availabilityAndroidIcon->getClientOriginalName();
                $request->availabilityAndroidIcon->move('media/EToy/HomePage/HeaderContent',$availabilityAndroidIconName);
            }
            if(is_file($request->availabilityIOSIcon)){
                $availabilityIOSIconName = 'media/EToy/HomePage/HeaderContent/'.time().'-availabilityIOSIcon-'.$request->availabilityIOSIcon->getClientOriginalName();
                $request->availabilityIOSIcon->move('media/EToy/HomePage/HeaderContent',$availabilityIOSIconName);
            }
            if(is_file($request->topLeftImage)){
                $topLeftImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-topLeftImage-'.$request->topLeftImage->getClientOriginalName();
                $request->topLeftImage->move('media/EToy/HomePage/HeaderContent',$topLeftImageName);
            }
            if(is_file($request->topRightImage)){
                $topRightImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-topRightImage-'.$request->topRightImage->getClientOriginalName();
                $request->topRightImage->move('media/EToy/HomePage/HeaderContent',$topRightImageName);
            }

            if(is_file($request->bottomLeftImage)){
                $bottomLeftImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-bottomLeftImage-'.$request->bottomLeftImage->getClientOriginalName();
                $request->bottomLeftImage->move('media/EToy/HomePage/HeaderContent',$bottomLeftImageName);
            }
            if(is_file($request->bottomRightImage)){
                $bottomRightImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-bottomRightImage-'.$request->bottomRightImage->getClientOriginalName();
                $request->bottomRightImage->move('media/EToy/HomePage/HeaderContent',$bottomRightImageName);
            }

            if(is_file($request->bottomImage)){
                $bottomImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-bottomImage-'.$request->bottomImage->getClientOriginalName();
                $request->bottomImage->move('media/EToy/HomePage/HeaderContent',$bottomImageName);
            }



            $this->homePageHeaderContent->create([
                'color' => $request->color,
                'titleOneEn' => $request->titleOneEn,
                'titleOneAr' => $request->titleOneAr,
                'titleTwoEn' => $request->titleTwoEn,
                'titleTwoAr' => $request->titleTwoAr,
                'titleThreeEn' => $request->titleThreeEn,
                'titleThreeAr' => $request->titleThreeAr,
                'availabilityTitleEn' => $request->availabilityTitleEn,
                'availabilityTitleAr' => $request->availabilityTitleAr,
                'availabilityIOSIcon' => $availabilityIOSIconName,
                'availabilityIOSLink' => $request->availabilityIOSLink,
                'availabilityAndroidIcon' => $availabilityAndroidIconName,
                'availabilityAndroidLink' => $request->availabilityAndroidLink,
                'topLeftImage' => $topLeftImageName,
                'topRightImage' => $topRightImageName,
                'bottomLeftImage' => $bottomLeftImageName,
                'bottomRightImage' => $bottomRightImageName,
                'bottomImage' => $bottomImageName
            ]);
        }else{
            $availabilityAndroidIconName = $homePageHeaderContent->availabilityAndroidIcon;
            $availabilityIOSIconName = $homePageHeaderContent->availabilityIOSIcon;
            $topLeftImageName = $homePageHeaderContent->topLeftImage;
            $topRightImageName = $homePageHeaderContent->topRightImage;
            $bottomLeftImageName = $homePageHeaderContent->bottomLeftImage;
            $bottomRightImageName = $homePageHeaderContent->bottomRightImage;
            $bottomImageName = $homePageHeaderContent->bottomImage;

            if(is_file($request->availabilityAndroidIcon)){
                if($homePageHeaderContent->availabilityAndroidIcon){
                    unlink($availabilityAndroidIconName);
                }
                $availabilityAndroidIconName = 'media/EToy/HomePage/HeaderContent/'.time().'-availabilityAndroidIcon-'.$request->availabilityAndroidIcon->getClientOriginalName();
                $request->availabilityAndroidIcon->move('media/EToy/HomePage/HeaderContent',$availabilityAndroidIconName);
            }
            if(is_file($request->availabilityIOSIcon)){
                if($homePageHeaderContent->availabilityIOSIcon){
                    unlink($availabilityIOSIconName);
                }
                $availabilityIOSIconName = 'media/EToy/HomePage/HeaderContent/'.time().'-availabilityIOSIcon-'.$request->availabilityIOSIcon->getClientOriginalName();
                $request->availabilityIOSIcon->move('media/EToy/HomePage/HeaderContent',$availabilityIOSIconName);
            }
            if(is_file($request->topLeftImage)){
                if($homePageHeaderContent->topLeftImage){
                    unlink($topLeftImageName);
                }
                $topLeftImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-topLeftImage-'.$request->topLeftImage->getClientOriginalName();
                $request->topLeftImage->move('media/EToy/HomePage/HeaderContent',$topLeftImageName);
            }
            if(is_file($request->topRightImage)){
                if($homePageHeaderContent->topRightImage){
                    unlink($topRightImageName);
                }
                $topRightImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-topRightImage-'.$request->topRightImage->getClientOriginalName();
                $request->topRightImage->move('media/EToy/HomePage/HeaderContent',$topRightImageName);
            }

            if(is_file($request->bottomLeftImage)){
                if($homePageHeaderContent->bottomLeftImage){
                    unlink($bottomLeftImageName);
                }
                $bottomLeftImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-bottomLeftImage-'.$request->bottomLeftImage->getClientOriginalName();
                $request->bottomLeftImage->move('media/EToy/HomePage/HeaderContent',$bottomLeftImageName);
            }
            if(is_file($request->bottomRightImage)){
                if($homePageHeaderContent->bottomRightImage){
                    unlink($bottomRightImageName);
                }
                $bottomRightImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-bottomRightImage-'.$request->bottomRightImage->getClientOriginalName();
                $request->bottomRightImage->move('media/EToy/HomePage/HeaderContent',$bottomRightImageName);
            }

            if(is_file($request->bottomImage)){
                if($homePageHeaderContent->bottomImage){
                    unlink($bottomImageName);
                }
                $bottomImageName = 'media/EToy/HomePage/HeaderContent/'.time().'-bottomImage-'.$request->bottomImage->getClientOriginalName();
                $request->bottomImage->move('media/EToy/HomePage/HeaderContent',$bottomImageName);
            }

            $homePageHeaderContent->update([
                'color' => $request->color,
                'titleOneEn' => $request->titleOneEn,
                'titleOneAr' => $request->titleOneAr,
                'titleTwoEn' => $request->titleTwoEn,
                'titleTwoAr' => $request->titleTwoAr,
                'titleThreeEn' => $request->titleThreeEn,
                'titleThreeAr' => $request->titleThreeAr,
                'availabilityTitleEn' => $request->availabilityTitleEn,
                'availabilityTitleAr' => $request->availabilityTitleAr,
                'availabilityIOSIcon' => $availabilityIOSIconName,
                'availabilityIOSLink' => $request->availabilityIOSLink,
                'availabilityAndroidIcon' => $availabilityAndroidIconName,
                'availabilityAndroidLink' => $request->availabilityAndroidLink,
                'topLeftImage' => $topLeftImageName,
                'topRightImage' => $topRightImageName,
                'bottomLeftImage' => $bottomLeftImageName,
                'bottomRightImage' => $bottomRightImageName,
                'bottomImage' => $bottomImageName
            ]);
        }
        return $this->ResponseData(null,'Update Etoy Home Page Header Content Opreation Success',true,200);
    }
}
