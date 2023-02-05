<?php

namespace App\Http\Resources\Frontend\EToy\EToyGlobal;

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
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';

        return [
            'id' => $this->id,
            'question' => $language == 'ar' ? $this->questionAr : $this->questionEn ,
            'answer' => $language == 'ar' ? $this->answerAr : $this->answerEn ,

        ];
    }
}
