<?php

namespace App\Http\Resources\Dashboard\Configurations;

use Illuminate\Http\Resources\Json\JsonResource;

class ResourcesCategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $count = count($this->InnerPage);
        foreach($this->SubCategories as $category){
            $count = $count + count($category->InnerPage);
        }

        return [
            'id' => $this->id,
            'icon' => $this->icon != null ? env('APP_URL').$this->icon : null,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'OfSubCat' => count($this->SubCategories),
            'OfPages' => $count,
            'subCategories' => ResourcesSubCategoryResourceDublicate::collection($this->SubCategories),
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
