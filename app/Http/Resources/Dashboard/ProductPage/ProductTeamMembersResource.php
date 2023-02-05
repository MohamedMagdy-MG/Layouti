<?php

namespace App\Http\Resources\Dashboard\ProductPage;

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
        return [
            'id' => $this->id,
            'labelEn' => $this->labelEn,
            'labelAr' => $this->labelAr,
            'memberNameEn' => $this->memberNameEn,
            'memberNameAr' => $this->memberNameAr,
        ];
    }
}
