<?php

namespace App\Http\Resources\Frontend\EToy\TermsAndConditions;

use Illuminate\Http\Resources\Json\JsonResource;

class TermsAndConditionsPageHowToEarnPointsCardsResource extends JsonResource
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
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn ,
            'subTitle' => $language == 'ar' ? $this->subTitleAr : $this->subTitleEn ,
            'cards' => TermsAndConditionsPageHowToEarnPointsCardsOfCardsResource::collection($this->Cards)
        ];
    }
}
