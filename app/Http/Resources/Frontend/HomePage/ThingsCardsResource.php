<?php

namespace App\Http\Resources\Frontend\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;

class ThingsCardsResource extends JsonResource
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
        return [
            
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'description' =>$language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'date' =>$language == 'ar' ? $this->dateAr : $this->dateEn,
            
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
            
        ];
    }
}
