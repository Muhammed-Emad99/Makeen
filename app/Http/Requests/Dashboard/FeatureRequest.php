<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class FeatureRequest extends FormRequest
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
                return
                    [
                        'description_ar' => 'required|string',
                        'description_en' => 'required|string',
                        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

                    ];
                break;
            case 'PUT':
            case 'PATCH':
                return
                    [
                        'description_ar' => 'required|string',
                        'description_en' => 'required|string',
                        'icon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'description_ar.required' => 'الوصف بالعربي مطلوب',
            'description_ar.string' => 'الوصف بالعربي يجب ان يكون نص',
            'description_en.required' => 'الوصف بالانجليزي مطلوب',
            'description_en.string' => 'الوصف بالانجليزي يجب ان يكون نص',
            'icon.required' => 'الايقونه مطلوبة',
            'icon.image' => 'الايقونه يجب ان تكون صوره',
            'icon.mimes' => 'الايقونه يجب ان تكون ملف من النوع: jpeg, png, jpg, gif, svg',
            'icon.max' => 'الايقونه قد لا تكون اكبر من 2048 كيلوبايت',
        ];
    }

}
