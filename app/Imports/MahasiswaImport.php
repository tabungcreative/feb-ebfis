<?php

namespace App\Imports;

use App\Models\Mahasiswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Date;

class MahasiswaImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // dd($row);
        return new Mahasiswa([
            'nim' => $row[0],
            'nama' => $row[1],
            'prodi' => $row[2],
            'jenis_kelamin' => $row[3],
            'nomer_hp' => $row[4],
            'tempat_lahir' => $row[5],
            'tanggal_lahir' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['6'])->format('Y-m-d'),
            'nik' => $row[7],
        ]);
    }
    public function startRow(): int
    {
        return 2;
    }
}
