<?php

namespace App\Http\Resources\Dashboard\DaysDesign;

use Illuminate\Http\Resources\Json\JsonResource;

class DesignProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $this->Clicks != null ? $count = $this->Clicks->count : $count = 0;
        return [
            'id' => $this->id,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'coverImage' => DesignProjectCoverImagesResource::collection($this->CoverImages),
            'likes' => count($this->Likes),
            'viwers' => count($this->Viwers),
            'downloads' => count($this->Downloads),
            'clicks' => $count,
            'nameEn' => $this->nameEn,
            'nameAr' => $this->nameAr,
            'ceatedByEn' => $this->ceatedByEn,
            'ceatedByAr' => $this->ceatedByAr,
            'availabilityProgramsEn' => $this->availabilityProgramsEn,
            'availabilityProgramsAr' => $this->availabilityProgramsAr,
            'smallDescriptionEn' => $this->smallDescriptionEn,
            'smallDescriptionAr' => $this->smallDescriptionAr,
            'date' => date('l, d M Y - h:i A', strtotime($this->date)),
            'state' => $this->state,
            'price' => $this->price,
            'link' => $this->link,
            'category' => new DesignCategoryResource($this->Category),
            'informationEn' => $this->informationEn,
            'informationAr' => $this->informationAr,
            'Informations' => DesignProjectInformationsResource::collection($this->Informations),
            'Images' => DesignProjectImagesResource::collection($this->Images),
            'SEO' => new DesignProjectSEOResource($this->SEO),
            'createdOn' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
