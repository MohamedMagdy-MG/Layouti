<?php

namespace App\Http\Resources\Frontend\DaysDesign;

use App\Models\DaysDesign\DesignProjectDownloads;
use App\Models\DaysDesign\DesignProjectLikes;
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
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        $checkIP = DesignProjectLikes::where('ip',request()->ip())->where('project',$this->id)->first();
        $checkIP != null ? $ip = true : $ip = false;

        $checkDownloadIP = DesignProjectDownloads::where('ip',request()->ip())->where('project',$this->id)->first();
        $checkDownloadIP != null ? $downloadIP = true : $downloadIP = false;
        
        return [
            'id' => $this->id,
            'image' => $this->image != null ? env('APP_URL').$this->image : null,
            'coverImage' => DesignProjectCoverImagesResource::collection($this->CoverImages),
            'name' => $language == "ar" ? $this->nameAr : $this->nameEn,
            'likes' => count($this->Likes),
            'viwers' => count($this->Viwers),
            'downloads' => count($this->Downloads),
            'checkDownloads' => $downloadIP,
            'clicks' => $this->Clicks->count ?? 0,
            'ip' => $ip,
            'createdBy' => $language == "ar" ? $this->ceatedByAr : $this->ceatedByEn,
            'availabilityPrograms' => $language == "ar" ? $this->availabilityProgramsAr : $this->availabilityProgramsEn,
            'smallDescription' => $language == "ar" ? $this->smallDescriptionAr : $this->smallDescriptionEn,
            'date' => date('l, d M Y - h:i A', strtotime($this->date)),
            'state' => $this->state,
            'price' => $this->price,
            'link' => $this->link,
            'category' => new DesignCategoryResource($this->Category),
            'informationEn' => $this->informationEn,
            'informationAr' => $this->informationAr,
            'Informations' => DesignProjectInformationsResource::collection($this->Informations),
            'Images' => DesignProjectImagesResource::collection($this->Images),
            'SEO' => new DesignProjectSEOResource($this->SEO)
        ];
    }
}
