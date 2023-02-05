<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\HomePage\ProcessDesignSkills;
use App\Models\HomePage\ProcessDesignSkills_Cards;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Validator;

class ProcessDesignSkillsController extends Controller
{
    use Response;
    public $processDesignSkills;
    public $processDesignSkillsCard;

    public function __construct()
    {
        $this->processDesignSkills = new ProcessDesignSkills();
        $this->processDesignSkillsCard = new ProcessDesignSkills_Cards();
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



        $processDesignSkills = $this->processDesignSkills->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;


        if(!$processDesignSkills){

            $processDesignSkills = $this->processDesignSkills->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/HomePage/ProcessDesignSkills/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/HomePage/ProcessDesignSkills',$imageName);
                    }

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;
                    $card['ProcessPointsEn'] == null ? $ProcessPointsEn = json_encode([]) : $ProcessPointsEn = json_encode($card['ProcessPointsEn']);
                    $card['ProcessPointsAr'] == null ? $ProcessPointsAr = json_encode([]) : $ProcessPointsAr = json_encode($card['ProcessPointsAr']);
                    $this->processDesignSkillsCard->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'ProcessPointsEn' =>  $ProcessPointsEn,
                        'ProcessPointsAr' =>  $ProcessPointsAr,
                        'image' => $imageName,
                        'card' => $processDesignSkills->id
                    ]);
                }
            }
        }else{

            $processDesignSkills->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $processDesignSkillsCard = $this->processDesignSkillsCard->skip($key)->first();

                    $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $titleEn = null;
                    $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $titleAr = null;

                    if($processDesignSkillsCard != null){

                        if($card['image'] == "null"){
                            $imageName = null;
                            if($processDesignSkills->image != null){
                                unlink($processDesignSkills->image);
                            }
                        }
                        else{
                            $imageName = $processDesignSkills->image;
                            if(is_file($card['image'])){
                                if($imageName != null){

                                    unlink($imageName);

                                }
                                $imageName = 'media/HomePage/ProcessDesignSkills/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                                $card['image']->move('media/HomePage/ProcessDesignSkills',$imageName);
                            }
                        }
                        
                        
                        $card['ProcessPointsEn'] == null ? $ProcessPointsEn = json_encode([]) : $ProcessPointsEn = json_encode($card['ProcessPointsEn']);
                        $card['ProcessPointsAr'] == null ? $ProcessPointsAr = json_encode([]) : $ProcessPointsAr = json_encode($card['ProcessPointsAr']);


                        $processDesignSkillsCard->update([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'ProcessPointsEn' =>  $ProcessPointsEn,
                            'ProcessPointsAr' =>  $ProcessPointsAr,
                            'image' => $imageName,
                            'card' => $processDesignSkills->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){
                            $imageName = 'media/HomePage/ProcessDesignSkills/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/HomePage/ProcessDesignSkills',$imageName);
                        }

                        $card['ProcessPointsEn'] == null ? $ProcessPointsEn = json_encode([]) : $ProcessPointsEn = json_encode($card['ProcessPointsEn']);
                        $card['ProcessPointsAr'] == null ? $ProcessPointsAr = json_encode([]) : $ProcessPointsAr = json_encode($card['ProcessPointsAr']);


                        $this->processDesignSkillsCard->create([
                            'titleEn' => $titleEn ,
                            'titleAr' => $titleAr ,
                            'ProcessPointsEn' =>  $ProcessPointsEn,
                            'ProcessPointsAr' =>  $ProcessPointsAr,
                            'image' => $imageName,
                            'card' => $processDesignSkills->id
                        ]);
                    }
                }
            }
        }
        return $this->ResponseData(null,'Update Process Design Skills Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Process Design Skills Card Opreation Failed.',false,400);
        }else{
            $processDesignSkillsCard = $this->processDesignSkillsCard->find($request->id);
            if(!$processDesignSkillsCard){
                return $this->ResponseData(null,'Delete Process Design Skills Card Opreation Failed',true,400);
            }

            if(is_file($processDesignSkillsCard->image)){
                if($processDesignSkillsCard->image != null){
                    unlink($processDesignSkillsCard->image);
                }
            }
            $processDesignSkillsCard->delete();
            return $this->ResponseData(null,'Delete Process Design Skills Card Opreation Success',true,200);


        }
    }
}
