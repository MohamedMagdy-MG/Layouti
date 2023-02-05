<?php

namespace App\Http\Resources\Dashboard\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;

class TestimonialsCardsResource extends JsonResource
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
            'jobTitleEn'=>$this->jobTitleEn,
            'jobTitleAr'=>$this->jobTitleAr,
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'image' => $this->image != null ? env('APP_URL').$this->image : null
        ];
    }
}