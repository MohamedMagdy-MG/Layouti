<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignCourses;
use Illuminate\Http\Request;

class CvDesignCoursesController extends Controller
{
    use Response;
    public $cvDesignCourses;

    public function __construct()
    {
        $this->cvDesignCourses = new CvDesignCourses();
        $this->middleware('checkAuth');
    }


    public function save(Request $request)
    {

        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }
        $cvDesignCoursesOld = $this->cvDesignCourses->get();
        foreach($cvDesignCoursesOld as $cvDesignCourseOld){
            $cvDesignCourseOld->delete();
        }   
        if($cards_count > 0){
            foreach($cards as $card){
                
                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn']; 
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr']; 
                $card['date'] == "null" ? $date = null : $date = $card['date']; 

                $this->cvDesignCourses->create([
                    'titleEn' => $titleEn,
                    'titleAr' => $titleAr,
                    'date' => $date,
                ]);
                
            }
        }       
        return $this->ResponseData(null,'Update 365Design CV Design Courses Opreation Success',true,200);
    }

}
