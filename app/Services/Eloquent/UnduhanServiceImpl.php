<?php


namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Helper\Media;
use App\Http\Requests\UnduhanAddRequest;
use App\Http\Requests\UnduhanUpdateRequest;
use App\Models\Unduhan;
use App\Services\UnduhanService;
use Illuminate\Pagination\LengthAwarePaginator;

class UnduhanServiceImpl implements UnduhanService
{
    use Media;

    function add(UnduhanAddRequest $request): Unduhan
    {
        $namaFile = $request->input('nama_file');
        try {
            $unduhan = new Unduhan([
                'nama_file' => $namaFile,
                'file_url' => null,
                'file_path' => null,
            ]);
            $unduhan->save();

            return $unduhan;
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }

    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $paginate = Unduhan::where('nama_file', 'like', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($size);

        return $paginate;
    }

    function update(UnduhanUpdateRequest $request, int $id): Unduhan
    {
        $unduhan = Unduhan::find($id);
        $namaFile = $request->input('nama_file');

        try {
            $unduhan->nama_file = $namaFile;
            $unduhan->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $unduhan;
    }

    function delete(int $id): void
    {
        $unduhan = Unduhan::find($id);

        if ($unduhan->file_path != null) {
            $this->deleteFile($unduhan->file_path);
        }

        $unduhan->delete();

    }

    function addFile($file, int $id): Unduhan
    {
        $unduhan = Unduhan::find($id);

        try {
            $dataFile = $this->uploads($file, 'unduhan/');

            $filePath = $dataFile;
            $fileUrl = asset('storage/' . $dataFile);

            $unduhan->file_url = $fileUrl;
            $unduhan->file_path = $filePath;
            $unduhan->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $unduhan;
    }

    function updateFile(int $id, $file): Unduhan
    {
        $unduhan = Unduhan::find($id);

        if ($unduhan->file_path != null) {
            $this->deleteFile($unduhan->file_path);
        }

        $dataFile = $this->uploads($file, 'unduhan/');
        $filePath = $dataFile;
        $fileUrl = asset('storage/' . $dataFile);

        $unduhan->file_path = $filePath;
        $unduhan->file_url = $fileUrl;
        $unduhan->save();

        return $unduhan;
    }

}
