<?php

namespace App\Http\Resources\Frontend\HomePage;

use App\Http\Resources\Frontend\ThingsPage\OpportunityAlwaysExistsResource;
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
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        $things = ThingsCards::get();
        $data = [];
        foreach($things as $thing){
            array_push($data,$thing->card);
        }
        return [
            
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'description' =>$language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            
            'cards' => OpportunityAlwaysExistsResource::collection(ThingsOpportunityAlwaysExists::whereIn('id',$data)->get())
        ];
    }
}
