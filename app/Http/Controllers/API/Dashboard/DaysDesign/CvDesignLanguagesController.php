<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignLanguages;
use Illuminate\Http\Request;

class CvDesignLanguagesController extends Controller
{
    use Response;
    public $cvDesignLanguages;

    public function __construct()
    {
        $this->cvDesignLanguages = new CvDesignLanguages();
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
        $cvDesignLanguagesOld = $this->cvDesignLanguages->get();
        foreach($cvDesignLanguagesOld as $cvDesignLanguageOld){
            $cvDesignLanguageOld->delete();
        }   
        if($cards_count > 0){
            foreach($cards as $card){

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn']; 
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr']; 
                $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn']; 
                $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr']; 

                $this->cvDesignLanguages->create([
                    'titleEn' => $titleEn,
                    'titleAr' => $titleAr,
                    'descriptionEn' => $descriptionEn,
                    'descriptionAr' => $descriptionAr,
                ]);
                
            }
        }       
        return $this->ResponseData(null,'Update 365Design CV Design Languages Opreation Success',true,200);
    }

}
