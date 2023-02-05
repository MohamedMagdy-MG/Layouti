<?php

namespace App\Http\Resources\Dashboard\ContactPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactFAQsCardResource extends JsonResource
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
            'questionEn' =>$this->questionEn,
            'questionAr' =>$this->questionAr,
            'category' =>$this->category,
            'answerEn' =>$this->answerEn,
            'answerAr' =>$this->answerAr,
        ];
    }
}
