<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
                'title_ar' => 'required|string|min:3|max:128',
                'title_en' => 'required|string|min:3|max:128',
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
            'title_ar.required' => 'العنوان بالعربي مطلوب',
            'title_ar.string' => 'العنوان بالعربي يجب ان يكون نص',
            'title_ar.min' => 'العنوان بالعربي يجب ان لا يقل عن 3 احرف',
            'title_ar.max' => 'العنوان بالعربي يجب ان لا يزيد عن 128 حرف',
            'title_en.required' => 'العنوان بالانجليزي مطلوب',
            'title_en.string' => 'العنوان بالانجليزي يجب ان يكون نص',
            'title_en.min' => 'العنوان بالانجليزي يجب ان لا يقل عن 3 احرف',
            'title_en.max' => 'العنوان بالانجليزي يجب ان لا يزيد عن 128 حرف',
        ];
    }

}
