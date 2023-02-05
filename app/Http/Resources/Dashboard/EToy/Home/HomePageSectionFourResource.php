<?php

namespace App\Http\Resources\Dashboard\EToy\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageSectionFourResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'qouteEn' => $this->qouteEn ,
            'qouteAr' => $this->qouteAr ,
            'nameEn' => $this->nameEn ,
            'nameAr' => $this->nameAr ,
            'jopTitleEn' => $this->jopTitleEn ,
            'jopTitleAr' => $this->jopTitleAr ,
        ];
    }
}
