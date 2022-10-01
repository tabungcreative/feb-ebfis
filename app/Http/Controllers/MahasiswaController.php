<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\MahasiswaAddRequest;
use App\Http\Requests\MahasiswaUpdateRequest;
use App\Imports\MahasiswaImport;
use App\Models\Mahasiswa;
use App\Services\MahasiswaService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    //
    private $title = 'Mahasiswa';

    private MahasiswaService $mahasiswaService;

    public function __construct(MahasiswaService $mahasiswaService)
    {
        $this->mahasiswaService = $mahasiswaService;
    }


    public function index(Request $request)
    {
        //
        $key = $request->query('key') ?? '';
        $size = $request->query('size') ?? 10;
        $title = $this->title;
        $mahasiswa = $this->mahasiswaService->list($key, $size);
        return response()->view('mahasiswa.index', compact('title', 'mahasiswa'));
    }

    public function create()
    {
        //
        $title = $this->title;
        return response()->view('mahasiswa.create', compact('title'));
    }

    public function store(MahasiswaAddRequest $request)
    {
        //
        try {
            $this->mahasiswaService->add($request);
            return response()->redirectTo(route('mahasiswa.index'))->with('success', 'Berhasil menambahkan mahasiswa');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', 'Gagal menambah mahasiswa, terjadi kesalahan pada server')
                ->withInput($request->all());
        }
    }

    public function show(Mahasiswa $mahasiswa)
    {
        //

    }

    public function edit($id)
    {
        //
        $title = $this->title;
        $mahasiswa = Mahasiswa::find($id);
        return response()->view('mahasiswa.edit', compact('title', 'mahasiswa'));
    }


    public function update(MahasiswaUpdateRequest $request, $id)
    {
        //
        try {
            $this->mahasiswaService->update($request, $id);
            return response()->redirectTo(route('mahasiswa.index'))->with('success', 'Berhasil mengubah mahasiswa');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Gagal mengubah mahasiswa, terjadi kesalahan pada server')
                ->withInput($request->all());
        }
    }

    public function destroy($id)
    {
        try {
            $this->mahasiswaService->delete($id);
            return response()->redirectTo(route('mahasiswa.index'))->with('success', 'Berhasil menghapus mahasiswa');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', 'Gagal menghapus mahasiswa, terjadi kesalahan pada server');
        }
    }

    public function import()
    {
        try {
            Excel::import(new MahasiswaImport, request()->file('file'));
            return back();
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Gagal import mahasiswa, terjadi kesalahan pada server');
        }
    }
}
