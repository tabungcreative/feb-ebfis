<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\UnduhanAddRequest;
use App\Http\Requests\UnduhanUpdateRequest;
use App\Models\Unduhan;
use App\Services\UnduhanService;
use Illuminate\Http\Request;

class UnduhanController extends Controller
{
    //
    private $title = 'Unduhan';

    private UnduhanService $unduhanService;

    public function __construct(UnduhanService $unduhanService)
    {
        $this->unduhanService = $unduhanService;
    }


    public function index(Request $request)
    {
        $title = $this->title;
        $key = $request->query('key') ?? '';
        $unduhan = $this->unduhanService->list($key, 10);
        return response()->view('unduhan.index', compact('title', 'unduhan'));
    }

    public function create()
    {
        //
        $title = $this->title;
        return response()->view('unduhan.create', compact('title'));
    }


    public function store(UnduhanAddRequest $request)
    {
        $file = $request->file('file');
        try {
            $unduhan = $this->unduhanService->add($request);
            $this->unduhanService->addFile($file, $unduhan->id);
            return response()->redirectTo(route('unduhan.index'))->with('success', 'Berhasil menambahkan unduhan');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }



    public function edit($id)
    {
        //
        $title = $this->title;
        $unduhan = Unduhan::find($id);
        return response()->view('unduhan.edit', compact('title', 'unduhan'));
    }

    public function update(UnduhanUpdateRequest $request, $id)
    {
        //
        $file = $request->file('file');

        try {
            $result = $this->unduhanService->update($request, $id);
            if ($file != null) {
                $this->unduhanService->updateFile($id, $file);
            }
            return response()->redirectTo(route('unduhan.index'))->with('success', 'Berhasil mengubah unduhan');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }

    public function show($id)
    {
        //
        $title = $this->title;
        $unduhan = Unduhan::find($id);
        return response()->view('unduhan.show', compact('title', 'unduhan'));
    }


    public function destroy($id)
    {
        //
        try {
            $this->unduhanService->delete($id);
            return response()->redirectTo(route('unduhan.index'))->with('success', 'Berhasil menghapus unduhan');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
