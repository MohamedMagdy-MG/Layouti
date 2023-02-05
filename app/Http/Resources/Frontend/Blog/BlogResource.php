<?php

namespace App\Http\Resources\Frontend\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
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
            'category' => new BlogCategoryResource($this->Category),
            'author' => new BlogAuthorResource($this->Author),
            'title' => $language == "ar" ? $this->titleAr : $this->titleEn,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'Images' => BlogImagesResource::collection($this->Images),
            'Paragraphs' => BlogParagraphResource::collection($this->Paragraphs),
            'SEO' => new BlogParagraphSeoResource($this->SEO),
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
