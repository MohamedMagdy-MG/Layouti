<?php

namespace App\Http\Resources\Dashboard\Resources;

use App\Http\Resources\Dashboard\Configurations\NewResourcesCategoryResource;
use App\Http\Resources\Dashboard\Configurations\NewResourcesSubCategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;

class NewResourcesInnerPageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->SubCategory != null){
            $category = new NewResourcesSubCategoryResource($this->SubCategory);
        }
        else{
            $category = new NewResourcesCategoryResource($this->Category);
        }
            
        return [
            'id' => $this->id,
            'category' => $category,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'link' => $this->link,
            'file' => $this->file ,
            'Clicks' => $this->Clicks != null ? $this->Clicks->count : 0 ,
            'Downloads' => count($this->Downloads),
            'likes' => count($this->Likes),
            'viwers' => count($this->Viwers),
            'color' => $this->color,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
