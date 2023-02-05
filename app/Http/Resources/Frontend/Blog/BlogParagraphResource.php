<?php

namespace App\Http\Resources\Frontend\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogParagraphResource extends JsonResource
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
            'title' => $language == "ar" ? $this->titleAr : $this->titleEn,
            'description' => $language == "ar" ? $this->descriptionAr : $this->descriptionEn,
            'cards' => BlogParagraphImagesResource::collection($this->Cards),
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
