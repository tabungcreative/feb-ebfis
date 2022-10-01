<?php 


namespace App\Services;

use App\Http\Requests\DosenAddRequest;
use App\Http\Requests\DosenUpdateRequest;
use App\Models\Dosen;
use Illuminate\Pagination\LengthAwarePaginator;

interface DosenService{
    function add(DosenAddRequest $request) : Dosen;
    function update(DosenUpdateRequest $request, int $id) : Dosen;
    function delete(int $id): void;
    function list(string $key = '', int $size = 10) : LengthAwarePaginator;
}
