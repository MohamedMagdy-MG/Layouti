<?php

namespace App\Http\Resources\Frontend\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessDesignSkillsCardsResource extends JsonResource
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
            'processPoints' =>$language == 'ar' ? $this->ProcessPointsAr != null ? json_decode($this->ProcessPointsAr): json_decode('[]') : $this->ProcessPointsEn != null ? json_decode($this->ProcessPointsEn): json_decode('[]'),
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}
