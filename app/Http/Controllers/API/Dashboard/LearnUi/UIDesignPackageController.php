<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIDesignPackage;
use App\Models\LearnUI\LearnUIDesignPackagePoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UIDesignPackageController extends Controller
{
    use Response;
    public $learnUIDesignPackage;
    public $learnUIDesignPackagePoints;

    public function __construct()
    {
        $this->learnUIDesignPackage = new LearnUIDesignPackage();
        $this->learnUIDesignPackagePoints = new LearnUIDesignPackagePoints();
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



        $learnUIDesignPackage = $this->learnUIDesignPackage->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->price != "null" ? $price = $request->price : $price = null;
        $request->hours != "null" ? $hours = $request->hours : $hours = null;


        if(!$learnUIDesignPackage){

            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/LearnUI/UIDesignPackage/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/UIDesignPackage',$imageName);
            }

            $learnUIDesignPackage = $this->learnUIDesignPackage->create([
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

                    $this->learnUIDesignPackagePoints->create([
                        'pointEn' => $pointEn,
                        'pointAr' => $pointAr,
                        'card' => $learnUIDesignPackage->id
                    ]);
                }
            }
        }else{


            $request->image != "null" ? $imageName = $learnUIDesignPackage->image : $imageName = null;

            if($imageName == "null"){
                unlink($learnUIDesignPackage->image);
            }
            if(is_file($request->image)){
                if($learnUIDesignPackage->image != null){
                    unlink($learnUIDesignPackage->image);
                }
                $imageName = 'media/LearnUI/UIDesignPackage/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/UIDesignPackage',$imageName);
            }


            $learnUIDesignPackage->update([
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


                    $learnUIDesignPackagePoints = $this->learnUIDesignPackagePoints->skip($key)->first();

                    $point['pointEn'] != "null" ? $pointEn = $point['pointEn'] : $pointEn = null;
                    $point['pointAr'] != "null" ? $pointAr = $point['pointAr'] : $pointAr = null;



                    if($learnUIDesignPackagePoints != null){

                        $learnUIDesignPackagePoints->update([
                            'pointEn' => $pointEn,
                            'pointAr' => $pointAr,
                            'card' => $learnUIDesignPackage->id
                        ]);
                    }else{

                        $this->learnUIDesignPackagePoints->create([
                            'pointEn' => $pointEn,
                            'pointAr' => $pointAr,
                            'card' => $learnUIDesignPackage->id
                        ]);
                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI UI Design Package Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI UI Design Package Point Opreation Failed.',false,400,$validator->errors());
        }else{
            $learnUIDesignPackagePoints = $this->learnUIDesignPackagePoints->find($request->id);
            if(!$learnUIDesignPackagePoints){
                return $this->ResponseData(null,'Delete LearnUI UI Design Package Point Opreation Failed',true,400);
            }


            $learnUIDesignPackagePoints->delete();
            return $this->ResponseData(null,'Delete LearnUI UI Design Package Point Opreation Success',true,200);


        }
    }
}
