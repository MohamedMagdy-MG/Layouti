<?php

namespace App\Http\Resources\Frontend\AboutPage;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutTeamCardResource extends JsonResource
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
            'name' => $language == 'ar' ? $this->nameAr : $this->nameEn,
            'jobTitle' =>$language == 'ar' ? $this->jobTitleAr : $this->jobTitleEn,
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}
