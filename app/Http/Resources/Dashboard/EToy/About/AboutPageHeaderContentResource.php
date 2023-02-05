<?php

namespace App\Http\Resources\Dashboard\EToy\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutPageHeaderContentResource extends JsonResource
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
            'color' => $this->color,
            'titleEn' => $this->titleEn ,
            'titleAr' => $this->titleAr ,
        ];
    }
}
