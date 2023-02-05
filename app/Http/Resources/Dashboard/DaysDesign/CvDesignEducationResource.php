<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class CvDesignEducationResource extends JsonResource
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
            'majorEn' => $this->majorEn,
            'majorAr' => $this->majorAr,
            'universityEn' => $this->universityEn,
            'universityAr' => $this->universityAr,
            'startDate' => $this->startDate,
            'endDate' => $this->endDate,
        ];
    }
}
