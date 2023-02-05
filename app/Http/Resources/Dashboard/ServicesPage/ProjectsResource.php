<?php

namespace App\Http\Resources\Dashboard\ServicesPage;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectsResource extends JsonResource
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
            'nameEn' => $this->ProjectInformation->nameEn,
            'nameAr' =>$this->ProjectInformation->nameAr
        ];
    }
}
