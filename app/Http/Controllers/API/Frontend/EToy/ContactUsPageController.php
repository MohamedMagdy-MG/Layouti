<?php

namespace App\Http\Controllers\API\Frontend\EToy;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\ContactUsequest;
use App\Http\Resources\Frontend\EToy\ContactUs\ContactUsPageHeaderContentResource;
use App\Http\Resources\Frontend\EToy\ContactUs\ContactUsPageSectionOneResource;
use App\Http\Resources\Frontend\EToy\ContactUs\ContactUsPageSectionTwoResource;

use App\Http\Resources\Frontend\EToy\ContactUs\ContactUsPageSeoResource;


use App\Http\Traits\Response;
use App\Models\EToy\ContactUs;
use App\Models\EToy\ContactUsPage\ContactUsPageHeaderContent;
use App\Models\EToy\ContactUsPage\ContactUsPageSectionOne;
use App\Models\EToy\ContactUsPage\ContactUsPageSectionTwo;

use App\Models\EToy\SeoPage\SeoPageContactPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsPageController extends Controller
{
    use Response;

    public $contactUsPageHeaderContent;
    public $contactUsPageSectionOne;
    public $contactUsPageSectionTwo;

    public $seoPageContactPage;
    public $contactUsRequest;
    public $contactUs;

    public function __construct()
    {

        $this->contactUsPageHeaderContent = new ContactUsPageHeaderContent();
        $this->contactUsPageSectionOne = new ContactUsPageSectionOne();
        $this->contactUsPageSectionTwo = new ContactUsPageSectionTwo();

        $this->seoPageContactPage = new SeoPageContactPage();
        $this->contactUsRequest = new ContactUsequest();
        $this->contactUs = new ContactUs();


    }
    public function index()
    {
        $data = [
            'headerContent' => new ContactUsPageHeaderContentResource($this->contactUsPageHeaderContent->first()??''),
            'sectionOne' => new ContactUsPageSectionOneResource($this->contactUsPageSectionOne->first()??''),
            'secitonTwo' => new ContactUsPageSectionTwoResource($this->contactUsPageSectionTwo->first()??''),
            'seo' => new ContactUsPageSeoResource($this->seoPageContactPage->first()??''),

        ];

        return $this->ResponseData($data,'get EToy Contact Us Page Data Success',true,200);
    }

    public function send(Request $request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        if($language == 'ar'){
            $errMessag = "فشلت عملية ارسال تواصل معنا ";
            $successMessag = "نجحت عملية ارسال تواصل معنا";
        }else{
            $errMessag = "Send Contact Us Opreation Failed.";
            $successMessag = "Send Contact Us Opreation Success.";
        }
        $validator = Validator::make($request->only('fullName','email','phone','message'),$this->contactUsRequest->rules(),$this->contactUsRequest->Message());
        if($validator->fails()){
            return $this->ResponseData(null,$errMessag,false,400,$validator->errors());
        }else{
            $this->contactUs->create([
                'fullName'  => $request->fullName,
                'email' => $request->email,
                'phone' => $request->phone,
                'message' => $request->message,
            ]);

            return $this->ResponseData(null,$successMessag,true,200,$validator->errors());

        }
    }
}
