<?php

namespace App\Http\Controllers\API\Dashboard\ServicesPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ServicesPage\ServicesProcessTimeline;
use App\Models\ServicesPage\ServicesProcessTimelineCards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProcessTimelineController extends Controller
{
    use Response;
    public $servicesProcessTimeline;
    public $servicesProcessTimelineCard;

    public function __construct()
    {
        $this->servicesProcessTimeline = new ServicesProcessTimeline();
        $this->servicesProcessTimelineCard = new ServicesProcessTimelineCards();
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



        $servicesProcessTimeline = $this->servicesProcessTimeline->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$servicesProcessTimeline){

            $servicesProcessTimeline = $this->servicesProcessTimeline->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;
                    if(is_file($card['icon'])){
                        $imageName = 'media/ServicesPage/ProcessTimeline/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                        $card['icon']->move('media/ServicesPage/ProcessTimeline',$imageName);
                    }

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;
                    

                    $this->servicesProcessTimelineCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr ,
                        'icon' => $imageName,
                        'card' => $servicesProcessTimeline->id
                    ]);
                }
            }
        }else{

            $servicesProcessTimeline->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $servicesProcessTimelineCard = $this->servicesProcessTimelineCard->skip($key)->first();

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;
                    $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $descriptionEn = null;
                    $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $descriptionAr = null;

                    if($servicesProcessTimelineCard != null){

                        if($card['icon'] == "null"){
                            $imageName = null;
                            if($servicesProcessTimelineCard->image != null){
                                unlink($servicesProcessTimelineCard->image);
                            }
                        }
                        else{
                            $imageName = $servicesProcessTimelineCard->icon;
                            if(is_file($card['icon'])){
                                if($imageName != null){
                                    unlink($imageName);
                                }
                                $imageName = 'media/ServicesPage/ProcessTimeline/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                                $card['icon']->move('media/ServicesPage/ProcessTimeline',$imageName);
                            }
                        }

                        
                        $servicesProcessTimelineCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'icon' => $imageName,
                            'card' => $servicesProcessTimeline->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['icon'])){

                            $imageName = 'media/ServicesPage/ProcessTimeline/'.time().'-'.$key.'-'.$card['icon']->getClientOriginalName();
                            $card['icon']->move('media/ServicesPage/ProcessTimeline',$imageName);
                        }
                        $this->servicesProcessTimelineCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'descriptionEn' => $descriptionEn ,
                            'descriptionAr' => $descriptionAr ,
                            'icon' => $imageName,
                            'card' => $servicesProcessTimeline->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Services Process Timeline Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Services Process Timeline Card Opreation Failed.',false,400);
        }else{
            $servicesProcessTimelineCard = $this->servicesProcessTimelineCard->find($request->id);
            if(!$servicesProcessTimelineCard){
                return $this->ResponseData(null,'Delete Services Process Timeline Card Opreation Failed',true,400);
            }

            if(is_file($servicesProcessTimelineCard->icon)){
                if($servicesProcessTimelineCard->icon != null){
                    unlink($servicesProcessTimelineCard->icon);
                }
            }
            $servicesProcessTimelineCard->delete();
            return $this->ResponseData(null,'Delete Services Process Timeline Card Opreation Success',true,200);


        }
    }
}
