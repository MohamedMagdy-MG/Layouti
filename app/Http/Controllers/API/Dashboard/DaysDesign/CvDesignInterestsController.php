<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignInterests;
use Illuminate\Http\Request;

class CvDesignInterestsController extends Controller
{
    use Response;
    public $cvDesignInterests;

    public function __construct()
    {
        $this->cvDesignInterests = new CvDesignInterests();
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
        $cvDesignInterestsOld = $this->cvDesignInterests->get();
        foreach($cvDesignInterestsOld as $cvDesignInterestOld){
            $cvDesignInterestOld->delete();
        }   
        if($cards_count > 0){
            foreach($cards as $card){

                $card['interestEn'] == "null" ? $interestEn = null : $interestEn = $card['interestEn']; 
                $card['interestAr'] == "null" ? $interestAr = null : $interestAr = $card['interestAr']; 

                $this->cvDesignInterests->create([
                    'interestEn' => $interestEn,
                    'interestAr' => $interestAr,
                ]);
                
            }
        }       
        return $this->ResponseData(null,'Update 365Design CV Design Interests Opreation Success',true,200);
    }
}
