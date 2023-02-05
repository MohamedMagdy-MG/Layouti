<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIUXDesignPackage;
use App\Models\LearnUI\LearnUIUXDesignPackagePoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UXDesignPackageController extends Controller
{
    use Response;
    public $learnUIUXDesignPackage;
    public $learnUIUXDesignPackagePoints;

    public function __construct()
    {
        $this->learnUIUXDesignPackage = new LearnUIUXDesignPackage();
        $this->learnUIUXDesignPackagePoints = new LearnUIUXDesignPackagePoints();
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



        $learnUIUXDesignPackage = $this->learnUIUXDesignPackage->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->price != "null" ? $price = $request->price : $price = null;
        $request->hours != "null" ? $hours = $request->hours : $hours = null;



        if(!$learnUIUXDesignPackage){

            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/LearnUI/UXDesignPackage/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/UXDesignPackage',$imageName);
            }

            $learnUIUXDesignPackage = $this->learnUIUXDesignPackage->create([
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

                    $this->learnUIUXDesignPackagePoints->create([
                        'pointEn' => $pointEn,
                        'pointAr' => $pointAr,
                        'card' => $learnUIUXDesignPackage->id
                    ]);
                }
            }
        }else{


            $request->image != "null" ? $imageName = $learnUIUXDesignPackage->image : $imageName = null;

            if($imageName == "null"){
                unlink($learnUIUXDesignPackage->image);
            }

            if(is_file($request->image)){
                if($learnUIUXDesignPackage->image != null){
                    unlink($learnUIUXDesignPackage->image);
                }
                $imageName = 'media/LearnUI/UXDesignPackage/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/UXDesignPackage',$imageName);
            }


            $learnUIUXDesignPackage->update([
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


                    $learnUIUXDesignPackagePoints = $this->learnUIUXDesignPackagePoints->skip($key)->first();

                    $point['pointEn'] != "null" ? $pointEn = $point['pointEn'] : $pointEn = null;
                    $point['pointAr'] != "null" ? $pointAr = $point['pointAr'] : $pointAr = null;


                    if($learnUIUXDesignPackagePoints != null){

                        $learnUIUXDesignPackagePoints->update([
                            'pointEn' => $pointEn,
                            'pointAr' => $pointAr,
                            'card' => $learnUIUXDesignPackage->id
                        ]);
                    }else{

                        $this->learnUIUXDesignPackagePoints->create([
                            'pointEn' => $pointEn,
                            'pointAr' => $pointAr,
                            'card' => $learnUIUXDesignPackage->id
                        ]);
                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI UX Design Package Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI UX Design Package Point Opreation Failed.',false,400,$validator->errors());
        }else{
            $learnUIUXDesignPackagePoints = $this->learnUIUXDesignPackagePoints->find($request->id);
            if(!$learnUIUXDesignPackagePoints){
                return $this->ResponseData(null,'Delete LearnUI UX Design Package Point Opreation Failed',true,400);
            }


            $learnUIUXDesignPackagePoints->delete();
            return $this->ResponseData(null,'Delete LearnUI UX Design Package Point Opreation Success',true,200);


        }
    }
}
