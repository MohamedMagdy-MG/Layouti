<?php

namespace App\Http\Resources\Dashboard\EToy\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutPageSectionTwoResource extends JsonResource
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
            'titleOneEn' => $this->titleOneEn ,
            'titleOneAr' => $this->titleOneAr ,
            'titleTwoEn' => $this->titleTwoEn ,
            'titleTwoAr' => $this->titleTwoAr ,
            'cards' => AboutPageSectionTwoCardsResource::collection($this->Cards)
        ];
    }
}
