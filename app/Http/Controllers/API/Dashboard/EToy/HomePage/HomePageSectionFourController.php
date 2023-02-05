<?php

namespace App\Http\Controllers\API\Dashboard\EToy\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\HomePage\HomePageSecitonFour;
use Illuminate\Http\Request;

class HomePageSectionFourController extends Controller
{
    use Response;
    public $homePageSecitonFour;

    public function __construct()
    {
        $this->homePageSecitonFour = new HomePageSecitonFour();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $homePageSecitonFour = $this->homePageSecitonFour->first();
        if(!$homePageSecitonFour){

            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/EToy/HomePage/SectionFour/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/HomePage/SectionFour',$imageName);
            }
            $this->homePageSecitonFour->create([
                'image' => $imageName,
                'qouteEn' => $request->qouteEn ,
                'qouteAr' => $request->qouteAr ,
                'nameEn' => $request->nameEn ,
                'nameAr' => $request->nameAr ,
                'jopTitleEn' => $request->jopTitleEn ,
                'jopTitleAr' => $request->jopTitleAr ,

            ]);


        }else{

            $imageName = $homePageSecitonFour->image;
            if(is_file($request->image)){
                if($homePageSecitonFour->image != null){
                    unlink($homePageSecitonFour->image);
                }
                $imageName = 'media/EToy/HomePage/SectionFour/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/HomePage/SectionFour',$imageName);
            }

            $homePageSecitonFour->update([
                'image' => $imageName,
                'qouteEn' => $request->qouteEn ,
                'qouteAr' => $request->qouteAr ,
                'nameEn' => $request->nameEn ,
                'nameAr' => $request->nameAr ,
                'jopTitleEn' => $request->jopTitleEn ,
                'jopTitleAr' => $request->jopTitleAr ,

            ]);


        }
        return $this->ResponseData(null,'Update Etoy Home Page Section Four Opreation Success',true,200);
    }
}
