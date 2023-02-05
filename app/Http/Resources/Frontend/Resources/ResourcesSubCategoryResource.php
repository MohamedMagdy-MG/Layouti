<?php

namespace App\Http\Resources\Frontend\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourcesSubCategoryResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'name' => $language == 'ar' ? $this->nameAr : $this->nameEn,
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'Viwers' => count($this->Viwers),
            'status' => 'subCategory',
            'Category' => new NewResourcesCategoryResource($this->Category),
            'InnerPage' => ResourcesInnerPageResource::collection($this->InnerPage)
        ];
    }
}
