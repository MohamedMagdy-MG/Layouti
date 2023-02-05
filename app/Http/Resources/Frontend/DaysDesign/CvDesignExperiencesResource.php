<?php

namespace App\Http\Resources\Frontend\DaysDesign;

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
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';

        return [
            'positionTitle' => $language == "ar" ? $this->positionTitleAr : $this->positionTitleEn,
            'positionType' => $this->positionType,
            'companyName' => $language == "ar" ? $this->companyNameAr : $this->companyNameEn,
            'companyCountry' => new CountriesResource($this->Country),
            'workDate' => $this->workDate,
            'startWorkDate' => $this->startWorkDate,
            'endWorkDate' => $this->endWorkDate,
            'cards' =>  CvDesignExperiencesRoleResource::collection($this->Cards)
        ];
    }
}
