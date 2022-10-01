<?php 

namespace App\Services;

use App\Http\Requests\FasilitasAddRequest;
use App\Http\Requests\FasilitasUpdateRequest;
use App\Models\Fasilitas;
use Illuminate\Pagination\LengthAwarePaginator;

interface FasilitasService{
    function add(FasilitasAddRequest $request): Fasilitas;
    function list(string $key, int $size): LengthAwarePaginator;
    function update(FasilitasUpdateRequest $request, int $id): Fasilitas;
    function delete(int $id): void;
    function addImage(int $id, $image): Fasilitas;
    function deleteImage(int $id): Fasilitas;
    function updateImage(int $id, $image): Fasilitas;

}


?>
