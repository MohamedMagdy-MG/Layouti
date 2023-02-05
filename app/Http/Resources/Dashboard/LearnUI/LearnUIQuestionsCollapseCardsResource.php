<?php

namespace App\Http\Resources\Dashboard\LearnUI;

use Illuminate\Http\Resources\Json\JsonResource;

class LearnUIQuestionsCollapseCardsResource extends JsonResource
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
            'questionsEn' => $this->questionsEn,
            'questionsAr' => $this->questionsAr,
            'answerEn' => $this->answerEn,
            'answerAr' => $this->answerAr
        ];
    }
}
