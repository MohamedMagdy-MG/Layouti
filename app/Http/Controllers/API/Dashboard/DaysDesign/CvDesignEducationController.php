<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignEducation;
use Illuminate\Http\Request;

class CvDesignEducationController extends Controller
{
    use Response;
    public $cvDesignEducation;

    public function __construct()
    {
        $this->cvDesignEducation = new CvDesignEducation();
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
        $cvDesignEducationOlds = $this->cvDesignEducation->get();
        foreach($cvDesignEducationOlds as $cvDesignEducationOld){
            $cvDesignEducationOld->delete();
        }   
        if($cards_count > 0){
            
            foreach($cards as $card){

                $card['majorEn'] == "null" ? $majorEn = null : $majorEn = $card['majorEn']; 
                $card['majorAr'] == "null" ? $majorAr = null : $majorAr = $card['majorAr']; 
                $card['universityEn'] == "null" ? $universityEn = null : $universityEn = $card['universityEn']; 
                $card['universityAr'] == "null" ? $universityAr = null : $universityAr = $card['universityAr']; 
                $card['startDate'] == "null" ? $startDate = null : $startDate = $card['startDate']; 
                $card['endDate'] == "null" ? $endDate = null : $endDate = $card['endDate']; 


                $this->cvDesignEducation->create([
                    'majorEn' => $majorEn,
                    'majorAr' => $majorAr,
                    'universityEn' => $universityEn,
                    'universityAr' => $universityAr,
                    'startDate' => $startDate,
                    'endDate' => $endDate,
                ]);
                
            }
        }       
        return $this->ResponseData(null,'Update 365Design CV Design Education Opreation Success',true,200);
    }

}
