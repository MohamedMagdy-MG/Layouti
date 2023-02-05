<?php

namespace App\Http\Resources\Frontend\HomePage;

use App\Http\Resources\Frontend\ProductPage\ProductGeneralInformationResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Frontend\WorkPage\ProjectsResource;
use App\Models\ProductPage\ProductGeneralInformation;


class OurLastWorkResource extends JsonResource
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
        $lastwork = [];
        $dbLastWorks = json_decode($this->lastwork);
        foreach ($dbLastWorks as $dbLastWork) {
            array_push($lastwork,new ProductGeneralInformationResource(ProductGeneralInformation::where('id',$dbLastWork)->first()));
        }
        return [
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'description' =>$language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'lastwork' => $lastwork,
            // 'lastwork' =>ProductGeneralInformationResource::collection(ProductGeneralInformation::whereIn('id',json_decode($this->lastwork))->get()),
            // 'lastwork' =>ProductGeneralInformationResource::collection(ProductGeneralInformation::whereIn('id',json_decode($this->lastwork))->latest()->get())
        ];
    }
}
