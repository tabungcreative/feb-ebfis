<?php 

namespace App\Services;

use App\Http\Requests\ProgramAddRequest;
use App\Http\Requests\ProgramUpdateRequest;
use App\Models\Program;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProgramService{
    function add(ProgramAddRequest $request): Program;
    function list(string $key, int $size): LengthAwarePaginator;
    function update(ProgramUpdateRequest $request, int $id): Program;
    function delete(int $id): void;
    function addImage(int $id, $image): Program;
    function deleteImage(int $id): Program;
    function updateImage(int $id, $image): Program;
}


?>