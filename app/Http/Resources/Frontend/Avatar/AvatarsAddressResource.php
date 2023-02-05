<?php

namespace App\Http\Resources\Frontend\Avatar;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarsAddressResource extends JsonResource
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
            'address' => $language == 'ar' ? $this->addressAr : $this->addressEn,
        ];
    }
}
