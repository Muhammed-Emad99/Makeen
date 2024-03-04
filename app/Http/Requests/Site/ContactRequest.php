<?php

namespace App\Http\Requests\Site;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
            [
                'first_name' => 'required|string|min:3|max:128',
                'last_name' => 'required|string|min:3|max:128',
                'phone' => 'required|string|min:3|max:128',
                'email' => 'required|email',
                'messages' => 'required|string|min:3|max:500',
            ];

    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'first_name.required' => 'الاسم الأول مطلوب',
            'first_name.string' => 'الاسم الأول يجب ان يكون نص',
            'first_name.min' => 'الاسم الأول يجب ان يكون على الاقل 3 احرف',
            'first_name.max' => 'الاسم الأول يجب ان لا يتجاوز 128 حرف',
            'last_name.required' => 'الاسم الأخير مطلوب',
            'last_name.string' => 'الاسم الأخير يجب ان يكون نص',
            'last_name.min' => 'الاسم الأخير يجب ان يكون على الاقل 3 احرف',
            'last_name.max' => 'الاسم الأخير يجب ان لا يتجاوز 128 حرف',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.string' => 'رقم الهاتف يجب ان يكون نص',
            'phone.min' => 'رقم الهاتف يجب ان يكون على الاقل 3 احرف',
            'phone.max' => 'رقم الهاتف يجب ان لا يتجاوز 128 حرف',
            'email.required' => 'البريد الالكتروني مطلوب',
            'email.email' => 'البريد الالكتروني يجب ان يكون بريد الكتروني صحيح',
            'messages.required' => 'الرسالة مطلوبة',
            'messages.string' => 'الرسالة يجب ان تكون نص',
            'messages.min' => 'الرسالة يجب ان تكون على الاقل 3 احرف',
            'messages.max' => 'الرسالة يجب ان لا تتجاوز 500 حرف',
        ];
    }

}
