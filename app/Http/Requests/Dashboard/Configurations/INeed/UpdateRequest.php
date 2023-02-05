<?php

namespace App\Http\Requests\Dashboard\Configurations\INeed;

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
            'titleEn' => 'nullable|string',
            'titleAr' => 'nullable|string'
        ];
    }
}
