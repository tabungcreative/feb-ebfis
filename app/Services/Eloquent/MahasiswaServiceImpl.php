<?php

namespace App\Services\Eloquent;

use App\Exceptions\InvariantException;
use App\Http\Requests\MahasiswaAddRequest;
use App\Http\Requests\MahasiswaUpdateRequest;
use App\Models\Mahasiswa;
use App\Services\MahasiswaService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class MahasiswaServiceImpl implements MahasiswaService
{

    function add(MahasiswaAddRequest $request): Mahasiswa
    {
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $prodi = $request->input('prodi');
        $jenisKelamin = $request->input('jenis_kelamin');
        $nomerHp = $request->input('nomer_hp');
        $tempatLahir = $request->input('tempat_lahir');
        $tanggalLahir = $request->input('tanggal_lahir');
        $nik = $request->input('nik');

        try {
            DB::beginTransaction();
            $mahasiswa = new Mahasiswa([
                'nim' => $nim,
                'nama' => $nama,
                'prodi' => $prodi,
                'jenis_kelamin' => $jenisKelamin,
                'nomer_hp' => $nomerHp,
                'tempat_lahir' => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'nik' => $nik,
            ]);
            $mahasiswa->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new InvariantException($exception->getMessage());
        }
        return $mahasiswa;
    }

    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $mahasiswa = Mahasiswa::where('nama', 'like', '%' . $key . '%')->paginate($size);

        return $mahasiswa;
    }

    function update(MahasiswaUpdateRequest $request, int $id): Mahasiswa
    {
        $nim = $request->input('nim');
        $nama = $request->input('nama');
        $prodi = $request->input('prodi');
        $jenisKelamin = $request->input('jenis_kelamin');
        $nomerHp = $request->input('nomer_hp');
        $tempatLahir = $request->input('tempat_lahir');
        $tanggalLahir = $request->input('tanggal_lahir');
        $nik = $request->input('nik');

        $mahasiswa = Mahasiswa::find($id);

        try {
            $mahasiswa->nim = $nim;
            $mahasiswa->nama = $nama;
            $mahasiswa->prodi = $prodi;
            $mahasiswa->jenis_kelamin = $jenisKelamin;
            $mahasiswa->nomer_hp = $nomerHp;
            $mahasiswa->tempat_lahir = $tempatLahir;
            $mahasiswa->tanggal_lahir = $tanggalLahir;
            $mahasiswa->nik = $nik;
            $mahasiswa->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $mahasiswa;
    }

    function delete(int $id): void
    {
        $mahasiswa = Mahasiswa::find($id);
        try {
            $mahasiswa->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }
}
