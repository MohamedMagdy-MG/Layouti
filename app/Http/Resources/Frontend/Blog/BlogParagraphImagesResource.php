<?php

namespace App\Http\Resources\Frontend\Blog;

use Illuminate\Http\Resources\Json\JsonResource;

class BlogParagraphImagesResource extends JsonResource
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
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
