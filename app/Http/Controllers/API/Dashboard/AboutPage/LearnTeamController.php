<?php

namespace App\Http\Controllers\API\Dashboard\AboutPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\AboutPage\AboutTeam;
use App\Models\AboutPage\AboutTeamCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LearnTeamController extends Controller
{
    use Response;
    public $aboutTeam;
    public $aboutTeamCard;

    public function __construct()
    {
        $this->aboutTeam = new AboutTeam();
        $this->aboutTeamCard = new AboutTeamCard();
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



        $aboutTeam = $this->aboutTeam->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;

        if(!$aboutTeam){

            $aboutTeam = $this->aboutTeam->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){
                    $imageName = null;
                    if(is_file($card['image'])){
                        $imageName = 'media/AboutPage/Team/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                        $card['image']->move('media/AboutPage/Team',$imageName);
                    }

                    $card['nameEn'] != "null" ? $nameEn = $card['nameEn'] : $nameEn = null;
                    $card['nameAr'] != "null" ? $nameAr = $card['nameAr'] : $nameAr = null;
                    $card['jobTitleEn'] != "null" ? $jobTitleEn = $card['jobTitleEn'] : $jobTitleEn = null;
                    $card['jobTitleAr'] != "null" ? $jobTitleAr = $card['jobTitleAr'] : $jobTitleAr = null;


                    $this->aboutTeamCard->create([
                        'nameEn' => $nameEn ,
                        'nameAr' => $nameAr ,
                        'jobTitleEn' => $jobTitleEn ,
                        'jobTitleAr' => $jobTitleAr ,
                        'image' => $imageName,
                        'card' => $aboutTeam->id
                    ]);
                }
            }
        }else{

            $aboutTeam->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,
            ]);

            if($cards_count > 0){
                foreach($cards as $key => $card){


                    $aboutTeamCard = $this->aboutTeamCard->skip($key)->first();

                    $card['nameEn'] != "null" ? $nameEn = $card['nameEn'] : $nameEn = null;
                    $card['nameAr'] != "null" ? $nameAr = $card['nameAr'] : $nameAr = null;
                    $card['jobTitleEn'] != "null" ? $jobTitleEn = $card['jobTitleEn'] : $jobTitleEn = null;
                    $card['jobTitleAr'] != "null" ? $jobTitleAr = $card['jobTitleAr'] : $jobTitleAr = null;

                    if($aboutTeamCard != null){
                        if($card['image'] == "null"){
                            $imageName = null;
                            if($aboutTeamCard->image != null){
                                unlink($aboutTeamCard->image);
                            }
                        }else{
                            $imageName = $aboutTeamCard->image;
                            if(is_file($card['image'])){
                                if($imageName != null){
                                    unlink($imageName);
                                }
                                $imageName = 'media/AboutPage/Team/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                                $card['image']->move('media/AboutPage/Team',$imageName);
                            }
                        }
                        
                        $aboutTeamCard->update([
                            'nameEn' => $nameEn ,
                            'nameAr' => $nameAr ,
                            'jobTitleEn' => $jobTitleEn ,
                            'jobTitleAr' => $jobTitleAr ,
                            'image' => $imageName,
                            'card' => $aboutTeam->id
                        ]);
                    }else{
                        $imageName = null;
                        if(is_file($card['image'])){

                            $imageName = 'media/AboutPage/Team/'.time().'-'.$key.'-'.$card['image']->getClientOriginalName();
                            $card['image']->move('media/AboutPage/Team',$imageName);
                        }
                        $this->aboutTeamCard->create([
                            'nameEn' => $nameEn ,
                            'nameAr' => $nameAr ,
                            'jobTitleEn' => $jobTitleEn ,
                            'jobTitleAr' => $jobTitleAr ,
                            'image' => $imageName,
                            'card' => $aboutTeam->id
                        ]);

                    }

                }
            }
        }
        return $this->ResponseData(null,'Update Team Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete about Team Card Opreation Failed.',false,400);
        }else{
            $aboutTeamCard = $this->aboutTeamCard->find($request->id);
            if(!$aboutTeamCard){
                return $this->ResponseData(null,'Delete about Team Card Opreation Failed',true,400);
            }

            if(is_file($aboutTeamCard->image)){
                if($aboutTeamCard->image != null){
                    unlink($aboutTeamCard->image);
                }
            }
            $aboutTeamCard->delete();
            return $this->ResponseData(null,'Delete about Team Card Opreation Success',true,200);


        }
    }
}

