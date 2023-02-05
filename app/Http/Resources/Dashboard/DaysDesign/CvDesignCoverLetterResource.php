<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class CvDesignCoverLetterResource extends JsonResource
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
            'letterEn' => $this->letterEn,
            'letterAr' => $this->letterAr,
        ];
    }
}
