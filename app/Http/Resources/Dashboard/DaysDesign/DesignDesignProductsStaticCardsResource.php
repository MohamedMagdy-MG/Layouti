<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignDesignProductsStaticCardsResource extends JsonResource
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
            'logo' => $this->logo != null ? env('APP_URL').$this->logo : null,
            'slide' => $this->slide != null ? env('APP_URL').$this->slide : null,
            'titleEn' =>$this->titleEn,
            'titleAr' =>$this->titleAr,
            'subTitleEn' =>$this->subTitleEn,
            'subTitleAr' =>$this->subTitleAr,
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'reviewLink' =>$this->reviewLink,
            'downloadLink' =>$this->downloadLink,
            'cards' => DesignDesignProductsStaticCardsOfCardsResource::collection($this->Cards)

        ];
    }
}
