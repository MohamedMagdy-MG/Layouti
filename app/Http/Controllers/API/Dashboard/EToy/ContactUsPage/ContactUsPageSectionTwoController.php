<?php

namespace App\Http\Controllers\API\Dashboard\EToy\ContactUsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\ContactUsPage\ContactUsPageSectionTwo;
use App\Models\EToy\ContactUsPage\ContactUsPageSectionTwoCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactUsPageSectionTwoController extends Controller
{
    use Response;
    public $contactUsPageSectionTwo;
    public $contactUsPageSectionTwoCards;

    public function __construct()
    {
        $this->contactUsPageSectionTwo = new ContactUsPageSectionTwo();
        $this->contactUsPageSectionTwoCards = new ContactUsPageSectionTwoCards();
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



        $contactUsPageSectionTwo = $this->contactUsPageSectionTwo->first();
        if(!$contactUsPageSectionTwo){

            $contactUsPageSectionTwo = $this->contactUsPageSectionTwo->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $iconName = null;
                    if(array_key_exists('icon',$card)){
                        if(is_file($card['icon'])){
                            $iconName = 'media/EToy/ContactUsPage/SectionTwo/'.time().'-'.$card['icon']->getClientOriginalName();
                            $card['icon']->move('media/EToy/ContactUsPage/SectionTwo',$iconName);
                        }
                    }
                    $this->contactUsPageSectionTwoCards->create([
                        'icon' => $iconName,
                        'titleEn' => $card['titleEn'] ,
                        'titleAr' => $card['titleAr'] ,
                        'descriptionEn' => $card['descriptionEn'] ,
                        'descriptionAr' => $card['descriptionAr'] ,
                        'card' => $contactUsPageSectionTwo->id
                    ]);
                }
            }
        }else{



            $contactUsPageSectionTwo->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
                'descriptionEn' => $request->descriptionEn ,
                'descriptionAr' => $request->descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $contactUsPageSectionTwoCards = $this->contactUsPageSectionTwoCards->skip($key)->first();
                    if($contactUsPageSectionTwoCards != null){


                        $iconName = $contactUsPageSectionTwoCards->icon;
                        if(array_key_exists('icon',$card)){
                            if(is_file($card['icon'])){
                                if($contactUsPageSectionTwoCards->icon != null){
                                    unlink($contactUsPageSectionTwoCards->icon);
                                }
                                $iconName = 'media/EToy/ContactUsPage/SectionTwo/'.time().'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/EToy/ContactUsPage/SectionTwo',$iconName);
                            }
                        }
                        $contactUsPageSectionTwoCards->update([
                            'icon' => $iconName,
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $contactUsPageSectionTwo->id
                        ]);
                    }else{
                        $iconName = null;
                        if(array_key_exists('icon',$card)){
                            if(is_file($card['icon'])){
                                $iconName = 'media/EToy/ContactUsPage/SectionTwo/'.time().'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/EToy/ContactUsPage/SectionTwo',$iconName);
                            }
                        }
                        $this->contactUsPageSectionTwoCards->create([
                            'icon' => $iconName,
                            'titleEn' => $card['titleEn'] ,
                            'titleAr' => $card['titleAr'] ,
                            'descriptionEn' => $card['descriptionEn'] ,
                            'descriptionAr' => $card['descriptionAr'] ,
                            'card' => $contactUsPageSectionTwo->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy Contact Us Page Section Two Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Contact Us Page Section Two Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $contactUsPageSectionTwoCards = $this->contactUsPageSectionTwoCards->find($request->id);
            if(!$contactUsPageSectionTwoCards){
                return $this->ResponseData(null,'Delete Etoy Contact Us Page Section Two Card Opreation Failed',true,400);
            }


            if($contactUsPageSectionTwoCards->icon != null){
                unlink($contactUsPageSectionTwoCards->icon);
            }

            $contactUsPageSectionTwoCards->delete();
            return $this->ResponseData(null,'Delete Etoy Contact Us Page Section Two Card Opreation Success',true,200);


        }
    }
}
