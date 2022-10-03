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
        $size = $request->query("size");

        $sizeLimit = 5;

        if (isset($size)) {
            $sizeLimit = $size;
        }

        $program = Program::latest()->limit($sizeLimit)->get();
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
