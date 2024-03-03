<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePasswordRequest extends FormRequest
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
        return [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];
    }

    //    public function messages()
    //    {
    //        return [
    //                'old_password.required' => 'يجب ادخال كلمة المرور القديمة',
    //                'password.required' => 'يجب ادخال كلمة المرور الجديدة',
    //                'confirm_password.required' => 'يجب ادخال تأكيد كلمة المرور الجديدة',
    //                'confirm_password.same' => 'كلمة المرور الجديدة غير متطابقة'
    //            ];
    //    }
}
