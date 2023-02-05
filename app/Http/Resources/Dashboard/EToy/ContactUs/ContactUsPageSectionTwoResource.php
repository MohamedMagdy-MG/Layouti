<?php

namespace App\Http\Resources\Dashboard\EToy\ContactUs;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsPageSectionTwoResource extends JsonResource
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
            'descriptionEn' => $this->descriptionEn ,
            'descriptionAr' => $this->descriptionAr ,
            'cards' => ContactUsPageSectionTwoCardsResource::collection($this->Cards)
        ];
    }
}