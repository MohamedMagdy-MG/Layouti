<?php

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

class SayHelloResource extends JsonResource
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
            'phone' => $this->phone,
            'message' => $this->message,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
