<?php

namespace App\Http\Resources\Frontend\ServicesPage;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnAboutLayoutiResource extends JsonResource
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
            'downImageDescription' =>$language == 'ar' ? $this->downImageDescriptionAr : $this->downImageDescriptionEn,
            'topImage' => $this->topImage != null ? env('APP_URL').$this->topImage : null,
            'downImage' => $this->downImage != null ? env('APP_URL').$this->downImage : null
        ];
    }
}
