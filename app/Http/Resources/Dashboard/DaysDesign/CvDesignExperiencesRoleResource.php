<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class CvDesignExperiencesRoleResource extends JsonResource
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
            'pointEn' => $this->pointEn,
            'pointAr' => $this->pointAr,
            'points' =>  CvDesignExperiencesRolePointsResource::collection($this->Cards)
        ];
    }
}
