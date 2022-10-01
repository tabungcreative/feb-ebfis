<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unduhan extends Model
{
    use HasFactory;

    protected $table = 'unduhan';

    protected $fillable = [
        'nama_file', 'gambar_path', 'gambar_url'
    ];
}
