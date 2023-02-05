<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIQuestionsCollapse;
use App\Models\LearnUI\LearnUIQuestionsCollapseCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsCollapseController extends Controller
{
    use Response;
    public $LearnUIQuestionsCollapse;
    public $LearnUIQuestionsCollapseCards;

    public function __construct()
    {
        $this->LearnUIQuestionsCollapse = new LearnUIQuestionsCollapse();
        $this->LearnUIQuestionsCollapseCards = new LearnUIQuestionsCollapseCards();
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



        $LearnUIQuestionsCollapse = $this->LearnUIQuestionsCollapse->first();
        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->subTitleEn != "null" ? $subTitleEn = $request->subTitleEn : $subTitleEn = null;
        $request->subTitleAr != "null" ? $subTitleAr = $request->subTitleAr : $subTitleAr = null;
        if(!$LearnUIQuestionsCollapse){




            $LearnUIQuestionsCollapse = $this->LearnUIQuestionsCollapse->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $card['questionsEn'] != "null" ? $questionsEn = $card['questionsEn'] : $questionsEn = null;
                    $card['questionsAr'] != "null" ? $questionsAr = $card['questionsAr'] : $questionsAr = null;
                    $card['answerEn'] != "null" ? $answerEn = $card['answerEn'] : $answerEn = null;
                    $card['answerAr'] != "null" ? $answerAr = $card['answerAr'] : $answerAr = null;

                    $this->LearnUIQuestionsCollapseCards->create([
                        'questionsEn' => $questionsEn ,
                        'questionsAr' => $questionsAr,
                        'answerEn' => $answerEn,
                        'answerAr' => $answerAr,
                        'card' => $LearnUIQuestionsCollapse->id
                    ]);
                }
            }
        }else{



            $LearnUIQuestionsCollapse->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $LearnUIQuestionsCollapseCards = $this->LearnUIQuestionsCollapseCards->skip($key)->first();

                    $card['questionsEn'] != "null" ? $questionsEn = $card['questionsEn'] : $questionsEn = null;
                    $card['questionsAr'] != "null" ? $questionsAr = $card['questionsAr'] : $questionsAr = null;
                    $card['answerEn'] != "null" ? $answerEn = $card['answerEn'] : $answerEn = null;
                    $card['answerAr'] != "null" ? $answerAr = $card['answerAr'] : $answerAr = null;

                    if($LearnUIQuestionsCollapseCards != null){


                        $LearnUIQuestionsCollapseCards->update([
                            'questionsEn' => $questionsEn ,
                            'questionsAr' => $questionsAr,
                            'answerEn' => $answerEn,
                            'answerAr' => $answerAr,
                            'card' => $LearnUIQuestionsCollapse->id
                        ]);
                    }else{


                        $this->LearnUIQuestionsCollapseCards->create([
                            'questionsEn' => $questionsEn ,
                            'questionsAr' => $questionsAr,
                            'answerEn' => $answerEn,
                            'answerAr' => $answerAr,
                            'card' => $LearnUIQuestionsCollapse->id
                        ]);
                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI UI Questions Collapse Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI UI Questions Collapse Card Opreation Failed.',false,400,$validator->errors());
        }else{
            $LearnUIQuestionsCollapseCards = $this->LearnUIQuestionsCollapseCards->find($request->id);
            if(!$LearnUIQuestionsCollapseCards){
                return $this->ResponseData(null,'Delete LearnUI UI Questions Collapse Card Opreation Failed',true,400);
            }




            $LearnUIQuestionsCollapseCards->delete();
            return $this->ResponseData(null,'Delete LearnUI UI Questions Collapse Card Opreation Success',true,200);


        }
    }
}
