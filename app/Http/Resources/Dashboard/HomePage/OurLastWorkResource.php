<?php

namespace App\Http\Resources\Dashboard\HomePage;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Dashboard\ServicesPage\ProjectsResource;
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
        $lastwork = [];
        $dbLastWorks = json_decode($this->lastwork);
        foreach ($dbLastWorks as $dbLastWork) {
            array_push($lastwork,new ProjectsResource(ProductGeneralInformation::where('id',$dbLastWork)->first()));
        }
        return [
            'id' => $this->id,
            'titleEn' =>$this->titleEn,
            'titleAr' =>$this->titleAr,
            'descriptionEn' =>$this->descriptionEn,
            'descriptionAr' =>$this->descriptionAr,
            'lastwork' => $lastwork
            // 'lastwork' => ProjectsResource::collection(ProductGeneralInformation::whereIn('id',json_decode($this->lastwork))->get()),

        ];
    }
}
