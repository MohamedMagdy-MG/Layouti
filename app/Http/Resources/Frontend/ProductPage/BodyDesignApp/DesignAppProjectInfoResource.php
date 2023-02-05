<?php

namespace App\Http\Resources\Frontend\ProductPage\BodyDesignApp;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignAppProjectInfoResource extends JsonResource
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
            'label' => $language == 'ar' ? $this->labelAr: $this->labelEn,
            'text' => $language == 'ar' ? $this->textAr: $this->textEn,
        ];
        
    }
}
