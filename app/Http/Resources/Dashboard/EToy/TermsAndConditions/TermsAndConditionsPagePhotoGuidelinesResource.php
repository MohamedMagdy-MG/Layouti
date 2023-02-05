<?php

namespace App\Http\Resources\Dashboard\EToy\TermsAndConditions;

use Illuminate\Http\Resources\Json\JsonResource;

class TermsAndConditionsPagePhotoGuidelinesResource extends JsonResource
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
            'titleEn' => $this->titleEn ,
            'titleAr' => $this->titleAr ,
            'subTitleEn' => $this->subTitleEn ,
            'subTitleAr' => $this->subTitleAr ,
            'cards' => TermsAndConditionsPagePhotoGuidelinesCardsResource::collection($this->Cards)
        ];

    }
}
