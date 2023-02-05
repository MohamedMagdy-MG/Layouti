<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class RequestResourceRequest extends FormRequest
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
            'title' => 'required|min:8',
            'link' => 'required',
        ];
    }

    public function Message()
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        if($language == 'ar'){
            return [
                'title.required' => 'حقل اللنص مطلوب',
                'title.min' => 'يجب ألا يقل اللنص عن 8 احرف',
                'link.required' => 'حقل العنوان الالكتروني مطلوب',
            ];
        }else{
            return [
                'title.required' => 'The Title field is required.',
                'title.min' => 'The Title must be at least 8 Characters.',
                'link.required' => 'The link field is required.',
            ];
        }
    }
}
