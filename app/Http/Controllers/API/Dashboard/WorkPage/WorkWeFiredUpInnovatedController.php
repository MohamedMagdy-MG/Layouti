<?php

namespace App\Http\Controllers\API\Dashboard\WorkPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\WorkPage\WorkWeFiredUpInnovated;
use Illuminate\Http\Request;

class WorkWeFiredUpInnovatedController extends Controller
{
    use Response;
    public $workWeFiredUpInnovated;

    public function __construct()
    {
        $this->workWeFiredUpInnovated = new WorkWeFiredUpInnovated();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $workWeFiredUpInnovated = $this->workWeFiredUpInnovated->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$workWeFiredUpInnovated){

            $this->workWeFiredUpInnovated->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);
        }else{

            $workWeFiredUpInnovated->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);
        }
        return $this->ResponseData(null,'Update Work We Fired Up Innovated Content Opreation Success',true,200);
    }
}
