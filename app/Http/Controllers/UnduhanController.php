<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\UnduhanAddRequest;
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
