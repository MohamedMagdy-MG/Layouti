<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\HomePage\OurLastWork;
use Illuminate\Http\Request;

class OurLastWorkController extends Controller
{
    use Response;
    public $ourLastWork;
    
    public function __construct()
    {
        $this->ourLastWork = new OurLastWork();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        
        $ourLastWork = $this->ourLastWork->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$ourLastWork){
            
            $request->lastwork == "null" ? $lastwork= json_encode("[]") : $lastwork = json_encode($request->lastwork);
            
            $this->ourLastWork->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'lastwork' => $lastwork
            ]);
        }else{
            $request->lastwork == "null" ? $lastwork= json_encode("[]") : $lastwork = json_encode($request->lastwork);

            
            $ourLastWork->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'lastwork' => $lastwork
            ]);
        }
        return $this->ResponseData(null,'Update Our Last Work Opreation Success',true,200);
    }
}
