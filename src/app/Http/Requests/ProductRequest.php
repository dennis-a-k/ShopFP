<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'article' => ['required', 'string', 'unique:products,article', 'max:8'],
            'title' => ['required', 'string', 'max:90'],
            'category_id' => ['required', 'string'],
            'image_id' => ['nullable', 'string'],
            'description' => ['nullable', 'regex:/<(p|br|ul|li|div)[^>]*>(.*?)<\/\1>/s'],
        ];
    }
}
