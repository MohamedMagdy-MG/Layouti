<?php

namespace App\Http\Resources\Dashboard\Configurations;

use Illuminate\Http\Resources\Json\JsonResource;

class DashboardSettingResource extends JsonResource
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
            'icon' => $this->icon != null ? env('APP_URL').$this->icon : null,
            'favIcon' => $this->favIcon != null ? env('APP_URL').$this->favIcon : null,
            'buttonColor' => $this->buttonColor,
            'textSideBarColor' => $this->textSideBarColor,
            'sideBarColor' => $this->sideBarColor,
        ];
    }
}
