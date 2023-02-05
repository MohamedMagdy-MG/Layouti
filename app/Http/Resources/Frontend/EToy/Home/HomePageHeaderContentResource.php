<?php

namespace App\Http\Resources\Frontend\EToy\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageHeaderContentResource extends JsonResource
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

            'titleOne' => $language == 'ar' ? $this->titleOneAr : $this->titleOneEn ,
            'titleTwo' => $language == 'ar' ? $this->titleTwoAr : $this->titleTwoEn ,
            'titleThree' => $language == 'ar' ? $this->titleThreeAr : $this->titleThreeEn ,
            'availabilityTitle' => $language == 'ar' ? $this->availabilityTitleAr : $this->availabilityTitleEn ,
            'color' => $this->color ,
            'availabilityIOSIcon' => $this->availabilityIOSIcon != null ? env('APP_URL').$this->availabilityIOSIcon : null,
            'availabilityIOSLink' => $this->availabilityIOSLink ,
            'availabilityAndroidIcon' => $this->availabilityAndroidIcon != null ? env('APP_URL').$this->availabilityAndroidIcon : null,
            'availabilityAndroidLink' => $this->availabilityAndroidLink ,
            'topLeftImage' => $this->topLeftImage != null ? env('APP_URL').$this->topLeftImage : null,
            'topRightImage' => $this->topRightImage != null ? env('APP_URL').$this->topRightImage : null,
            'bottomLeftImage' => $this->bottomLeftImage != null ? env('APP_URL').$this->bottomLeftImage : null,
            'bottomRightImage' => $this->bottomRightImage != null ? env('APP_URL').$this->bottomRightImage : null,
            'bottomImage' => $this->bottomImage != null ? env('APP_URL').$this->bottomImage : null,
        ];
    }
}
