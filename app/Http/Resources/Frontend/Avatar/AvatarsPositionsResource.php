<?php

namespace App\Http\Resources\Frontend\Avatar;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarsPositionsResource extends JsonResource
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
            'position' => $language == 'ar' ? $this->positionAr : $this->positionEn,
        ];
    }
}
