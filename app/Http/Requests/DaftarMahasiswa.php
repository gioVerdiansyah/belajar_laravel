<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DaftarMahasiswa extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; //true agar bisa dijalankan
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // Method ini untuk menulis syarat validasi
        return [
            'nim' => 'required|size:8',
            'nama' => 'required|min:5|max:50',
            'email' => 'required|email',
            'jenis_kelamin' => 'required|in:L,P',
            'jurusan' => 'required',
            'alamat' => ''
        ];
    }
}