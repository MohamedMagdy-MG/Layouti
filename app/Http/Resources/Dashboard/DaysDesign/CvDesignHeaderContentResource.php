<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class CvDesignHeaderContentResource extends JsonResource
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
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'topLeftImage' => $this->topLeftImage != null ? env('APP_URL').$this->topLeftImage : null,
            'topRightImage' => $this->topRightImage != null ? env('APP_URL').$this->topRightImage : null,
            'bottomLeftImage' => $this->bottomLeftImage != null ? env('APP_URL').$this->bottomLeftImage : null,
            'bottomRightImage' => $this->bottomRightImage != null ? env('APP_URL').$this->bottomRightImage : null,
        ];
    }
}
