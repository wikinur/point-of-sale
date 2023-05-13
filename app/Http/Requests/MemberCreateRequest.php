<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberCreateRequest extends FormRequest
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
            'member_name' => 'required',
            'telpon' => 'max:14',
        ];
    }

    public function messages()
    {
        return [
            'member_name.required' => 'Nama Produk  Wajib Diisi',
            'telpon.max' => 'Maksimal :max Karakter',
        ];
    }
}
