<?php

namespace App\Http\Resources\Frontend\AboutPage;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutCheckOutOurClientsCardResource extends JsonResource
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
            'description' =>$language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'industry' =>$language == 'ar' ? $this->industryAr : $this->industryEn,
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}
