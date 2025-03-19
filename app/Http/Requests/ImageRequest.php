<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'image' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048'
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Please select a file to upload',
            'image.mimes' => 'Allowed file types: JPG, PNG, PDF',
            'image.max' => 'File size cannot exceed 2MB'
        ];
    }

    public function attributes(): array
    {
        return [
            'image' => 'Attachment'
        ];
    }
}
