<?php

namespace App\Http\Resources\Dashboard\AboutPage;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutTeamCardResource extends JsonResource
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
            'nameEn' =>$this->nameEn,
            'nameAr' =>$this->nameAr,
            'jobTitleEn' =>$this->jobTitleEn,
            'jobTitleAr' =>$this->jobTitleAr,
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}
