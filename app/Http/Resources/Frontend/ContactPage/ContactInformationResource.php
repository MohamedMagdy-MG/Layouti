<?php

namespace App\Http\Resources\Frontend\ContactPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactInformationResource extends JsonResource
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
            'title' => $language == 'ar' ? $this->titleAr : $this->titleEn,
            'description' =>$language == 'ar' ? $this->descriptionAr : $this->descriptionEn,
            'informationTitle' =>$language == 'ar' ? $this->informationTitleAr : $this->informationTitleEn,
            'Address' =>$language == 'ar' ? $this->AddressAr : $this->AddressEn,
            'mobileCards' => ContactInformationMobileCardResource::collection($this->MobileCards),
            'emailCards' => ContactInformationEmailCardResource::collection($this->EmailCards),
            'whatsAppCards' => ContactInformationWhatsAppCardResource::collection($this->WhatsAppCards),
            'countryCards' => ContactInformationCountryCardResource::collection($this->CountryCards)
        ];

    }
}
