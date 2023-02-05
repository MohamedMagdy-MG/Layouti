<?php

namespace App\Http\Resources\Frontend\ContactPage;

use Illuminate\Http\Resources\Json\JsonResource;



class CategoryFaqsResource extends JsonResource
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
            'name' => $language == 'ar' ? $this->nameAr: $this->nameEn,
            'faqsCards' => ContactFAQsCardResource::collection($this->FaqsCards)
        ];

    }
}
