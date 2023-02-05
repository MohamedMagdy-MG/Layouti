<?php

namespace App\Http\Resources\Dashboard\EToy\EToyGlobal;

use Illuminate\Http\Resources\Json\JsonResource;

class GlobalPageFaqCardsResource extends JsonResource
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
            'questionEn' => $this->questionEn ,
            'questionAr' => $this->questionAr ,
            'answerEn' => $this->answerEn ,
            'answerAr' => $this->answerAr ,

        ];
    }
}
