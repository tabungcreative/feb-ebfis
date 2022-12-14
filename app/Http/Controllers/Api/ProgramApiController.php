<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;

class ProgramApiController extends Controller
{
    //

    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 10;
        $program = Program::orderBy('created_at', 'desc')->paginate($pageSize);


        return response()->json([
            'status' => 'success',
            'data' => $program
        ]);
    }


    public function show($id)
    {
        $program = Program::where('id', $id)->first();

        if ($program != null) {
            return response()->json([
                'status' => 'success',
                'data' => $program
            ]);
        }

        return response()->json([
            'message' => "data program tidak ditemukan",
        ], 404);
    }
}
