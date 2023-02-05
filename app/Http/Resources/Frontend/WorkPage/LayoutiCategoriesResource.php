<?php

namespace App\Http\Resources\Frontend\WorkPage;

use Illuminate\Http\Resources\Json\JsonResource;

class LayoutiCategoriesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';

        return [
            'id' => $this->id,
            'name' => $language == 'ar' ? $this->nameAr : $this->nameEn,
            'productsCount' => count($this->Products)
        ];
    }
}
