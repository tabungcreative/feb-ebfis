<?php


namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Helper\Media;
use App\Http\Requests\FasilitasAddRequest;
use App\Http\Requests\FasilitasUpdateRequest;
use App\Models\Fasilitas;
use App\Services\FasilitasService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class FasilitasServiceImpl implements FasilitasService
{
    use Media;

    function add(FasilitasAddRequest $request): Fasilitas
    {
        $namaFasilitas = $request->input('nama_fasilitas');
        $isi = $request->input('isi');
        try {

            $fasilitas = new Fasilitas([
                'nama_fasilitas' => $namaFasilitas,
                'isi' => $isi,
            ]);

            $fasilitas->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $fasilitas;
    }

    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $paginate = Fasilitas::where('nama_fasilitas', 'like', '%' . $key . '%')
            ->orWhere('isi', 'like', '%' . $key . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate($size);

        return $paginate;
    }

    function update(FasilitasUpdateRequest $request, int $id): Fasilitas
    {
        $fasilitas = Fasilitas::find($id);
        $namaFasilitas = $request->input('nama_fasilitas');
        $isi = $request->input('isi');

        try {
            $fasilitas->nama_fasilitas = $namaFasilitas;
            $fasilitas->isi = $isi;
            $fasilitas->save();
        } catch (\Exception $exception) {
            throw new  InvariantException($exception->getMessage());
        }

        return $fasilitas;
    }

    function delete(int $id): void
    {
        $fasilitas = Fasilitas::find($id);
        try {
            if (Storage::disk('s3')->exists($fasilitas->gambar_path)) {
                Storage::disk('s3')->delete($fasilitas->gambar_path);
            }

            $fasilitas->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }

    function addImage(int $id, $image): Fasilitas
    {
        $fasilitas = Fasilitas::find($id);

        try {
            if ($fasilitas->gambar_path != null) {
                unlink($fasilitas->gambar_path);
            }

            $dataFile = $this->uploads($image, 'ebfis/fasilitas/');
            $filePath = $dataFile['filePath'];
            $fileUrl = $dataFile['fileUrl'];

            $fasilitas->gambar_path = $filePath;
            $fasilitas->gambar_url = $fileUrl;
            $fasilitas->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $fasilitas;
    }

    function deleteImage(int $id): Fasilitas
    {
        $fasilitas = Fasilitas::find($id);

        try {
            if (Storage::disk('s3')->exists($fasilitas->gambar_path)) {
                Storage::disk('s3')->delete($fasilitas->gambar_path);
            }

            $fasilitas->gambar_url = null;
            $fasilitas->gambar_path = null;
            $fasilitas->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $fasilitas;
    }

    function updateImage(int $id, $image): Fasilitas
    {
        $fasilitas = Fasilitas::find($id);

        try {
            if (Storage::disk('s3')->exists($fasilitas->gambar_path)) {
                Storage::disk('s3')->delete($fasilitas->gambar_path);
            }
            $dataFile = $this->uploads($image, 'ebfis/fasilitas/');
            $filePath = $dataFile['filePath'];
            $fileUrl = $dataFile['fileUrl'];

            $fasilitas->gambar_path = $filePath;
            $fasilitas->gambar_url = $fileUrl;
            $fasilitas->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $fasilitas;
    }
}
