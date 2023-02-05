<?php

namespace App\Http\Resources\Dashboard\LearnUI;

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
        return [
            'id' => $this->id,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'subTitleEn' => $this->subTitleEn,
            'subTitleAr' => $this->subTitleAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'createByEn' => $this->createByEn,
            'createdByAr' => $this->createdByAr,
            'iconOfCreated' => $this->iconOfCreated != null ? env('APP_URL').$this->iconOfCreated : null,
            'createdInEn' => $this->createdInEn,
            'createdInAr' => $this->createdInAr,
            'iconInCreated' => $this->iconInCreated != null ? env('APP_URL').$this->iconInCreated : null,
            'speakerEn' => $this->speakerEn,
            'speakerAr' => $this->speakerAr,
            'iconOfSpeaker' => $this->iconOfSpeaker != null ? env('APP_URL').$this->iconOfSpeaker : null,
        ];
    }
}
