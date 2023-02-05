<?php

namespace App\Http\Controllers\API\Dashboard\ContactPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ContactPage\ContactWeFiredUpInnovated;
use Illuminate\Http\Request;

class ContactWeFiredUpInnovatedController extends Controller
{
    use Response;
    public $contactWeFiredUpInnovated;

    public function __construct()
    {
        $this->contactWeFiredUpInnovated = new ContactWeFiredUpInnovated();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {

        $contactWeFiredUpInnovated = $this->contactWeFiredUpInnovated->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;


        if(!$contactWeFiredUpInnovated){

            $this->contactWeFiredUpInnovated->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);
        }else{

            $contactWeFiredUpInnovated->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);
        }
        return $this->ResponseData(null,'Update Contact We Fired Up Innovated Opreation Success',true,200);
    }
}
