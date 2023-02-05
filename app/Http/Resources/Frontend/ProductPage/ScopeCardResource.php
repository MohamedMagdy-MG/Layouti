<?php

namespace App\Http\Resources\Frontend\ProductPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ScopeCardResource extends JsonResource
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
            'title' => $language == 'ar' ? $this->titleAr: $this->titleEn,
            'description' => $language == 'ar' ? $this->descriptionAr: $this->descriptionEn,
            'icon' =>$this->icon == null ? null : env('APP_URL').$this->icon
        ];
    }
}
