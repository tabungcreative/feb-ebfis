<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;

class MahasiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Mahasiswa([
            'nim' => $row[0],
            'nama' => $row[1],
            'prodi' => $row[2],
            'jenis_kelamin' => $row[3],
            'nomer_hp' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => $row[6],
            'nik' => $row[7],
        ]);
    }
}
