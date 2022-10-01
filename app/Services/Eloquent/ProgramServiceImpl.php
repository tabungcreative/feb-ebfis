<?php 

namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Helper\Media;
use App\Http\Requests\ProgramAddRequest;
use App\Http\Requests\ProgramUpdateRequest;
use App\Models\Program;
use App\Services\ProgramService;
use Illuminate\Pagination\LengthAwarePaginator;

class ProgramServiceImpl implements ProgramService{

    use Media;

    function add(ProgramAddRequest $request): Program
    {
        $namaProgram = $request->input('nama_program');
        $isi = $request->input('isi');
        try {

            $program = new Program([
                'nama_program' => $namaProgram,
                'isi' => $isi,
            ]);

            $program->save();

        }catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $program;
    }

    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $paginate = Program::where('nama_program', 'like', '%' . $key . '%')
            ->orWhere('isi', 'like', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($size);

        return $paginate;
    }

    function update(ProgramUpdateRequest $request, int $id): Program
    {
        $program = Program::find($id);
        $namaProgram = $request->input('nama_program');
        $isi = $request->input('isi');

        try {
            $program->nama_program = $namaProgram;
            $program->isi = $isi;
            $program->save();
        }catch (\Exception $exception) {
            throw new  InvariantException($exception->getMessage());
        }

        return $program;
    }

    function delete(int $id): void
    {
        $program = Program::find($id);
        try {
            if ($program->gambar_path != null) {
                unlink($program->gambar_path);
            }

            $program->delete();

        }catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }

    function addImage(int $id, $image): Program
    {
        $program = Program::find($id);

        try {
            if ($program->gambar_path != null) {
                unlink($program->gambar_path);
            }

            $dataFile = $this->uploads($image, 'program/gambar/');
            $filePath = public_path('storage/'. $dataFile['filePath']);
            $fileUrl = asset('storage/'. $dataFile['filePath']);

            $program->gambar_path = $filePath;
            $program->gambar_url = $fileUrl;
            $program->save();

        }catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $program;
    }

    function deleteImage(int $id): Program
    {
        $program = Program::find($id);

        try {
            if ($program->gambar_path != null) {
                unlink($program->gambar_path);
            }

            $program->gambar_url = null;
            $program->gambar_path = null;
            $program->save();
        }catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $program;
    }

    function updateImage(int $id, $image): Program
    {
        $program = Program::find($id);

        try {
            if ($program->gambar_path != null) {
                unlink($program->gambar_path);
            }

            $dataFile = $this->uploads($image, 'program/');
            $filePath = public_path('storage/'. $dataFile['filePath']);
            $fileUrl = asset('storage/'. $dataFile['filePath']);

            $program->gambar_path = $filePath;
            $program->gambar_url = $fileUrl;
            $program->save();

        }catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $program;
    }

}


?>