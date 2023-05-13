<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'category_name' => 'required | max:50 | unique:categories',
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Nama Kategori  Wajib Diisi',
            'category_name.max' => 'Nama Kategori maksimal :max karakter',
            'category_name.unique' => 'Nama Kategori Sudah Ada',
        ];
    }
}
