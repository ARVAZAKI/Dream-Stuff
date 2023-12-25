<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class registerRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'unique:users|required',
            'password' => 'required'
        ];
    }
    public function messages(){
        return [
            'name.required' => 'nama harus diisi...',
            'email.required' => 'email harus diisi...',
            'email.unique' => 'email sudah terdaftar...',
            'password.required' => 'password harus diisi...'
        ];
    }
}
