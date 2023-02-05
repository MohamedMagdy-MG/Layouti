<?php

namespace App\Http\Resources\Frontend\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignCategoryResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'coverImage' => $this->coverImage != null ? env('APP_URL').$this->coverImage : null,
            'title' => $language == "ar" ? $this->titleAr : $this->titleEn,
            'description' => $language == "ar" ? $this->descriptionAr : $this->descriptionEn,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
        
    }
}
