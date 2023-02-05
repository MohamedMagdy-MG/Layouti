<?php

namespace App\Http\Controllers\API\Dashboard\LearnUi;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\LearnUI\LearnUIStepsReachCards;
use App\Models\LearnUI\LearnUIStepsReachCardsOfCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StepsReachCardsController extends Controller
{
    use Response;
    public $LearnUIStepsReachCards;
    public $LearnUIStepsReachCardsOfCards;

    public function __construct()
    {
        $this->LearnUIStepsReachCards = new LearnUIStepsReachCards();
        $this->LearnUIStepsReachCardsOfCards = new LearnUIStepsReachCardsOfCards();
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



        $LearnUIStepsReachCards = $this->LearnUIStepsReachCards->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->subTitleEn != "null" ? $subTitleEn = $request->subTitleEn : $subTitleEn = null;
        $request->subTitleAr != "null" ? $subTitleAr = $request->subTitleAr : $subTitleAr = null;

        if(!$LearnUIStepsReachCards){
            




            $LearnUIStepsReachCards = $this->LearnUIStepsReachCards->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){

                    $iconName = null;
                    if(is_file($request->icon)){
                        $iconName = 'media/LearnUI/StepsReachCardsOfCards/'.time().'-'.$card['icon']->getClientOriginalName();
                        $card['icon']->move('media/LearnUI/StepsReachCardsOfCards',$iconName);
                    }

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;


                    $this->LearnUIStepsReachCardsOfCards->create([
                        'icon' => $iconName ,
                        'titleEn' => $titleEn,
                        'titleAr' => $titleAr,
                        'descriptionEn' => $descriptionEn,
                        'descriptionAr' => $descriptionAr,
                        'card' => $LearnUIStepsReachCards->id
                    ]);
                }
            }
        }else{



            $LearnUIStepsReachCards->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'subTitleEn' => $subTitleEn ,
                'subTitleAr' => $subTitleAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $LearnUIStepsReachCardsOfCards = $this->LearnUIStepsReachCardsOfCards->skip($key)->first();

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;


                    if($LearnUIStepsReachCardsOfCards != null){

                        if($request->icon  == "null"){
                            $iconName = null;
                            if($LearnUIStepsReachCardsOfCards->icon != null){
                                unlink($LearnUIStepsReachCardsOfCards->icon);
                            }
                        }else{
                            $iconName = $LearnUIStepsReachCardsOfCards->icon;
                            if(is_file($card['icon'])){
                                if($LearnUIStepsReachCardsOfCards->icon != null){
                                    unlink($LearnUIStepsReachCardsOfCards->icon);
                                }
                                $iconName = 'media/LearnUI/StepsReachCardsOfCards/'.time().'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/LearnUI/StepsReachCardsOfCards',$iconName);
                            }
                        }

                        
                        
                        $LearnUIStepsReachCardsOfCards->update([
                            'icon' => $iconName ,
                            'titleEn' => $titleEn,
                            'titleAr' => $titleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr,
                            'card' => $LearnUIStepsReachCards->id
                        ]);
                    }else{
                        $iconName = null;
                        if(is_file($card['icon'])){
                            $iconName = 'media/LearnUI/StepsReachCardsOfCards/'.time().'-'.$card['icon']->getClientOriginalName();
                            $card['icon']->move('media/LearnUI/StepsReachCardsOfCards',$iconName);
                        }

                        $this->LearnUIStepsReachCardsOfCards->create([
                            'icon' => $iconName ,
                            'titleEn' => $titleEn,
                            'titleAr' => $titleAr,
                            'descriptionEn' => $descriptionEn,
                            'descriptionAr' => $descriptionAr,
                            'card' => $LearnUIStepsReachCards->id
                        ]);
                    }

                }
            }
        }
        return $this->ResponseData(null,'Update LearnUI UI Steps Reach Cards Of Cards Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData(null,'Delete LearnUI UI Steps Reach Cards Of Cards Opreation Failed.',false,400,$validator->errors());
        }else{
            $LearnUIStepsReachCardsOfCards = $this->LearnUIStepsReachCardsOfCards->find($request->id);
            if(!$LearnUIStepsReachCardsOfCards){
                return $this->ResponseData(null,'Delete LearnUI UI Steps Reach Cards Of Cards Opreation Failed',true,400);
            }


            if($LearnUIStepsReachCardsOfCards->icon != null){
                unlink($LearnUIStepsReachCardsOfCards->icon);
            }

            $LearnUIStepsReachCardsOfCards->delete();
            return $this->ResponseData(null,'Delete LearnUI UI Steps Reach Cards Of Cards Opreation Success',true,200);


        }
    }
}
