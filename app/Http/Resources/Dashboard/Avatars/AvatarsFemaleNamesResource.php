<?php

namespace App\Http\Resources\Dashboard\Avatars;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarsFemaleNamesResource extends JsonResource
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
            'fnameEn' => $this->fnameEn,
            'lnameEn' => $this->lnameEn,
            'fnameAr' => $this->fnameAr,
            'lnameAr' => $this->lnameAr,
            'gender' => $this->gender,
            'createdOn' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
