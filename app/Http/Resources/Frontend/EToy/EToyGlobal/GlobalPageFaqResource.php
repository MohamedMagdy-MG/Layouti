<?php

namespace App\Http\Resources\Frontend\EToy\EToyGlobal;

use Illuminate\Http\Resources\Json\JsonResource;

class GlobalPageFaqResource extends JsonResource
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
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn ,
            'cards' => GlobalPageFaqCardsResource::collection($this->Cards)

        ];
    }
}
