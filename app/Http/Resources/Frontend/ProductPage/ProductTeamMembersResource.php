<?php

namespace App\Http\Resources\Frontend\ProductPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductTeamMembersResource extends JsonResource
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
            'memberName' => $language == 'ar' ? $this->memberNameAr : $this->memberNameEn,
        ];

    }
}
