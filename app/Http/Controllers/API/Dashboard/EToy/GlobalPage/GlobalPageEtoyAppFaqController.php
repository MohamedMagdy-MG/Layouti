<?php

namespace App\Http\Controllers\API\Dashboard\EToy\GlobalPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\EToy\GlobalPage\GlobalPageEtoyFaq;
use App\Models\EToy\GlobalPage\GlobalPageEtoyFaqCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GlobalPageEtoyAppFaqController extends Controller
{
    use Response;
    public $GlobalPageEtoyFaq;
    public $GlobalPageEtoyFaqCards;

    public function __construct()
    {
        $this->GlobalPageEtoyFaq = new GlobalPageEtoyFaq();
        $this->GlobalPageEtoyFaqCards = new GlobalPageEtoyFaqCards();
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



        $GlobalPageEtoyFaq = $this->GlobalPageEtoyFaq->first();
        if(!$GlobalPageEtoyFaq){
            $GlobalPageEtoyFaq = $this->GlobalPageEtoyFaq->create([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $this->GlobalPageEtoyFaqCards->create([
                        'questionEn' => $card['questionEn'] ,
                        'questionAr' => $card['questionAr'] ,
                        'answerEn' => $card['answerEn'] ,
                        'answerAr' => $card['answerAr'] ,
                        'card' => $GlobalPageEtoyFaq->id
                    ]);
                }
            }
        }else{

            $GlobalPageEtoyFaq->update([
                'titleEn' => $request->titleEn ,
                'titleAr' => $request->titleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $GlobalPageEtoyFaqCards = $this->GlobalPageEtoyFaqCards->skip($key)->first();
                    if($GlobalPageEtoyFaqCards != null){
                        $GlobalPageEtoyFaqCards->update([
                            'questionEn' => $card['questionEn'] ,
                            'questionAr' => $card['questionAr'] ,
                            'answerEn' => $card['answerEn'] ,
                            'answerAr' => $card['answerAr'] ,
                            'card' => $GlobalPageEtoyFaq->id
                        ]);
                    }else{

                        $this->GlobalPageEtoyFaqCards->create([
                            'questionEn' => $card['questionEn'] ,
                            'questionAr' => $card['questionAr'] ,
                            'answerEn' => $card['answerEn'] ,
                            'answerAr' => $card['answerAr'] ,
                            'card' => $GlobalPageEtoyFaq->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Etoy Global Add Faq Page Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete Etoy Global Add Faq Page Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $GlobalPageEtoyFaqCards = $this->GlobalPageEtoyFaqCards->find($request->id);
            if(!$GlobalPageEtoyFaqCards){
                return $this->ResponseData(null,'Delete Etoy Global Add Faq Page Card Opreation Failed',true,400);
            }

            $GlobalPageEtoyFaqCards->delete();
            return $this->ResponseData(null,'Delete Etoy Global Add Faq Page Card Opreation Success',true,200);


        }
    }
}
