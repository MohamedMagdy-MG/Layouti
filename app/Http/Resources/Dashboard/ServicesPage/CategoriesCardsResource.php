<?php

namespace App\Http\Resources\Dashboard\ServicesPage;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Configurations\LayoutiCategories;
use App\Http\Resources\Dashboard\Configurations\LayoutiCategoriesResource;

class CategoriesCardsResource extends JsonResource
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
            'category' =>new LayoutiCategoriesResource($this->Category),
            'projects' =>json_decode($this->projects),
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'tagsEn' =>json_decode($this->tagsEn),
            'tagsAr' =>json_decode($this->tagsAr),
        ];
    }
}
