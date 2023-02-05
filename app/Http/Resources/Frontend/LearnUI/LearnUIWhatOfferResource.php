<?php

namespace App\Http\Resources\Frontend\LearnUI;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnUIWhatOfferResource extends JsonResource
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
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'subTitle' => $language == 'ar' ? $this->subTitleAr : $this->subTitleEn,
            'points' => LearnUIWhatOfferPointsResource::collection($this->Points)
        ];
    }
}
