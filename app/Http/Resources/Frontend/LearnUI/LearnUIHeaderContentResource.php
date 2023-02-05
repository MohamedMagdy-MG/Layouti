<?php

namespace App\Http\Resources\Frontend\LearnUI;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnUIHeaderContentResource extends JsonResource
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
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'createBy' => $language == 'ar' ? $this->createdByAr : $this->createByEn,
            'iconOfCreated' => $this->iconOfCreated != null ? env('APP_URL').$this->iconOfCreated : null,
            'createdIn' => $language == 'ar' ? $this->createdInAr : $this->createdInEn,
            'iconInCreated' => $this->iconInCreated != null ? env('APP_URL').$this->iconInCreated : null,
            'speaker' => $language == 'ar' ? $this->speakerAr : $this->speakerEn,
            'iconOfSpeaker' => $this->iconOfSpeaker != null ? env('APP_URL').$this->iconOfSpeaker : null,
        ];
    }
}
