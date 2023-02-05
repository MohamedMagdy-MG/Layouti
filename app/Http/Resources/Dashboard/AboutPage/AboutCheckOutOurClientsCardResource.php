<?php

namespace App\Http\Resources\Dashboard\AboutPage;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutCheckOutOurClientsCardResource extends JsonResource
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
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'industryEn' =>$this->industryEn,
            'industryAr' =>$this->industryAr,
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}
