<?php

namespace App\Http\Controllers\API\Dashboard\ContactPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ContactPage\ContactInformation;
use App\Models\ContactPage\ContactInformationCountryCard;
use App\Models\ContactPage\ContactInformationEmailCard;
use App\Models\ContactPage\ContactInformationMobileCard;
use App\Models\ContactPage\ContactInformationWhatsAppCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactInformationController extends Controller
{
    use Response;
    public $contactInformation;
    public $contactInformationMobileCard;
    public $contactInformationEmailCard;
    public $contactInformationWhatsAppCard;
    public $contactInformationCountryCard;

    public function __construct()
    {
        $this->contactInformation = new ContactInformation();
        $this->contactInformationMobileCard = new ContactInformationMobileCard();
        $this->contactInformationEmailCard = new ContactInformationEmailCard();
        $this->contactInformationWhatsAppCard = new ContactInformationWhatsAppCard();
        $this->contactInformationCountryCard = new ContactInformationCountryCard();
        $this->middleware('checkAuth');
    }

    public function save(Request $request)
    {
        $mobileCards_count  = 0 ;
        $mobileCards = [];

        $emailCards_count  = 0 ;
        $emailCards = [];

        $whatsAppCards_count  = 0 ;
        $whatsAppCards = [];

        $countryCards_count  = 0 ;
        $countryCards = [];

        if($request->has('mobileCards')){
            $mobileCards_count   = count($request->mobileCards);
            $mobileCards  = $request->mobileCards;
        }

        if($request->has('emailCards')){
            $emailCards_count   = count($request->emailCards);
            $emailCards  = $request->emailCards;
        }

        if($request->has('whatsAppCards')){
            $whatsAppCards_count   = count($request->whatsAppCards);
            $whatsAppCards  = $request->whatsAppCards;
        }
        if($request->has('countryCards')){
            $countryCards_count   = count($request->countryCards);
            $countryCards  = $request->countryCards;
        }



        $contactInformation = $this->contactInformation->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;
        $request->informationTitleEn != "null" ? $informationTitleEn = $request->informationTitleEn : $informationTitleEn = null;
        $request->informationTitleAr != "null" ? $informationTitleAr = $request->informationTitleAr : $informationTitleAr = null;
        $request->AddressEn != "null" ? $AddressEn = $request->AddressEn : $AddressEn = null;
        $request->AddressAr != "null" ? $AddressAr = $request->AddressAr : $AddressAr = null;


        if(!$contactInformation){

            $contactInformation = $this->contactInformation->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'informationTitleEn' => $informationTitleEn,
                'informationTitleAr' =>$informationTitleAr ,
                'AddressEn' => $AddressEn ,
                'AddressAr' => $AddressAr
            ]);

            if($mobileCards_count > 0){
                foreach($mobileCards as $key => $card){

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['mobile'] == "null" ? $mobile = null : $mobile = $card['mobile'];

                    $this->contactInformationMobileCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'mobile' => $mobile ,
                        'card' => $contactInformation->id
                    ]);
                }
            }

            if($emailCards_count > 0){
                foreach($emailCards as $key => $card){

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['email'] == "null" ? $email = null : $email = $card['email'];

                    $this->contactInformationEmailCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'email' => $email ,
                        'card' => $contactInformation->id
                    ]);
                }
            }

            if($whatsAppCards_count > 0){
                foreach($whatsAppCards as $key => $card){

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['whatsApp'] == "null" ? $whatsApp = null : $whatsApp = $card['whatsApp'];

                    $this->contactInformationWhatsAppCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'whatsApp' => $whatsApp ,
                        'card' => $contactInformation->id
                    ]);
                }
            }

            if($countryCards_count > 0){
                foreach($countryCards as $key => $card){


                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];

                    $this->contactInformationCountryCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'card' => $contactInformation->id
                    ]);
                }
            }
        }else{

            $contactInformation->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
                'informationTitleEn' => $informationTitleEn,
                'informationTitleAr' =>$informationTitleAr ,
                'AddressEn' => $AddressEn ,
                'AddressAr' => $AddressAr
            ]);

            if($mobileCards_count > 0){
                foreach($mobileCards as $key => $card){
                    $contactInformationMobileCard = $this->contactInformationMobileCard->skip($key)->first();

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['mobile'] == "null" ? $mobile = null : $mobile = $card['mobile'];


                    if($contactInformationMobileCard != null){
                        $contactInformationMobileCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'mobile' => $mobile ,
                            'card' => $contactInformation->id
                        ]);
                    }
                    else{
                        $this->contactInformationMobileCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'mobile' => $mobile ,
                            'card' => $contactInformation->id
                        ]);
                    }

                }
            }

            if($emailCards_count > 0){
                foreach($emailCards as $key => $card){
                    $contactInformationEmailCard = $this->contactInformationEmailCard->skip($key)->first();

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['email'] == "null" ? $email = null : $email = $card['email'];


                    if($contactInformationEmailCard != null){
                        $contactInformationEmailCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'email' => $email ,
                            'card' => $contactInformation->id
                        ]);
                    }
                    else{
                        $this->contactInformationEmailCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'email' => $email ,
                            'card' => $contactInformation->id
                        ]);
                    }
                }
            }

            if($whatsAppCards_count > 0){
                foreach($whatsAppCards as $key => $card){
                    $contactInformationWhatsAppCard = $this->contactInformationWhatsAppCard->skip($key)->first();

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];
                    $card['whatsApp'] == "null" ? $whatsApp = null : $whatsApp = $card['whatsApp'];


                    if($contactInformationWhatsAppCard != null){
                        $contactInformationWhatsAppCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'whatsApp' => $whatsApp ,
                            'card' => $contactInformation->id
                        ]);
                    }
                    else{
                        $this->contactInformationWhatsAppCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'whatsApp' => $whatsApp ,
                            'card' => $contactInformation->id
                        ]);
                    }
                }
            }

            if($countryCards_count > 0){
                foreach($countryCards as $key => $card){
                    $contactInformationCountryCard = $this->contactInformationCountryCard->skip($key)->first();

                    $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn'];
                    $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr'];


                    if($contactInformationCountryCard != null){
                        $contactInformationCountryCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'card' => $contactInformation->id
                        ]);
                    }
                    else{
                        $this->contactInformationCountryCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'card' => $contactInformation->id
                        ]);
                    }
                }
            }


        }
        return $this->ResponseData(null,'Update Contact Information Opreation Success',true,200);
    }

    public function deleteMobile(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Contact Mobile Card Opreation Failed.',false,400);
        }else{
            $contactInformationMobileCard = $this->contactInformationMobileCard->find($request->id);
            if(!$contactInformationMobileCard){
                return $this->ResponseData(null,'Delete Contact Mobile Card Opreation Failed',true,400);
            }

            $contactInformationMobileCard->delete();
            return $this->ResponseData(null,'Delete Contact Mobile Card Card Opreation Success',true,200);


        }
    }

    public function deleteEmail(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Contact Email Card Opreation Failed.',false,400);
        }else{
            $contactInformationEmailCard = $this->contactInformationEmailCard->find($request->id);
            if(!$contactInformationEmailCard){
                return $this->ResponseData(null,'Delete Contact Email Card Opreation Failed',true,400);
            }

            $contactInformationEmailCard->delete();
            return $this->ResponseData(null,'Delete Contact Email Card Card Opreation Success',true,200);


        }
    }

    public function deleteWhatsApp(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Contact WhatsApp Card Opreation Failed.',false,400);
        }else{
            $contactInformationWhatsAppCard = $this->contactInformationWhatsAppCard->find($request->id);
            if(!$contactInformationWhatsAppCard){
                return $this->ResponseData(null,'Delete Contact WhatsApp Card Opreation Failed',true,400);
            }

            $contactInformationWhatsAppCard->delete();
            return $this->ResponseData(null,'Delete Contact WhatsApp Card Card Opreation Success',true,200);


        }
    }

    public function deleteCountry(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Contact Country Card Opreation Failed.',false,400);
        }else{
            $contactInformationCountryCard = $this->contactInformationCountryCard->find($request->id);
            if(!$contactInformationCountryCard){
                return $this->ResponseData(null,'Delete Contact Country Card Opreation Failed',true,400);
            }

            $contactInformationCountryCard->delete();
            return $this->ResponseData(null,'Delete Contact Country Card Card Opreation Success',true,200);


        }
    }
}
