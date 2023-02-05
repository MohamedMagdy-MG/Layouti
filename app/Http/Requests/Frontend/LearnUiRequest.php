<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class LearnUiRequest extends FormRequest
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
            'fullName' => 'required|min:2',
            'email' => 'required|email',
            'phone' => 'required',
            'package' => 'required'
        ];
    }

    public function Message()
    {
        request()->headers->has('language') ? $language = request()->headers->get('language') : $language = 'en';
        if($language == 'ar'){
            return [
                'fullName.required' => 'حقل الاسم مطلوب',
                'fullName.min' => 'يجب ألا يقل الاسم عن حرفين',
                'email.required' => 'حقل البريد الالكتروني مطلوب',
                'email.email' => 'يجب أن يكون البريد الإلكتروني عنوان بريد إلكتروني صالحًا',
                'phone.required' => 'حقل رقم الجوال مطلوب',
                'package.required' => 'يجب اختيار الباقة'
            ];
        }else{
            return [
                'fullName.required' => 'The Full Name field is required.',
                'fullName.min' => 'The Full Name must be at least 2 Character.',
                'email.required' => 'The Email field is required.',
                'email.email' => 'The Email must be a valid email address.',
                'phone.required' => 'The Phone Number field is required.',
                'package.required' => 'The ؛ackage field is required.'
            ];
        }
    }
}
