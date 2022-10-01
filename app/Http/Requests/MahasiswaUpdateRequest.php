<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MahasiswaUpdateRequest extends FormRequest
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
            'nama' => 'required',
            'prodi' => 'required',
            'jenis_kelamin' => 'required',
            'nomer_hp' => 'numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required|numeric',
        ];
    }
}
