<?php

namespace App\Http\Resources\Frontend\LearnUI;

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
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';

        return [
            'questions' => $language == 'ar' ? $this->questionsAr : $this->questionsEn,
            'answer' => $language == 'ar' ? $this->answerAr : $this->answerEn,
        ];
    }
}
