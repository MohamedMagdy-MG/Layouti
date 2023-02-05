<?php

namespace App\Http\Resources\Frontend\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class CvDesignInterestsResource extends JsonResource
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
            'interest' => $language == "ar" ? $this->interestAr : $this->interestEn,
        ];
    }
}
