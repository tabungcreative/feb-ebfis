<?php 

namespace App\Services;



use Illuminate\Database\Eloquent\Collection;
use App\Http\Requests\UnduhanAddRequest;
use App\Http\Requests\UnduhanUpdateRequest;
use App\Models\Unduhan;

interface UnduhanService{
    function add(UnduhanAddRequest $request): Unduhan;
    function list(string $key): Collection;
    function update(UnduhanUpdateRequest $request, int $id): Unduhan;
    function addFile($file, int $id): Unduhan;
    function updateFile($file, int $id): Unduhan;
    function deleteFile(int $id): void;
}


?>