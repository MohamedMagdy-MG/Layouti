<?php

namespace App\Http\Resources\Frontend\EToy\Home;

use Illuminate\Http\Resources\Json\JsonResource;

class HomePageSeoResource extends JsonResource
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
            'focusKeypharseEn' => $this->focusKeypharseEn,
            'focusKeypharseAr' => $this->focusKeypharseAr,
            'seoTitleEn' => $this->seoTitleEn,
            'seoTitleAr' => $this->seoTitleAr,
            'slugEn' => $this->slugEn,
            'slugAr' => $this->slugAr,
            'descriptionEn' => $this->descriptionEn,
            'descriptionAr' => $this->descriptionAr,
            'facebookImage' => $this->facebookImage != null ? env('APP_URL').$this->facebookImage : null,
            'facebookTitleEn' => $this->facebookTitleEn,
            'facebookTitleAr' => $this->facebookTitleAr,
            'facebookDescriptionEn' => $this->facebookDescriptionEn,
            'facebookDescriptionAr' => $this->facebookDescriptionAr,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
