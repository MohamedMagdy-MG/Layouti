<?php

namespace App\Http\Resources\Frontend\ThingsPage;

use Illuminate\Http\Resources\Json\JsonResource;

class OpportunityAlwaysExistsResource extends JsonResource
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

        ];
    }
}
