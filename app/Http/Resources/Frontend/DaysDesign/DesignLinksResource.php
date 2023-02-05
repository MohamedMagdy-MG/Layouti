<?php

namespace App\Http\Resources\Frontend\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignLinksResource extends JsonResource
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
            'title' => $language == "ar" ? $this->titleAr : $this->titleEn,
            'description' => $language == "ar" ? $this->descriptionAr : $this->descriptionEn,
            'topLeftImage' => $this->topLeftImage != null ? env('APP_URL').$this->topLeftImage : null,
            'topRightImage' => $this->topRightImage != null ? env('APP_URL').$this->topRightImage : null,
            'bottomLeftImage' => $this->bottomLeftImage != null ? env('APP_URL').$this->bottomLeftImage : null,
            'bottomRightImage' => $this->bottomRightImage != null ? env('APP_URL').$this->bottomRightImage : null,
            'linksTitle' => $language == "ar" ? $this->linksTitleAr : $this->linksTitleEn,
            'cards' => DesignLinksCardsResource::collection($this->Cards)

        ];
    }
}
