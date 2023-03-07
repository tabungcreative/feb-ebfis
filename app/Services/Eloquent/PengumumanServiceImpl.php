<?php

namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Helper\Media;
use App\Http\Requests\PengumumanAddRequest;
use App\Http\Requests\PengumumanUpdateRequest;
use App\Models\Pengumuman;
use App\Services\PengumumanService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class PengumumanServiceImpl implements PengumumanService
{
    use Media;

    function add(PengumumanAddRequest $request): Pengumuman
    {
        $judul = $request->input('judul');
        $isi = $request->input('isi');
        try {
            $pengumuman = new Pengumuman([
                'judul' => $judul,
                'isi' => $isi,
            ]);
            $pengumuman->save();

            return $pengumuman;
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
        return $pengumuman;
    }

    function addFile(int $id, $file): Pengumuman
    {
        $pengumuman = Pengumuman::find($id);

        $dataFile = $this->uploads($file, 'pengumuman/');
        $filePath = $dataFile;
        $fileUrl = asset('storage/' . $dataFile);

        $pengumuman->file_url = $fileUrl;
        $pengumuman->file_path = $filePath;
        $pengumuman->save();


        return $pengumuman;
    }

    function edit(PengumumanUpdateRequest $request, int $id): Pengumuman
    {
        $pengumuman = Pengumuman::find($id);
        $judul = $request->input('judul');
        $isi = $request->input('isi');

        try {
            $pengumuman->judul = $judul;
            $pengumuman->isi = $isi;
            $pengumuman->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $pengumuman;
    }

    function delete(int $id): void
    {
        $pengumuman = Pengumuman::find($id);

        if ($pengumuman->file_path != null) {
            $this->deleteFile($pengumuman->file_path);
        }
        $pengumuman->delete();

    }

    function editFile(int $id, $file): Pengumuman
    {
        $pengumuman = Pengumuman::find($id);


        if ($pengumuman->file_path != null) {
            $this->deleteFile($pengumuman->file_path);
        }

        $dataFile = $this->uploads($file, 'pengumuman/');
        $filePath = $dataFile;
        $fileUrl = asset('storage/' . $dataFile);

        $pengumuman->file_path = $filePath;
        $pengumuman->file_url = $fileUrl;
        $pengumuman->save();


        return $pengumuman;
    }

    function list(string $key, $size = 10): LengthAwarePaginator
    {
        $pengumuman = Pengumuman::where('judul', 'like', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($size);

        return $pengumuman;
    }

    function show(int $id): Pengumuman
    {
        $pengumuman = Pengumuman::find($id);

        return $pengumuman;
    }
}
