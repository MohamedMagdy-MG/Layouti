<?php

namespace App\Http\Resources\Dashboard\Avatars;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarsFemalePicturesResource extends JsonResource
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
            'avatar' => $this->avatar != null ? env('APP_URL').$this->avatar : null,
            'gender' => $this->gender,
            'createdOn' => date('l, d M Y - h:i A', strtotime($this->created_at))
        ];
    }
}
