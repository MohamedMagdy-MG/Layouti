<?php

namespace App\Http\Resources\Dashboard\ServicesPage;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnAboutLayoutiResource extends JsonResource
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
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'downImageDescriptionEn' =>$this->downImageDescriptionEn,
            'downImageDescriptionAr' =>$this->downImageDescriptionAr,
            'topImage' => $this->topImage != null ? env('APP_URL').$this->topImage : null,
            'downImage' => $this->downImage != null ? env('APP_URL').$this->downImage : null
        ];
    }
}
