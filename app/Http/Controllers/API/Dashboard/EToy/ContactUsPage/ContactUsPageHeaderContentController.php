<?php

namespace App\Http\Controllers\API\Dashboard\EToy\ContactUsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\ContactUsPage\ContactUsPageHeaderContent;
use Illuminate\Http\Request;



class ContactUsPageHeaderContentController extends Controller
{
    use Response;
    public $contactUsPageHeaderContent;

    public function __construct()
    {
        $this->contactUsPageHeaderContent = new ContactUsPageHeaderContent();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $contactUsPageHeaderContent = $this->contactUsPageHeaderContent->first();
        if(!$contactUsPageHeaderContent){

            $this->contactUsPageHeaderContent->create([
                'color' => $request->color ,
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);


        }else{



            $contactUsPageHeaderContent->update([
                'color' => $request->color ,
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);


        }
        return $this->ResponseData(null,'Update Etoy Contact Us Page Header Content Opreation Success',true,200);
    }
}
