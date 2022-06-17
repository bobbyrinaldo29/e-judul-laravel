<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ListJudulRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'namaJudul'     => 'unique:tbl_list_juduls',
            'thn_ajaran_id' => 'required',
            'penulis' => 'required',
            'metode' => 'required',
            'abstrak' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'unique'        => ':attribute sudah terdaftar.',
            'min'           => ':attribute minimal 3 karakter.',
            'required'      => ':attribute wajib diisi.',
            'numeric'       => ':attribute hanya menggunakan nomor',
        ];
    }
}
