<?php


namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Helper\Media;
use App\Http\Requests\UnduhanAddRequest;
use App\Http\Requests\UnduhanUpdateRequest;
use App\Models\Unduhan;
use App\Services\UnduhanService;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class UnduhanServiceImpl implements UnduhanService
{
    use Media;

    function add(UnduhanAddRequest $request): Unduhan
    {

        $namaFile = $request->input('nama_file');
        try {
            DB::beginTransaction();
            $unduhan = new Unduhan([
                'nama_file' => $namaFile,
                'file_url' => null,
                'file_path' => null,
                'format' => null,
            ]);
            $unduhan->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new InvariantException($exception->getMessage());
        }

        return $unduhan;
    }

    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $paginate = Unduhan::where('nama_file', 'like', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($size);

        return $paginate;
    }

    // function list(string $key = ''): LengthAwarePaginator
    // {
    //     $collection = Unduhan::where('nama_file', 'like', '%' . $key . '%')
    //         ->orderBy('created_at', 'DESC')
    //         ->get();

    //     return $collection;
    // }

    function update(UnduhanUpdateRequest $request, int $id): Unduhan
    {
        $namaFile = $request->input('nama_file');

        $unduhan = Unduhan::find($id);

        try {
            $unduhan->nama_file = $namaFile;
            $unduhan->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception);
        }

        return $unduhan;
    }


    function delete(int $id): void
    {
        $unduhan = Unduhan::find($id);
        try {
            if ($unduhan->gambar_path != null) {
                unlink($unduhan->gambar_path);
            }
            $unduhan->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }

    function addFile($file, int $id): Unduhan
    {
        $unduhan = Unduhan::find($id);

        try {
            $dataFile = $this->uploads($file, 'unduhan/');

            $fileUrl = asset('storage/' . $dataFile['filePath']);
            $filePath = public_path('storage/' . $dataFile['filePath']);
            $fileFormat = $dataFile['fileType'];

            $unduhan->file_url = $fileUrl;
            $unduhan->file_path = $filePath;
            $unduhan->format = $fileFormat;
            $unduhan->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $unduhan;
    }

    function updateFile($file, int $id): Unduhan
    {
        $unduhan = Unduhan::find($id);

        try {
            if ($unduhan->file_path != null) {
                unlink($unduhan->file_path);
            }

            $dataFile = $this->uploads($file, 'unduhan/');
            $filePath = public_path('storage/' . $dataFile['filePath']);
            $fileUrl = asset('storage/' . $dataFile['filePath']);
            $fileFormat = $dataFile['fileType'];

            $unduhan->file_path = $filePath;
            $unduhan->file_url = $fileUrl;
            $unduhan->format = $fileFormat;
            $unduhan->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $unduhan;
    }

    function deleteFile(int $id): void
    {
        $unduhan = Unduhan::find($id);

        try {
            if ($unduhan->file_path != null) {
                unlink($unduhan->file_path);
            }
            $unduhan->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }
}
