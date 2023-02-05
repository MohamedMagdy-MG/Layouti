<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignProjectInformationsResource extends JsonResource
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
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
