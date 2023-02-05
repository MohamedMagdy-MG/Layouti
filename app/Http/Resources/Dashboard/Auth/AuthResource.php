<?php

namespace App\Http\Resources\Dashboard\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthResource extends JsonResource
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
            'UID'=> base64_encode($this->id),
            'UDeveloper' => base64_encode('Layouti'),
            'name' => $this->name,
            'email' => $this->email,
            'role' => (float)$this->role,
            'image' => $this->image != null ? env('APP_URL').$this->image : env('APP_URL').'media/Static/user.png',
            'accessToken' => $this->createToken('MyToken')->plainTextToken
        ];
    }
}
