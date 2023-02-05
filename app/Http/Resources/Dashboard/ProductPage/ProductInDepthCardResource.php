<?php

namespace App\Http\Resources\Dashboard\ProductPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductInDepthCardResource extends JsonResource
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
            'headLineEn' => $this->headLineEn,
            'headLineAr' => $this->headLineAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'category' => $this->category,
        ];
    }
}
