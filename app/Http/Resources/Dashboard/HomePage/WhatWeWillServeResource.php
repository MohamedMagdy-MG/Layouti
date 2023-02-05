<?php

namespace App\Http\Resources\Dashboard\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;

class WhatWeWillServeResource extends JsonResource
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
            'titleEn' =>$this->titleEn,
            'titleAr' =>$this->titleAr,
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'cards' => WhatWeWillServeCardsResource::collection($this->Cards)
        ];
    }
}
