<?php

namespace App\Http\Resources\Dashboard\Configurations;

use Illuminate\Http\Resources\Json\JsonResource;

class CountriesResource extends JsonResource
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
            'code' => $this->code,
            'nameAr' => $this->nameAr,
            'nameEn' => $this->nameEn,
            'status' => $this->status,
            'currency' => $this->currency,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
