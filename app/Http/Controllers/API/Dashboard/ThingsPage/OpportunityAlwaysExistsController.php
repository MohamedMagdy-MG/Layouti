<?php

namespace App\Http\Controllers\API\Dashboard\ThingsPage;

use App\Http\Controllers\Controller;
use App\Http\Traits\Response;
use App\Models\ThingsPage\ThingsOpportunityAlwaysExists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OpportunityAlwaysExistsController extends Controller
{
    use Response;
    public $thingsOpportunityAlwaysExists;

    public function __construct()
    {
        $this->thingsOpportunityAlwaysExists = new ThingsOpportunityAlwaysExists();
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

        if($cards_count > 0){
            foreach($cards as $key => $card){
                $thingsOpportunityAlwaysExists = $this->thingsOpportunityAlwaysExists->skip($key)->first();

                $card['titleEn'] != "null" ? $titleEn = $card['titleEn'] : $card['titleEn'];
                $card['titleAr'] != "null" ? $titleAr = $card['titleAr'] : $card['titleAr'];
                $card['descriptionEn'] != "null" ? $descriptionEn = $card['descriptionEn'] : $card['descriptionEn'];
                $card['descriptionAr'] != "null" ? $descriptionAr = $card['descriptionAr'] : $card['descriptionAr'];
                $card['dateEn'] != "null" ? $dateEn = $card['dateEn'] : $card['dateEn'];
                $card['dateAr'] != "null" ? $dateAr = $card['dateAr'] : $card['dateAr'];
                // $card['dateEn'] == "null" ? $dateEn = json_encode([]) : $dateEn = json_encode($card['dateEn']);
                // $card['dateAr'] == "null" ? $dateAr = json_encode([]) : $dateAr = json_encode($card['dateAr']);


                if($thingsOpportunityAlwaysExists != null){

                    


                    $thingsOpportunityAlwaysExists->update([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr,
                        'dateEn' => $dateEn,
                        'dateAr' => $dateAr
                    ]);

                }else{


                    $this->thingsOpportunityAlwaysExists->create([
                        'titleEn' => $titleEn ,
                        'titleAr' => $titleAr ,
                        'descriptionEn' => $descriptionEn ,
                        'descriptionAr' => $descriptionAr,
                        'dateEn' => $dateEn,
                        'dateAr' => $dateAr
                    ]);


                }
            }
        }

        return $this->ResponseData(null,'Update Things Opportunity Always Exists Opreation Success',true,200);
    }

    public function delete(Request $request)
    {
        $validator = Validator::make($request->only('id'),['id'=>'required|integer']);
        if($validator->fails()){
            return $this->ResponseData($validator->errors(),'Delete Things Opportunity Always Exists Card Opreation Failed.',false,400);
        }else{
            $thingsOpportunityAlwaysExists = $this->thingsOpportunityAlwaysExists->find($request->id);
            if(!$thingsOpportunityAlwaysExists){
                return $this->ResponseData(null,'Delete Things Opportunity Always Exists Card Opreation Failed',true,400);
            }


            $thingsOpportunityAlwaysExists->delete();
            return $this->ResponseData(null,'Delete Things Opportunity Always Exists Card Opreation Success',true,200);


        }
    }
}
