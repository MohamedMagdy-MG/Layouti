<?php

namespace App\Http\Resources\Frontend\AboutPage;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutLearnAboutLayoutiResource extends JsonResource
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
            'leftImage' => $this->leftImage != null ? env('APP_URL').$this->leftImage : null,
            'rightImage' => $this->rightImage != null ? env('APP_URL').$this->rightImage : null,
            'otherDescription' =>$language == 'ar' ? $this->otherDescriptionAr : $this->otherDescriptionEn,
            'otherLeftImage' => $this->otherLeftImage != null ? env('APP_URL').$this->otherLeftImage : null,
            'otherRightImage' => $this->otherRightImage != null ? env('APP_URL').$this->otherRightImage : null
        ];
    }
}
