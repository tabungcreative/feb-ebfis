<?php

namespace App\Services;



use App\Http\Requests\UnduhanAddRequest;
use App\Http\Requests\UnduhanUpdateRequest;
use App\Models\Unduhan;
use Illuminate\Pagination\LengthAwarePaginator;


interface UnduhanService
{
    function add(UnduhanAddRequest $request): Unduhan;
    function list(string $key, int $size): LengthAwarePaginator;
    function update(UnduhanUpdateRequest $request, int $id): Unduhan;
    function delete(int $id): void;
    function addFile($file, int $id): Unduhan;
    function updateFile($file, int $id): Unduhan;
    function deleteFile(int $id): void;
}
