<?php

namespace App\Http\Resources\Dashboard\ProductPage\BodyDesignApp;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignAppImagesSectionResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
        ];
    }
}
