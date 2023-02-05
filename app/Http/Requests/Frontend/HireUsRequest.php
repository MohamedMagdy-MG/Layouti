<?php

namespace App\Http\Requests\Frontend;

use Illuminate\Foundation\Http\FormRequest;

class HireUsRequest extends FormRequest
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
            'need' => 'required|array',
            'details' => 'required',
            'attachment' => 'required|mimes:doc,docx,pdf',
            'budget' => 'required|integer',
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
                'need.required' => 'حقل الطلب مطلوب',
                'need.array' => 'حقل الطلب يجب ان يكون مصفوفة فقط',
                'details.required' => 'حقل التفاصيل مطلوب',
                'attachment.required' => 'حقل الملف مطلوب',
                'attachment.mimes' => 'حقل الملف يجب ان يكون pdf,doc,docx',
                'budget.required' => 'حقل التكلفة مطلوب',
                'budget.integer' => 'حقل التكلفة يجب ان يكون ارقام فقط',
            ];
        }else{
            return [
                'fullName.required' => 'The Full Name field is required.',
                'fullName.min' => 'The Full Name must be at least 2 Character.',
                'email.required' => 'The Email field is required.',
                'email.email' => 'The Email must be a valid email address.',
                'need.required' => 'The I Need field is required.',
                'need.array' => 'The I Need must be Array Only.',
                'details.required' => 'The Details field is required.',
                'attachment.required' => 'The Attachment field is required.',
                'attachment.mimes' => 'The Attachment must be a file of type: pdf,doc,docx',
                'budget.required' => 'The Budget field is required.',
                'budget.required' => 'The Budget must be Numbers Only.',
            ];
        }
    }
}
