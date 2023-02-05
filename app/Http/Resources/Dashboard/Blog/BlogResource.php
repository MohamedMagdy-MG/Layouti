<?php

namespace App\Http\Resources\Dashboard\Blog;

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
        return [
            'id' => $this->id,
            'category' => new BlogCategoryResource($this->Category),
            'author' => new BlogCategoryResource($this->Author),
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'Images' => BlogImagesResource::collection($this->Images),
            'Paragraphs' => BlogParagraphResource::collection($this->Paragraphs),
            'SEO' => new BlogParagraphSeoResource($this->SEO),
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
