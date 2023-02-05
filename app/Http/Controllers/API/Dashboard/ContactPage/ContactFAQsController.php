<?php

namespace App\Http\Controllers\API\Dashboard\ContactPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\Configurations\LayoutiCategoriesFaqs;
use App\Models\ContactPage\ContactFAQs;
use App\Models\ContactPage\ContactFAQsCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactFAQsController extends Controller
{
    use Response;
    public $layoutiCategoriesFaqs;
    public $contactFAQs;
    public $contactFAQsCard;

    public function __construct()
    {
        $this->layoutiCategoriesFaqs = new LayoutiCategoriesFaqs();
        $this->contactFAQs = new ContactFAQs();
        $this->contactFAQsCard = new ContactFAQsCard();
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



        $contactFAQs = $this->contactFAQs->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$contactFAQs){

            $contactFAQs = $this->contactFAQs->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $layoutiCategoriesFaqs = $this->layoutiCategoriesFaqs->find($card['category']);
                    if($layoutiCategoriesFaqs != null){
                        $quantity = $layoutiCategoriesFaqs->quantity + 1 ;
                        $layoutiCategoriesFaqs->update([
                            'quantity' => $quantity
                        ]);
                    }
                    $this->contactFAQsCard->create([
                        'questionEn' => $card['questionEn'] == "null" ? null : $card['questionEn'],
                        'questionAr' => $card['questionAr'] == "null" ? null : $card['questionAr'],
                        'category' => $card['category'] == "null" ? null : $card['category'],
                        'answerEn' => $card['answerEn'] == "null" ? null : $card['answerEn'],
                        'answerAr' => $card['answerAr'] == "null" ? null : $card['answerAr'],
                        'card' => $contactFAQs->id
                    ]);
                }
            }
        }else{

            $contactFAQs->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $contactFAQsCard = $this->contactFAQsCard->skip($key)->first();
                    $layoutiCategoriesFaqs = $this->layoutiCategoriesFaqs->find($card['category']);
                    if($layoutiCategoriesFaqs != null){
                        $quantity = $layoutiCategoriesFaqs->quantity + 1 ;
                        $layoutiCategoriesFaqs->update([
                            'quantity' => $quantity
                        ]);
                    }
                    if($contactFAQsCard != null){

                        $contactFAQsCard->update([
                            'questionEn' => $card['questionEn'] == "null" ? null : $card['questionEn'],
                            'questionAr' => $card['questionAr'] == "null" ? null : $card['questionAr'],
                            'category' => $card['category'] == "null" ? null : $card['category'],
                            'answerEn' => $card['answerEn'] == "null" ? null : $card['answerEn'],
                            'answerAr' => $card['answerAr'] == "null" ? null : $card['answerAr'],
                            'card' => $contactFAQs->id
                        ]);
                    }else{

                        $this->contactFAQsCard->create([
                            'questionEn' => $card['questionEn'] == "null" ? null : $card['questionEn'],
                            'questionAr' => $card['questionAr'] == "null" ? null : $card['questionAr'],
                            'category' => $card['category'] == "null" ? null : $card['category'],
                            'answerEn' => $card['answerEn'] == "null" ? null : $card['answerEn'],
                            'answerAr' => $card['answerAr'] == "null" ? null : $card['answerAr'],
                            'card' => $contactFAQs->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Contact FAQs Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Contact FAQs Card Opreation Failed.',false,400);
        }else{
            $contactFAQsCard = $this->contactFAQsCard->find($request->id);
            if(!$contactFAQsCard){
                return $this->ResponseData(null,'Delete Contact FAQs Card Opreation Failed',true,400);
            }

            $layoutiCategoriesFaqs = $this->layoutiCategoriesFaqs->find($contactFAQsCard->category);
            if($layoutiCategoriesFaqs != null){
                $quantity = $layoutiCategoriesFaqs->quantity -1 ;
                $layoutiCategoriesFaqs->update([
                    'quantity' => $quantity
                ]);
            }

            $contactFAQsCard->delete();
            return $this->ResponseData(null,'Delete Contact FAQs Card Opreation Success',true,200);


        }
    }
}
