<?php

namespace App\Http\Resources\Dashboard;

use App\Http\Resources\Dashboard\Configurations\INeedResource;
use App\Models\Configurations\LayoutiBudget;
use App\Models\Configurations\LayoutiINeed;
use Illuminate\Http\Resources\Json\JsonResource;

class HireUsResource extends JsonResource
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
            'fullName'  => $this->fullName,
            'email' => $this->email,
            'need' => INeedResource::collection(LayoutiINeed::whereIn('id',json_decode($this->need))->get()),
            'details' => $this->details,
            'attachment' => $this->attachment != null ? env('APP_URL').$this->attachment : null,
            'budget' => LayoutiBudget::find($this->budget)->budgetEn,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
