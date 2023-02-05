<?php

namespace App\Http\Resources\Dashboard\Resources;

use App\Http\Resources\Dashboard\Resources\NewResourcesCategoryResource;
use App\Http\Resources\Dashboard\Resources\NewResourcesSubCategoryResource;
use App\Models\Resources\ResourcesInnerPageCategory;
use Illuminate\Http\Resources\Json\JsonResource;

class resourcesInnerPagePendingResource extends JsonResource
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
            'title' => $this->title,
            'link' => $this->link,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
