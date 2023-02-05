<?php

namespace App\Http\Resources\Dashboard\ContactPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactWeFiredUpInnovatedResource extends JsonResource
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
        ];
    }
}
