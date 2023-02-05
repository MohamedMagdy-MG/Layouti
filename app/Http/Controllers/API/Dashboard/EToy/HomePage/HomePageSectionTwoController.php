<?php

namespace App\Http\Controllers\API\Dashboard\EToy\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\HomePage\HomePageSecitonTwo;
use Illuminate\Http\Request;

class HomePageSectionTWoController extends Controller
{
    use Response;
    public $homePageSecitonTwo;

    public function __construct()
    {
        $this->homePageSecitonTwo = new HomePageSecitonTwo();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $homePageSecitonTwo = $this->homePageSecitonTwo->first();
        if(!$homePageSecitonTwo){

            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/EToy/HomePage/SecionTwo/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/HomePage/SecionTwo',$imageName);
            }
            $this->homePageSecitonTwo->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
                'image' => $imageName
            ]);

        }else{

            $imageName = $homePageSecitonTwo->image;
            if(is_file($request->image)){
                if($homePageSecitonTwo->image != null){
                    unlink($homePageSecitonTwo->image);
                }
                $imageName = 'media/EToy/HomePage/SecionTwo/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/EToy/HomePage/SecionTwo',$imageName);
            }

            $homePageSecitonTwo->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
                'image' => $imageName
            ]);

        }
        
        
        return $this->ResponseData(null,'Update Etoy Home Page Section Two Opreation Success',true,200);
    }


}
