<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\PengumumanAddRequest;
use App\Http\Requests\PengumumanUpdateRequest;
use App\Models\Pengumuman;
use App\Services\PengumumanService;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    private $title = 'Pengumuman';

    private PengumumanService $pengumumanService;

    public function __construct(PengumumanService $pengumumanService)
    {
        $this->pengumumanService = $pengumumanService;
    }

    public function index(Request $request)
    {
        $title = $this->title;
        $key = $request->query('key') ?? '';
        $pengumuman = $this->pengumumanService->list($key, 10);
        return response()->view('pengumuman.index', compact('title', 'pengumuman'));
    }

    public function create()
    {
        //
        $title = $this->title;
        return response()->view('pengumuman.create', compact('title'));
    }

    public function store(PengumumanAddRequest $request)
    {
        //
        $judul = $request->input('judul');
        $isi = $request->input('judul');
        $file = $request->file('file');
        try {
            $pengumuman = $this->pengumumanService->add($judul, $isi);
            $this->pengumumanService->addFile($pengumuman->id, $file);
            return response()->redirectTo(route('pengumuman.index'))->with('success', 'Berhasil menambahkan pengumuman');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }

    public function show($id)
    {
        //
        $title = $this->title;
        $pengumuman = Pengumuman::find($id);
        return response()->view('pengumuman.show', compact('title', 'pengumuman'));
    }

    public function edit($id)
    {
        //
        $title = $this->title;
        $pengumuman = Pengumuman::find($id);
        return response()->view('pengumuman.edit', compact('title', 'pengumuman'));
    }

    public function update(PengumumanUpdateRequest $request, $id)
    {
        //
        $file = $request->file('file');

        try {
            $result = $this->pengumumanService->edit($request, $id);
            if ($file != null) {
                $this->pengumumanService->editFile($id, $file);
            }
            return response()->redirectTo(route('pengumuman.index'))->with('success', 'Berhasil mengubah pengumuman');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }


    public function destroy($id)
    {
        //
        try {
            $this->pengumumanService->delete($id);
            return response()->redirectTo(route('pengumuman.index'))->with('success', 'Berhasil menghapus pengumuman');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
