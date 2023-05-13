<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'product_name' => 'required',
            'purchase_price' => 'required',
            'selling_price' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'product_name.required' => 'Nama Produk  Wajib Diisi',
            'purchase_price.required' => 'Harga Beli Produk  Wajib Diisi',
            'selling_price.required' => 'Harga Jual Produk  Wajib Diisi',
        ];
    }
}
