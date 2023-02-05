<?php

namespace App\Http\Controllers\API\Dashboard\HomePage;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ThingsPage\OpportunityAlwaysExistsResource;
use App\Http\Traits\Response;
use App\Models\HomePage\things;
use App\Models\HomePage\ThingsCards;
use App\Models\ThingsPage\ThingsOpportunityAlwaysExists;
use Illuminate\Http\Request;

class ThingsController extends Controller
{
    use Response;
    public $things;
    public $thingsCards;
    public $thingsOpportunityAlwaysExists;
    
    public function __construct()
    {
        $this->things = new things();
        $this->thingsCards = new ThingsCards();
        $this->thingsOpportunityAlwaysExists = new ThingsOpportunityAlwaysExists();
        $this->middleware('checkAuth');
    }

    public function ThingsOpportunityAlwaysExists()
    {
        return $this->ResponseData(OpportunityAlwaysExistsResource::collection($this->thingsOpportunityAlwaysExists->get()),'get Things Opportunity Always Exists Data Success',true,200);
    }

    public function save(Request $request)
    {
        $cards_count  = 0 ;
        $cards = [];
        if($request->has('cards')){
            $cards_count   = count($request->cards);
            $cards  = $request->cards;
        }

        
        $things = $this->things->first();

        $request->titleEn != "null" ? $titleEn = $request->titleEn : $titleEn = null;
        $request->titleAr != "null" ? $titleAr = $request->titleAr : $titleAr = null;
        $request->descriptionEn != "null" ? $descriptionEn = $request->descriptionEn : $descriptionEn = null;
        $request->descriptionAr != "null" ? $descriptionAr = $request->descriptionAr : $descriptionAr = null;



        if(!$things){
           
            $this->things->create([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,

                
            ]);
        }else{
            
            $things->update([
                'titleEn' => $titleEn ,
                'titleAr' => $titleAr ,
                'descriptionEn' => $descriptionEn ,
                'descriptionAr' => $descriptionAr ,

                
            ]);
        }

        $oldThingsCards = $this->thingsCards->get();
        foreach ($oldThingsCards as $oldThingsCard) {
            $oldThingsCard->delete();
        }
        if($cards_count > 0){

            foreach($cards as $card){
                $this->thingsCards->create([
                    'card' => $card
                ]);
            }
        }
        return $this->ResponseData(null,'Update Things Opreation Success',true,200);
    }
}
