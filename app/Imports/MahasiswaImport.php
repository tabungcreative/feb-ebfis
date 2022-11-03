<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;

class MahasiswaImport implements ToCollection, WithStartRow
{

    public function collection(Collection $collection)
    {
        foreach ($collection as $row) {

            if ($row[0] == null) {
                continue;
            } else {
                Mahasiswa::updateOrCreate([
                    "nim" => $row[0]
                ], [
                    "nim" => $row[0],
                    'nama' => $row[1],
                    'prodi' => $row[2],
                    'jenis_kelamin' => $row[3],
                    'nomer_hp' => null,
                    'tempat_lahir' => null,
                    'tanggal_lahir' => null,
                    'nik' => null,
                    'tahun_masuk' => $row[4]
                ]);
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }
}
