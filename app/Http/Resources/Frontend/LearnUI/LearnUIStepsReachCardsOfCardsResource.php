<?php

namespace App\Http\Resources\Frontend\LearnUI;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnUIStepsReachCardsOfCardsResource extends JsonResource
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
            'icon' => $this->icon != null ? env('APP_URL').$this->icon : null,
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
        ];
    }
}
