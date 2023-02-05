<?php

namespace App\Http\Controllers\API\Dashboard\DaysDesign;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\DaysDesign\CvDesignExperiences;
use App\Models\DaysDesign\CvDesignExperiencesRole;
use App\Models\DaysDesign\CvDesignExperiencesRolePoints;
use Illuminate\Http\Request;

class cvDesignExperiencesController extends Controller
{
    use Response;
    public $cvDesignExperiences;
    public $cvDesignExperiencesRole;
    public $cvDesignExperiencesRolePoints;

    public function __construct()
    {
        $this->cvDesignExperiences = new CvDesignExperiences();
        $this->cvDesignExperiencesRole = new CvDesignExperiencesRole();
        $this->cvDesignExperiencesRolePoints = new CvDesignExperiencesRolePoints();
        $this->middleware('checkAuth');
    }

    public function CvDesignExperiencesRolePoints($cvDesignExperiencesRole,$points,$points_count)
    {
        if($points_count > 0){
            foreach($points as $point){

                $point['pointEn'] == "null" ? $pointEn = null : $pointEn = $point['pointEn']; 
                $point['pointAr'] == "null" ? $pointAr = null : $pointAr = $point['pointAr']; 

                $this->cvDesignExperiencesRolePoints->create([
                    'pointEn' => $pointEn,
                    'pointAr' => $pointAr,
                    'card' => $cvDesignExperiencesRole,
                ]);
                
            }
        }       
    }

    public function CvDesignExperiencesRole($cvDesignExperiences,$cards,$cards_count)
    {
        if($cards_count > 0){
            foreach($cards as $card){

                $card['titleEn'] == "null" ? $titleEn = null : $titleEn = $card['titleEn']; 
                $card['titleAr'] == "null" ? $titleAr = null : $titleAr = $card['titleAr']; 
                $card['descriptionEn'] == "null" ? $descriptionEn = null : $descriptionEn = $card['descriptionEn']; 
                $card['descriptionAr'] == "null" ? $descriptionAr = null : $descriptionAr = $card['descriptionAr']; 

                $cvDesignExperiencesRole = $this->cvDesignExperiencesRole->create([
                    'titleEn' => $titleEn,
                    'titleAr' => $titleAr,
                    'descriptionEn' => $descriptionEn,
                    'descriptionAr' => $descriptionAr,
                    'card' => $cvDesignExperiences,
                ]);

                if(array_key_exists('points',$card)){
                    $points_count   = count($card['points']);
                    $points  = $card['points'];
                    $this->CvDesignExperiencesRolePoints($cvDesignExperiencesRole->id,$points,$points_count);
                }
                
            }
        }    
    }

    public function save(Request $request)
    {

        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }
        $cvDesignExperiencesOld = $this->cvDesignExperiences->get();
        foreach($cvDesignExperiencesOld as $cvDesignExperienceOld){
            $cvDesignExperienceOld->delete();
        }   
        if($cards_count > 0){
            foreach($cards as $card){

                $card['positionTitleEn'] == "null" ? $positionTitleEn = null : $positionTitleEn = $card['positionTitleEn']; 
                $card['positionTitleAr'] == "null" ? $positionTitleAr = null : $positionTitleAr = $card['positionTitleAr']; 
                $card['positionType'] == "null" ? $positionType = null : $positionType = $card['positionType']; 
                $card['companyNameEn'] == "null" ? $companyNameEn = null : $companyNameEn = $card['companyNameEn']; 
                $card['companyNameAr'] == "null" ? $companyNameAr = null : $companyNameAr = $card['companyNameAr']; 
                $card['companyCountry'] == "null" ? $companyCountry = null : $companyCountry = $card['companyCountry']; 
                $card['workDate'] == "null" ? $workDate = null : $workDate = $card['workDate']; 
                $card['startWorkDate'] == "null" ? $startWorkDate = null : $startWorkDate = $card['startWorkDate']; 
                $card['endWorkDate'] == "null" ? $endWorkDate = null : $endWorkDate = $card['endWorkDate']; 

                $cvDesignExperiences = $this->cvDesignExperiences->create([
                    'positionTitleEn' => $positionTitleEn,
                    'positionTitleAr' => $positionTitleAr,
                    'positionType' => $positionType,
                    'companyNameEn' => $companyNameEn,
                    'companyNameAr' => $companyNameAr,
                    'companyCountry' => $companyCountry,
                    'workDate' => $workDate,
                    'startWorkDate' => $startWorkDate,
                    'endWorkDate' => $endWorkDate,
                ]);

                if(array_key_exists('cards_of_cards',$card)){
                    $cards_count   = count($card['cards_of_cards']);
                    $cards  = $card['cards_of_cards'];
                    $this->CvDesignExperiencesRole($cvDesignExperiences->id,$cards,$cards_count);
                }
                
            }
        }       
        return $this->ResponseData(null,'Update 365Design CV Design Experiences Opreation Success',true,200);
    }

   
}
