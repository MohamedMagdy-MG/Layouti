<?php

namespace App\Http\Resources\Dashboard\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;

class ProcessDesignSkillsCardsResource extends JsonResource
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
            'titleEn' =>$this->titleEn,
            'titleAr' =>$this->titleAr,
            'ProcessPointsEn' =>$this->ProcessPointsEn != null ? json_decode($this->ProcessPointsEn): json_decode('[]'),
            'ProcessPointsAr' =>$this->ProcessPointsAr != null ? json_decode($this->ProcessPointsAr): json_decode('[]'),
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}
