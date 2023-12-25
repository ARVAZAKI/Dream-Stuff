<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addStuffRequest extends FormRequest
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
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
        ];
    }
    public function messages(){
        return [
            'nama_barang.required' => 'nama barang harus diisi...',
            'harga.required' => 'harga harus diisi...',
            'harga.numeric' => 'harga harus berisi angka...'
        ];
    }
}
