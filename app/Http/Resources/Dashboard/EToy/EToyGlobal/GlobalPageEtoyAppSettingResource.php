<?php

namespace App\Http\Resources\Dashboard\EToy\EToyGlobal;

use Illuminate\Http\Resources\Json\JsonResource;

class GlobalPageEtoyAppSettingResource extends JsonResource
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
            'favIcon' => $this->favIcon != null ? env('APP_URL').$this->favIcon : null,
            'lightLogo' => $this->lightLogo != null ? env('APP_URL').$this->lightLogo : null,
            'darkLogo' => $this->darkLogo != null ? env('APP_URL').$this->darkLogo : null,
        ];
    }
}
