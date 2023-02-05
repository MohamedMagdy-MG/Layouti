<?php

namespace App\Http\Controllers\API\Dashboard\LearnUI;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIWhoCanAttend;
use App\Models\LearnUI\LearnUIWhoCanAttendPoints;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WhoCanAttendController extends Controller
{
    use Response;
    public $learnUIWhoCanAttend;
    public $learnUIWhoCanAttendPoints;

    public function __construct()
    {
        $this->learnUIWhoCanAttend = new LearnUIWhoCanAttend();
        $this->learnUIWhoCanAttendPoints = new LearnUIWhoCanAttendPoints();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $learnUIWhoCanAttend = $this->learnUIWhoCanAttend->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->subTitleEn != "null" ? $subTitleEn = $request->subTitleEn : $subTitleEn = null;
        $request->subTitleAr != "null" ? $subTitleAr = $request->subTitleAr : $subTitleAr = null;

        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }
        if(!$learnUIWhoCanAttend){
            $imageName = null;
            if(is_file($request->image)){
                $imageName = 'media/LearnUI/WhoCanAttend/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/WhoCanAttend',$imageName);
            }
            $learnUIWhoCanAttend = $this->learnUIWhoCanAttend->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'image' => $imageName
            ]);


            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $card['pointEn'] != "null" ? $pointEn = $card['pointEn'] : $pointEn = null;
                    $card['pointAr'] != "null" ? $pointAr = $card['pointAr'] : $pointAr = null;

                    $this->learnUIWhoCanAttendPoints->create([
                        'pointEn' => $pointEn,
                        'pointAr' => $pointAr,
                        'card' => $learnUIWhoCanAttend->id
                    ]);
                }
            }

        }else{
            $request->image != "null" ? $imageName = $learnUIWhoCanAttend->image : $imageName = null;
            if($imageName == "null"){
                unlink($learnUIWhoCanAttend->image);
            }
            if(is_file($request->image)){
                if($learnUIWhoCanAttend->image){
                    unlink($imageName);
                }
                $imageName = 'media/LearnUI/WhoCanAttend/'.time().'-'.$request->image->getClientOriginalName();
                $request->image->move('media/LearnUI/WhoCanAttend',$imageName);
            }
            $learnUIWhoCanAttend->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
                'image' => $imageName
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $learnUIWhoCanAttendPoints = $this->learnUIWhoCanAttendPoints->skip($key)->first();
                    $card['pointEn'] != "null" ? $pointEn = $card['pointEn'] : $pointEn = null;
                    $card['pointAr'] != "null" ? $pointAr = $card['pointAr'] : $pointAr = null;

                    if($learnUIWhoCanAttendPoints != null){

                        $learnUIWhoCanAttendPoints->update([
                            'pointEn' => $pointEn ,
                            'pointAr' => $pointAr ,
                            'card' => $learnUIWhoCanAttend->id
                        ]);
                    }else{

                        $this->learnUIWhoCanAttendPoints->create([
                            'pointEn' => $pointEn ,
                            'pointAr' => $pointAr ,
                            'card' => $learnUIWhoCanAttend->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI Who Can Attend Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI Who Can Attend Point Opreation Failed.',false,400,$validator->errors());
        }else{
            $learnUIWhoCanAttendPoints = $this->learnUIWhoCanAttendPoints->find($request->id);
            if(!$learnUIWhoCanAttendPoints){
                return $this->ResponseData(null,'Delete LearnUI Who Can Attend Point Opreation Failed',true,400);
            }
            $learnUIWhoCanAttendPoints->delete();
            return $this->ResponseData(null,'Delete LearnUI Who Can Attend Point Opreation Success',true,400);


        }
    }
}
