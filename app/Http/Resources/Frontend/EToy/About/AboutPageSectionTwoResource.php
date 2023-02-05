<?php

namespace App\Http\Resources\Frontend\EToy\About;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutPageSectionTwoResource extends JsonResource
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
            'titleOne' => $language == 'ar' ? $this->titleOneAr : $this->titleOneEn ,
            'titleTwo' => $language == 'ar' ? $this->titleTwoAr : $this->titleTwoEn ,
            'cards' => AboutPageSectionTwoCardsResource::collection($this->Cards)
        ];
    }
}
