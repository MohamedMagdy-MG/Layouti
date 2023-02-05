<?php

namespace App\Http\Resources\Frontend\Resources;

use App\Models\Resources\ResourcesInnerPageCategory;
use App\Models\Resources\ResourcesInnerPageLikes;
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
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        $checkIP = ResourcesInnerPageLikes::where('ip',request()->ip())->where('inner',$this->id)->first();
        $checkIP != null ? $ip = true : $ip = false;
        

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
            'categories' => $categoriesArray,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'link' => $this->link,
            'file' => $this->file,
            'likes' => count($this->Likes),
            'viwers' => count($this->Viwers),
            'ip' => $ip,
            'Clicks' => $this->Clicks != null ? $this->Clicks->count : 0 ,
            'Downloads' => count($this->Downloads),
            'color' => $this->color
        ];
    }
}
