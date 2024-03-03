<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
                        'title_en' => 'required|min:3|max:100',
                        'title_ar' => 'required|min:3|max:100',
                        'content_en' => 'required|min:3|max:384',
                        'content_ar' => 'required|min:3|max:384',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                        'icon' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ];
                break;
            case 'PUT':
            case 'PATCH':
                return
                    [
                        'title_en' => 'required|min:3|max:100',
                        'title_ar' => 'required|min:3|max:100',
                        'content_en' => 'required|min:3|max:384',
                        'content_ar' => 'required|min:3|max:384',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'title_en.required' => 'العنوان مطلوب',
            'title_en.min' => 'العنوان يجب ان لا يقل عن 3 احرف',
            'title_en.max' => 'العنوان يجب ان لا يزيد عن 100 حرف',
            'title_ar.required' => 'العنوان مطلوب',
            'title_ar.min' => 'العنوان يجب ان لا يقل عن 3 احرف',
            'title_ar.max' => 'العنوان يجب ان لا يزيد عن 100 حرف',
            'content_en.required' => 'محتوي السليدر مطلوب',
            'content_en.min' => 'محتوي الاسليدر يجب ان لا يقل عن 3 احرف',
            'content_en.max' => 'محتوي الاسليدر يجب ان لا يزيد عن 384 حرف',
            'content_ar.required' => 'محتوي الاسليدر مطلوب',
            'content_ar.min' => 'محتوي الاسليدر يجب ان لا يقل عن 3 احرف',
            'content_ar.max' => 'محتوي الاسليدر يجب ان لا يزيد عن 384 حرف',
            'image.required' => 'الصوره مطلوبة',
            'image.image' => 'الصوره يجب ان تكون صوره',
            'image.mimes' => 'الصوره يجب ان تكون ملف من النوع: jpeg, png, jpg, gif, svg',
            'image.max' => 'الصوره قد لا تكون اكبر من 2048 كيلوبايت',
            'icon.required' => 'الايقونه مطلوبة',
            'icon.image' => 'الايقونه يجب ان تكون صوره',
            'icon.mimes' => 'الايقونه يجب ان تكون ملف من النوع: jpeg, png, jpg, gif, svg',
            'icon.max' => 'الايقونه قد لا تكون اكبر من 2048 كيلوبايت',
        ];
    }

}
