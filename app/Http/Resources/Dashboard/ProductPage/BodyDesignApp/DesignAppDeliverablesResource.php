<?php

namespace App\Http\Resources\Dashboard\ProductPage\BodyDesignApp;

use App\Http\Resources\Dashboard\Configurations\DeliverableResource;
use App\Models\Configurations\Deliverable;
use Illuminate\Http\Resources\Json\JsonResource;

class DesignAppDeliverablesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if($this->deliverables != "null"){
            $deliverables = json_decode($this->deliverables);
            $deliverablesFind = Deliverable::whereIn('id',$deliverables)->get();
        }
        
        return [
            'id' => $this->id,
            'titleEn' => $this->titleEn,
            'titleAr' => $this->titleAr,
            'deliverables' => $this->deliverables != "null" ? DeliverableResource::collection($deliverablesFind):null,
            'colors' => $this->colors,
        ];
    }
}
