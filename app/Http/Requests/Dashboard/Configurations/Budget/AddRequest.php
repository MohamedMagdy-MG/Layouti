<?php

namespace App\Http\Requests\Dashboard\Configurations\Budget;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
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
            'budgetEn' => 'required|string',
            'budgetAr' => 'required|string'
        ];
    }
}
