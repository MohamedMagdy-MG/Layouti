<?php

namespace App\Http\Resources\Dashboard\Resources;

use App\Http\Resources\Dashboard\Resources\NewResourcesCategoryResource;
use App\Http\Resources\Dashboard\Resources\NewResourcesSubCategoryResource;
use App\Models\Resources\ResourcesInnerPageCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class ResourcesInnerPageResource extends JsonResource
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
            $category = new NewResourcesCategoryResource($this->SubCategory->Category);
            $subCategory = new NewResourcesSubCategoryResource($this->SubCategory);
        }
        else{
            $subCategory = null;
            $category = new NewResourcesCategoryResource($this->Category);
        }

        $categoriesArray = [];
        $categories = ResourcesInnerPageCategory::where('page',$this->id)->get();
        foreach($categories as $category){
            if($category->SubCategory != null){
                $category = new NewResourcesSubCategoryResource($category->SubCategory);
            }
            else{
                $category = new NewResourcesCategoryResource($category->Category);
            }

            array_push($categoriesArray,$category);
        }
            
        return [
            'id' => $this->id,
            'category' => $category,
            'subCategory' => $subCategory,
            'categories' => $categoriesArray,
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
