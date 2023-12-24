<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'article' => ['required', 'string', Rule::unique('products', 'article')->ignore($this->id), 'max:8'],
            'title' => ['required', 'string', 'max:90'],
            'category_id' => ['required', 'string'],
            'description' => ['nullable', 'regex:/<(p|br|ul|li|div)[^>]*>(.*?)<\/\1>/s'],
            'imgs' => ['nullable', 'array'],
            'imgs.*' => [
                'nullable',
                'image',
                'mimes:jpeg,png,jpg,webp',
                'dimensions:max_width=1200,max_width=1200',
                'max:50000',
            ]
        ];
    }
}
