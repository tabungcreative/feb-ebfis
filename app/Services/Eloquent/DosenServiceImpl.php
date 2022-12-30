<?php

namespace App\Services\Eloquent;


use App\Exceptions\InvariantException;
use App\Http\Requests\DosenAddRequest;
use App\Http\Requests\DosenUpdateRequest;
use App\Models\Dosen;
use App\Services\DosenService;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class DosenServiceImpl implements DosenService
{
    function add(DosenAddRequest $request): Dosen
    {
        $kodeDosen = $request->input('kode_dosen');
        $nidn = $request->input('nidn');
        $nama = $request->input('nama');
        $prodi = $request->input('prodi');
        $jenisKelamin = $request->input('jenis_kelamin');
        $nomerHp = $request->input('nomer_hp');
        $tempatLahir = $request->input('tempat_lahir');
        $tanggalLahir = $request->input('tanggal_lahir');
        $nik = $request->input('nik');
        $lulusanTerakhir = $request->input('lulusan_terakhir');
        $keilmuan = $request->input('keilmuan');


        try {
            DB::beginTransaction();
            $dosen = new Dosen([
                'kode_dosen' => $kodeDosen,
                'nidn' => $nidn,
                'nama' => $nama,
                'prodi' => $prodi,
                'jenis_kelamin' => $jenisKelamin,
                'nomer_hp' => $nomerHp,
                'tempat_lahir' => $tempatLahir,
                'tanggal_lahir' => $tanggalLahir,
                'nik' => $nik,
                'lulusan_terakhir' => $lulusanTerakhir,
                'keilmuan' => $keilmuan,

            ]);
            $dosen->save();
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
            throw new InvariantException($exception->getMessage());
        }
        return $dosen;
    }

    function list(string $key = '', int $size = 10): LengthAwarePaginator
    {
        $dosen = Dosen::where('nama', 'like', '%' . $key . '%')->paginate($size);

        return $dosen;
    }

    function update(DosenUpdateRequest $request, int $id): Dosen
    {
        $kodeDosen = $request->input('kode_dosen');
        $nidn = $request->input('nidn');
        $nama = $request->input('nama');
        $prodi = $request->input('prodi');
        $jenisKelamin = $request->input('jenis_kelamin');
        $nomerHp = $request->input('nomer_hp');
        $tempatLahir = $request->input('tempat_lahir');
        $tanggalLahir = $request->input('tanggal_lahir');
        $nik = $request->input('nik');
        $lulusanTerakhir = $request->input('lulusan_terakhir');
        $keilmuan = $request->input('keilmuan');

        $dosen = Dosen::find($id);

        try {
            $dosen->kode_dosen = $kodeDosen;
            $dosen->nidn = $nidn;
            $dosen->nama = $nama;
            $dosen->prodi = $prodi;
            $dosen->jenis_kelamin = $jenisKelamin;
            $dosen->nomer_hp = $nomerHp;
            $dosen->tempat_lahir = $tempatLahir;
            $dosen->tanggal_lahir = $tanggalLahir;
            $dosen->nik = $nik;
            $dosen->lulusan_terakhir = $lulusanTerakhir;
            $dosen->keilmuan = $keilmuan;
            $dosen->save();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }

        return $dosen;
    }

    function delete(int $id): void
    {
        $dosen = Dosen::find($id);
        try {
            $dosen->delete();
        } catch (\Exception $exception) {
            throw new InvariantException($exception->getMessage());
        }
    }
}
