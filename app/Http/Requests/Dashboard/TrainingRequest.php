<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
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
        $method = $this->method();
        switch ($method) {
            case 'POST':
                return [
                    'name_ar' => 'required|string|min:3|max:128',
                    'name_en' => 'required|string|min:3|max:128',
                    'description_ar' => 'required|string|min:3',
                    'description_en' => 'required|string|min:3',
                    'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                break;
            case 'PUT':
            case 'PATCH':
                return [
                    'name_ar' => 'required|string|min:3|max:128',
                    'name_en' => 'required|string|min:3|max:128',
                    'description_ar' => 'required|string|min:3',
                    'description_en' => 'required|string|min:3',
                    'icon' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ];
                break;
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name_ar.required' => 'العنوان بالعربي مطلوب',
            'name_ar.string' => 'العنوان بالعربي يجب ان يكون نص',
            'name_ar.min' => 'العنوان بالعربي يجب ان لا يقل عن 3 احرف',
            'name_ar.max' => 'العنوان بالعربي يجب ان لا يزيد عن 128 حرف',
            'name_en.required' => 'العنوان بالانجليزي مطلوب',
            'name_en.string' => 'العنوان بالانجليزي يجب ان يكون نص',
            'name_en.min' => 'العنوان بالانجليزي يجب ان لا يقل عن 3 احرف',
            'name_en.max' => 'العنوان بالانجليزي يجب ان لا يزيد عن 128 حرف',
            'description_ar.required' => 'الوصف بالعربي مطلوب',
            'description_ar.string' => 'الوصف بالعربي يجب ان يكون نص',
            'description_ar.min' => 'الوصف بالعربي يجب ان لا يقل عن 3 احرف',
            'description_en.required' => 'الوصف بالانجليزي مطلوب',
            'description_en.string' => 'الوصف بالانجليزي يجب ان يكون نص',
            'description_en.min' => 'الوصف بالانجليزي يجب ان لا يقل عن 3 احرف',
            'icon.required' => 'الايقونة مطلوبة',
            'icon.image' => 'الايقونة يجب ان تكون صورة',
            'icon.mimes' => 'الايقونة يجب ان تكون من الانواع التالية: jpeg,png,jpg,gif,svg',
            'icon.max' => 'الايقونة يجب ان لا تتعدى 2048 كيلو بايت',
        ];
    }
}
