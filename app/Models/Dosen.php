<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';

    protected $fillable = ['kode_dosen', 'nidn', 'nama', 'prodi', 'jenis_kelamin', 'nomer_hp', 'tempat_lahir', 'tanggal_lahir', 'nik'];
}
