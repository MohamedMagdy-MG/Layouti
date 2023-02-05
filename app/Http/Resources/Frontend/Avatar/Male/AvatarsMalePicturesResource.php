<?php

namespace App\Http\Resources\Frontend\Avatar\Male;

use Illuminate\Http\Resources\Json\JsonResource;

class AvatarsMalePicturesResource extends JsonResource
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
            'avatar' => $this->avatar != null ? env('APP_URL').$this->avatar : null,
            'gender' => $this->gender
        ];
    }
}
