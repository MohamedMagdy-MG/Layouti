<?php

namespace App\Http\Resources\Dashboard\LearnUI;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnUIWhatOfferResource extends JsonResource
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
            'subTitleEn' => $this->subTitleEn,
            'subTitleAr' => $this->subTitleAr,
            'points' => LearnUIWhatOfferPointsResource::collection($this->Points)
        ];
    }
}
