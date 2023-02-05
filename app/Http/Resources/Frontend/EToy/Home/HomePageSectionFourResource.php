<?php

namespace App\Http\Resources\Frontend\EToy\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageSectionFourResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'qoute' => $language == 'ar' ? $this->qouteAr : $this->qouteEn ,
            'name' => $language == 'ar' ? $this->nameAr : $this->nameEn ,
            'jopTitle' => $language == 'ar' ? $this->jopTitleAr : $this->jopTitleEn ,

        ];
    }
}
