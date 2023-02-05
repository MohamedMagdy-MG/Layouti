<?php

namespace App\Http\Resources\Dashboard\HomePage;

use App\Http\Resources\Dashboard\ThingsPage\OpportunityAlwaysExistsResource;
use App\Models\HomePage\ThingsCards;
use App\Models\ThingsPage\ThingsOpportunityAlwaysExists;
use Illuminate\Http\Resources\Json\JsonResource;

class ThingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $things = ThingsCards::get();
        $data = [];
        foreach($things as $thing){
            array_push($data,$thing->card);
        }
        return [
            'id' => $this->id,
            'titleEn' =>$this->titleEn,
            'titleAr' =>$this->titleAr,
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'cards' => OpportunityAlwaysExistsResource::collection(ThingsOpportunityAlwaysExists::whereIn('id',$data)->get())
        ];
    }
}
