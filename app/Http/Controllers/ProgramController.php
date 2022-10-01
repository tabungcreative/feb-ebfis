<?php

namespace App\Http\Controllers;

use App\Exceptions\InvariantException;
use App\Http\Requests\ProgramAddRequest;
use App\Http\Requests\ProgramUpdateRequest;
use App\Models\Program;
use App\Services\ProgramService;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    //

    private $title = 'Program';

    private ProgramService $programService;

    public function __construct(ProgramService $programService)
    {
        $this->programService = $programService;
    }

    public function index(Request $request)
    {
        $title = $this->title;
        $key = $request->query('key') ?? '';
        $program = $this->programService->list($key, 10);
        return response()->view('program.index', compact('title', 'program'));
    }

    public function create()
    {
        //
        $title = $this->title;
        return response()->view('program.create', compact('title'));
    }

    public function store(ProgramAddRequest $request)
    {
        //
        $gambar = $request->file('gambar');
        try {
            $program = $this->programService->add($request);
            $this->programService->addImage($program->id, $gambar);
            return response()->redirectTo(route('program.index'))->with('success', 'Berhasil menambahkan program');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }

    public function show($id)
    {
        //
        $title = $this->title;
        $program = Program::find($id);
        return response()->view('program.show', compact('title', 'program'));
    }

    public function edit($id)
    {
        //
        $title = $this->title;
        $program = Program::find($id);
        return response()->view('program.edit', compact('title', 'program'));
    }

    public function update(ProgramUpdateRequest $request, $id)
    {
        //
        $gambar = $request->file('gambar');

        try {
            $result = $this->programService->update($request, $id);
            if ($gambar != null) {
                $this->programService->updateImage($id, $gambar);
            }
            return response()->redirectTo(route('program.index'))->with('success', 'Berhasil mengubah program');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage())->withInput($request->all());
        }
    }


    public function destroy($id)
    {
        //
        try {
            $this->programService->delete($id);
            return response()->redirectTo(route('program.index'))->with('success', 'Berhasil menghapus program');
        } catch (InvariantException $exception) {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }
}
