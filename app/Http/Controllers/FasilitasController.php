<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\FasilitasAddRequest;
use App\Http\Requests\FasilitasUpdateRequest;
use App\Models\Fasilitas;
use App\Services\FasilitasService;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
    //
    private $title = 'fasilitas';

    private FasilitasService $fasilitasService;

    public function __construct(FasilitasService $fasilitasService)
    {
        $this->fasilitasService = $fasilitasService;
    }

    public function index(Request $request)
    {
        $title = $this->title;
        $key = $request->query('key') ?? '';
        $fasilitas = $this->fasilitasService->list($key, 10);
        return response()->view('fasilitas.index', compact('title', 'fasilitas'));
    }


    public function create()
    {
        //
        $title = $this->title;
        return response()->view('fasilitas.create', compact('title'));
    }

    public function store(FasilitasAddRequest $request)
    {
        //
        $gambar = $request->file('gambar');
        try {
            $fasilitas = $this->fasilitasService->add($request);
            $this->fasilitasService->addImage($fasilitas->id, $gambar);
            return response()->redirectTo(route('fasilitas.index'))->with('success', 'Berhasil menambahkan fasilitas');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }



    public function edit($id)
    {
        //
        $title = $this->title;
        $fasilitas = Fasilitas::find($id);
        return response()->view('fasilitas.edit', compact('title', 'fasilitas'));
    }

    public function update(FasilitasUpdateRequest $request, $id)
    {
        //
        $gambar = $request->file('gambar');

        try {
            $result = $this->fasilitasService->update($request, $id);
            if ($gambar != null) {
                $this->fasilitasService->updateImage($id, $gambar);
            }
            return response()->redirectTo(route('fasilitas.index'))->with('success', 'Berhasil mengubah fasilitas');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }


    public function destroy($id)
    {
        //
        try {
            $this->fasilitasService->delete($id);
            return response()->redirectTo(route('fasilitas.index'))->with('success', 'Berhasil menghapus fasilitas');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
