<?php

namespace App\Http\Controllers\API\Dashboard\EToy\ContactUsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\ContactUsPage\ContactUsPageSectionOne;
use Illuminate\Http\Request;

class ContactUsPageSectionOneController extends Controller
{
    use Response;
    public $contactUsPageSectionOne;

    public function __construct()
    {
        $this->contactUsPageSectionOne = new ContactUsPageSectionOne();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {



        $contactUsPageSectionOne = $this->contactUsPageSectionOne->first();
        if(!$contactUsPageSectionOne){

            $contactUsPageSectionOne = $this->contactUsPageSectionOne->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
            ]);


        }else{

            $contactUsPageSectionOne->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
            ]);


        }
        return $this->ResponseData(null,'Update Etoy Contact Us Page Section One Opreation Success',true,200);
    }


}
