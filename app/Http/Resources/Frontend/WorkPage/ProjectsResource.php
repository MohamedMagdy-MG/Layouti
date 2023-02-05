<?php

namespace App\Http\Resources\Frontend\WorkPage;

use App\Http\Resources\Frontend\ServicesPage\CategoriesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
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
            'name' => $language == 'ar' ? $this->ProjectInformation->nameAr : $this->ProjectInformation->nameEn,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'category' => new LayoutiCategoriesResource($this->Category)
        ];
    }
}
