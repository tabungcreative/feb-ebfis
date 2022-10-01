<?php

namespace App\Services;

use App\Http\Requests\MahasiswaAddRequest;
use App\Http\Requests\MahasiswaUpdateRequest;
use App\Models\Mahasiswa;
use Illuminate\Pagination\LengthAwarePaginator;

interface MahasiswaService{
    function add(MahasiswaAddRequest $request) : Mahasiswa;
    function update(MahasiswaUpdateRequest $request, int $id) : Mahasiswa;
    function delete(int $id): void;
    function list(string $key, int $size) : LengthAwarePaginator;
}

?>