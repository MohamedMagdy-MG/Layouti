<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use App\Http\Resources\Dashboard\Configurations\CountriesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CvDesignExperiencesResource extends JsonResource
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
            'positionTitleEn' => $this->positionTitleEn,
            'positionTitleAr' => $this->positionTitleAr,
            'positionType' => $this->positionType,
            'companyNameEn' => $this->companyNameEn,
            'companyNameAr' => $this->companyNameAr,
            'companyCountry' => new CountriesResource($this->Country),
            'workDate' => $this->workDate,
            'startWorkDate' => $this->startWorkDate,
            'endWorkDate' => $this->endWorkDate,
            'cards' =>  CvDesignExperiencesRoleResource::collection($this->Cards)
        ];
    }
}
