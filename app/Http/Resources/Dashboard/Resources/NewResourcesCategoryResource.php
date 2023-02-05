<?php

namespace App\Http\Resources\Dashboard\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NewResourcesCategoryResource extends JsonResource
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
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'status' => 'category',
        ];
    }
}
