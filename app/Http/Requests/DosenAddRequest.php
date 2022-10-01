<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DosenAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'kode_dosen' => 'required|unique:dosen,kode_dosen',
            'nidn' => 'unique:dosen,nidn|numeric',
            'nama' => 'required',
            'prodi' => 'required',
            'jenis_kelamin' => 'required',
            'nomer_hp' => 'required|numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required|numeric',
        ];
    }
}
