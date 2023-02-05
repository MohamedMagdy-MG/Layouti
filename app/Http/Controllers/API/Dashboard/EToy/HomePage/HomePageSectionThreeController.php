<?php

namespace App\Http\Controllers\API\Dashboard\EToy\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\HomePage\HomePageSecitonThree;
use Illuminate\Http\Request;

class HomePageSectionThreeController extends Controller
{
    use Response;
    public $homePageSecitonThree;

    public function __construct()
    {
        $this->homePageSecitonThree = new HomePageSecitonThree();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $homePageSecitonThree = $this->homePageSecitonThree->first();
        if(!$homePageSecitonThree){

            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/EToy/HomePage/SectionThree/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/HomePage/SectionThree',$imageName);
            }
            $this->homePageSecitonThree->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
                'image' => $imageName
            ]);


        }else{

            $imageName = $homePageSecitonThree->image;
            if(is_file($request->image)){
                if($homePageSecitonThree->image != null){
                    unlink($homePageSecitonThree->image);
                }
                $imageName = 'media/EToy/HomePage/SectionThree/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/HomePage/SectionThree',$imageName);
            }

            $homePageSecitonThree->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
                'image' => $imageName
            ]);


        }
        return $this->ResponseData(null,'Update Etoy Home Page Section Three Opreation Success',true,200);
    }
}
