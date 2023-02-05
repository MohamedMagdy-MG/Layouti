<?php

namespace App\Http\Resources\Frontend\ProductPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductOurClientsResource extends JsonResource
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
            'userName' => $language == 'ar' ? $this->userNameAr: $this->userNameEn,
            'position' => $language == 'ar' ? $this->positionAr: $this->positionEn,
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
        ];

    }
}
