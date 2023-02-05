<?php

namespace App\Http\Resources\Dashboard\EToy\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageSectionThreeResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}
