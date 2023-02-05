<?php

namespace App\Http\Resources\Dashboard\AboutPage;

use Illuminate\Http\Resources\Json\JsonResource;

class AboutLearnAboutLayoutiResource extends JsonResource
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
            'leftImage' => $this->leftImage != null ? env('APP_URL').$this->leftImage : null,
            'rightImage' => $this->rightImage != null ? env('APP_URL').$this->rightImage : null,
            'otherDescriptionEn' =>$this->otherDescriptionEn,
            'otherDescriptionAr' =>$this->otherDescriptionAr,
            'otherLeftImage' => $this->otherLeftImage != null ? env('APP_URL').$this->otherLeftImage : null,
            'otherRightImage' => $this->otherRightImage != null ? env('APP_URL').$this->otherRightImage : null
        ];
    }
}
