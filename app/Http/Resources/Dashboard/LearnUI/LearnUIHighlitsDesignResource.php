<?php

namespace App\Http\Resources\Dashboard\LearnUI;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnUIHighlitsDesignResource extends JsonResource
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
            'subTitleEn' => $this->subTitleEn,
            'subTitleAr' => $this->subTitleAr,
            'highlits' => json_decode($this->highlits)
        ];
    }
}
