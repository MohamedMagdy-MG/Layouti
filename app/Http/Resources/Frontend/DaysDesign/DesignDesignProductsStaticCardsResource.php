<?php

namespace App\Http\Resources\Frontend\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignDesignProductsStaticCardsResource extends JsonResource
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
            'logo' => $this->logo != null ? env('APP_URL').$this->logo : null,
            'slide' => $this->slide != null ? env('APP_URL').$this->slide : null,
            'title' => $language == "ar" ? $this->titleAr : $this->titleEn,
            'subTitle' => $language == "ar" ? $this->subTitleAr : $this->subTitleEn,
            'description' => $language == "ar" ? $this->descriptionAr : $this->descriptionEn,
            'reviewLink' =>$this->reviewLink,
            'downloadLink' =>$this->downloadLink,
            'cards' => DesignDesignProductsStaticCardsOfCardsResource::collection($this->Cards)

        ];
    }
}
