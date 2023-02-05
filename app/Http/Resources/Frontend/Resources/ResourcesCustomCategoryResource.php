<?php

namespace App\Http\Resources\Frontend\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourcesCustomCategoryResource extends JsonResource
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
            'icon' => $this->icon != null ? env('APP_URL').$this->icon : null,
            'name' => $language == 'ar' ? $this->nameAr : $this->nameEn,
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'status' => 'category',
            'subCategoeries' => ResourcesSubCategoryResource::collection($this->SubCategories),
            'InnerPage' => ResourcesInnerPageResource::collection($this->InnerPage)
        ];
    }
}
