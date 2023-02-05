<?php

namespace App\Http\Resources\Frontend\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignProjectSEOResource extends JsonResource
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
            'focusKeypharse' => $language == 'ar' ? $this->focusKeypharseAr: $this->focusKeypharseEn,
            'seoTitle' => $language == 'ar' ? $this->seoTitleAr : $this->seoTitleEn,
            'slug' => $language == 'ar' ? $this->slugAr: $this->slugEn,
            'description' => $language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'facebookImage' => $this->image != null ? env('APP_URL').$this->image : null,
            'facebookTitle' => $language == 'ar' ? $this->facebookTitleAr : $this->facebookTitleEn,
            'facebookDescription' => $language == 'ar' ? $this->facebookDescriptionAr : $this->facebookDescriptionEn,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
       
    }
}
