<?php

namespace App\Http\Resources\Dashboard\Configurations;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourcesSubCategoryResourceDublicate extends JsonResource
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
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'Viwers' => count($this->Viwers),
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
