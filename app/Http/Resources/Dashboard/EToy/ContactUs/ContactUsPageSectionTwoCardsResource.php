<?php

namespace App\Http\Resources\Dashboard\EToy\ContactUs;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactUsPageSectionTwoCardsResource extends JsonResource
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
            'icon' => $this->icon != null ? env('APP_URL').$this->icon : null,
            'titleEn' => $this->titleEn ,
            'titleAr' => $this->titleAr ,
            'descriptionEn' => $this->descriptionEn ,
            'descriptionAr' => $this->descriptionAr ,
        ];
    }
}
