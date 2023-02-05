<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignDesignProductsStaticResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'cards' => DesignDesignProductsStaticCardsResource::collection($this->Cards)
        ];
    }
}
