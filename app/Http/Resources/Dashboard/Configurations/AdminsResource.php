<?php

namespace App\Http\Resources\Dashboard\Configurations;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminsResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'role' => (float)$this->role,
            'image' => $this->image != null ? env('APP_URL').$this->image : env('APP_URL').'media/Static/user.png',
            'canDelete' => $this->canDelete,
            'created_at' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
