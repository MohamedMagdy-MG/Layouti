<?php

namespace App\Http\Resources\Dashboard\ProductPage\BodyDesignApp;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignAppPersonaResource extends JsonResource
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
            'titleEn' => $this->titleEn ,
            'titleAr' => $this->titleAr ,
            'descriptionEn' => $this->descriptionEn ,
            'descriptionAr' => $this->descriptionAr ,
            'otherTitleEn' => $this->otherTitleEn ,
            'otherTitleAr' => $this->otherTitleAr ,
            'otherDescriptionEn' => $this->otherDescriptionEn ,
            'otherDescriptionAr' => $this->otherDescriptionAr ,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
        ];
    }
}
