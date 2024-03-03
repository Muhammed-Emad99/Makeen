<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
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
                        'link' => 'nullable|url',
                        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ];
                break;
            case 'PUT':
            case 'PATCH':
                return
                    [
                        'link' => 'nullable|url',
                        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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
            'link.url' => 'الرابط يجب ان يكون رابط صحيح',
            'image.required' => 'الصوره مطلوبة',
            'image.image' => 'الصوره يجب ان تكون صوره',
            'image.mimes' => 'الصوره يجب ان تكون ملف من النوع: jpeg, png, jpg, gif, svg',
            'image.max' => 'الصوره قد لا تكون اكبر من 2048 كيلوبايت',
        ];
    }

}
