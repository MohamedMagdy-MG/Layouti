<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignSkills;
use Illuminate\Http\Request;

class CvDesignSkillsController extends Controller
{
    use Response;
    public $cvDesignSkills;

    public function __construct()
    {
        $this->cvDesignSkills = new CvDesignSkills();
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
        $cvDesignSkillsOld = $this->cvDesignSkills->get();
        foreach($cvDesignSkillsOld as $cvDesignSkillOld){
            $cvDesignSkillOld->delete();
        }   
        if($cards_count > 0){
            foreach($cards as $card){

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn']; 
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr']; 
                $card['percentage'] == "null" ? $percentage = null : $percentage = $card['percentage']; 

                $this->cvDesignSkills->create([
                    'titleEn' => $titleEn,
                    'titleAr' => $titleAr,
                    'percentage' => $percentage,
                ]);
                
            }
        }       
        return $this->ResponseData(null,'Update 365Design CV Design Skills Opreation Success',true,200);
    }
}
