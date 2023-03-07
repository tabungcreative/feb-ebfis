<?php

namespace App\Services;

use App\Http\Requests\PengumumanAddRequest;
use App\Http\Requests\PengumumanUpdateRequest;
use App\Models\Pengumuman;
use Illuminate\Pagination\LengthAwarePaginator;

interface PengumumanService{
    function list(string $key, $size): LengthAwarePaginator;
    function show(int $id): Pengumuman;
    function add(PengumumanAddRequest $request): Pengumuman;
    function edit(PengumumanUpdateRequest $request, int $id): Pengumuman;
    function delete(int $id): void;
    function addFile(int $id, $file): Pengumuman;
    function editFile(int $id, $file): Pengumuman;
}
