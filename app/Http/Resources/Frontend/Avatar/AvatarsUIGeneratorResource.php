<?php

namespace App\Http\Resources\Frontend\Avatar;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarsUIGeneratorResource extends JsonResource
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
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'smallDescription' => $language == 'ar' ? $this->smallDescriptionAr : $this->smallDescriptionEn,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
        ];;
    }
}
