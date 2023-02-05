<?php

namespace App\Http\Requests\Dashboard\Configurations\Scope;

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
            'scopes' => 'nullable|array',
            'scopes.*' => 'nullable',
            'scopes.*.titleEn' => 'nullable|string',
            'scopes.*.titleAr' => 'nullable|string',
            'scopes.*.cards' => 'nullable|array',
            'scopes.*.cards.*' => 'nullable',
            'scopes.*.cards.*.titleEn'=> 'nullable',
            'scopes.*.cards.*.titleAr'=> 'nullable',
            'scopes.*.cards.*.descriptionEn'=> 'nullable',
            'scopes.*.cards.*.descriptionAr'=> 'nullable',
            'scopes.*.cards.*.icon'=> 'nullable',
        ];
    }
}
