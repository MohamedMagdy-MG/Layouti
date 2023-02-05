<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignCoverLetter;
use Illuminate\Http\Request;

class CvDesignCoverLetterController extends Controller
{
    use Response;
    public $CvDesignCoverLetter;

    public function __construct()
    {
        $this->CvDesignCoverLetter = new CvDesignCoverLetter();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $CvDesignCoverLetter = $this->CvDesignCoverLetter->first();

        $request->letterEn == "null" ? $letterEn = null : $letterEn = $request->letterEn; 
        $request->letterAr == "null" ? $letterAr = null : $letterAr = $request->letterAr; 

                
        if(!$CvDesignCoverLetter){
            $this->CvDesignCoverLetter->create([
                'letterEn' => $letterEn ,
                'letterAr' => $letterAr ,
            ]);
        }else{
            $CvDesignCoverLetter->update([
                'letterEn' => $letterEn ,
                'letterAr' => $letterAr ,
            ]);
        }
        return $this->ResponseData(null,'Update 365Design CV Design Cover Letter Opreation Success',true,200);
    }
}
