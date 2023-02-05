<?php

namespace App\Http\Requests\Dashboard\Configurations\Admins;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required',
            'name' => 'nullable|string',
            'email' => 'nullable|email|unique:users',
            'password' => 'nullable|min:8',
            'image' => 'nullable|image'
        ];
    }
}
