<?php

namespace App\Http\Resources\Dashboard\Configurations;

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
        $subCategoryCount = count($this->SubCategories);
        $count = $this->nameEn.' ( ' .count($this->InnerPage).' )';
        if($subCategoryCount > 0){
            $count = $this->nameEn;
        }
        return [
            'id' => $this->id,
            'nameEn' => $this->nameEn,
            'nameEnCount' => $count,
            'nameAr' => $this->nameAr,
            'status' => 'category',
            'count' => count($this->InnerPage),
            'children' => NewResourcesSubCategoryResource::collection($this->SubCategories),
        ];
    }
}
