<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIUXUIDesignPackage;
use App\Models\LearnUI\LearnUIUXUIDesignPackagePoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UXUIDesignPackageController extends Controller
{
    use Response;
    public $learnUIUXUIDesignPackage;
    public $learnUIUXUIDesignPackagePoints;

    public function __construct()
    {
        $this->learnUIUXUIDesignPackage = new LearnUIUXUIDesignPackage();
        $this->learnUIUXUIDesignPackagePoints = new LearnUIUXUIDesignPackagePoints();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $points_count  = 0 ;
        $points = [];
        if($request->has('points')){
            $points_count   = count($request->points);
            $points  = $request->points;
        }



        $learnUIUXUIDesignPackage = $this->learnUIUXUIDesignPackage->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->price != "null" ? $price = $request->price : $price = null;
        $request->hours != "null" ? $hours = $request->hours : $hours = null;



        if(!$learnUIUXUIDesignPackage){

            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/LearnUI/UXUIDesignPackage/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/UXUIDesignPackage',$imageName);
            }

            $learnUIUXUIDesignPackage = $this->learnUIUXUIDesignPackage->create([
                'image' => $imageName,
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'price' => $price ,
                'hours' => $hours ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($points_count > 0){
                foreach($points as $key => $point){
                    $point['pointEn'] != "null" ? $pointEn = $point['pointEn'] : $pointEn = null;
                    $point['pointAr'] != "null" ? $pointAr = $point['pointAr'] : $pointAr = null;

                    $this->learnUIUXUIDesignPackagePoints->create([
                        'pointEn' => $pointEn,
                        'pointAr' => $pointAr,
                        'card' => $learnUIUXUIDesignPackage->id
                    ]);
                }
            }
        }else{


            $request->image != "null" ? $imageName = $learnUIUXUIDesignPackage->image : $imageName = null;

            if($imageName == "null"){
                unlink($learnUIUXUIDesignPackage->image);
            }


            if(is_file($request->image)){
                if($learnUIUXUIDesignPackage->image != null){
                    unlink($learnUIUXUIDesignPackage->image);
                }
                $imageName = 'media/LearnUI/UXUIDesignPackage/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/UXUIDesignPackage',$imageName);
            }


            $learnUIUXUIDesignPackage->update([
                'image' => $imageName,
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'price' => $price ,
                'hours' => $hours ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($points_count > 0){
                foreach($points as $key => $point){


                    $learnUIUXUIDesignPackagePoints = $this->learnUIUXUIDesignPackagePoints->skip($key)->first();
                    $point['pointEn'] != "null" ? $pointEn = $point['pointEn'] : $pointEn = null;
                    $point['pointAr'] != "null" ? $pointAr = $point['pointAr'] : $pointAr = null;

                    if($learnUIUXUIDesignPackagePoints != null){

                        $learnUIUXUIDesignPackagePoints->update([
                            'pointEn' => $pointEn,
                            'pointAr' => $pointAr,
                            'card' => $learnUIUXUIDesignPackage->id
                        ]);
                    }else{

                        $this->learnUIUXUIDesignPackagePoints->create([
                            'pointEn' => $pointEn,
                            'pointAr' => $pointAr,
                            'card' => $learnUIUXUIDesignPackage->id
                        ]);
                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI UX UI Design Package Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI UX UI Design Package Point Opreation Failed.',false,400,$validator->errors());
        }else{
            $learnUIUXUIDesignPackagePoints = $this->learnUIUXUIDesignPackagePoints->find($request->id);
            if(!$learnUIUXUIDesignPackagePoints){
                return $this->ResponseData(null,'Delete LearnUI UX UI Design Package Point Opreation Failed',true,400);
            }


            $learnUIUXUIDesignPackagePoints->delete();
            return $this->ResponseData(null,'Delete LearnUI UX UI Design Package Point Opreation Success',true,200);


        }
    }
}
