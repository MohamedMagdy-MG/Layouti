<?php

namespace App\Http\Resources\Dashboard\EToy\TermsAndConditions;

use Illuminate\Http\Resources\Json\JsonResource;

class TermsAndConditionsPageRegistrationCardsResource extends JsonResource
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
            'cards' => TermsAndConditionsPageRegistrationCardsOfCardsResource::collection($this->Cards)
        ];
    }
}
