<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaApiController extends Controller
{
    //
    public function index(Request $request)
    {
        $mahasiswa = Mahasiswa::orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => 'success',
            'data' => $mahasiswa
        ]);
    }

    public function show($nim)
    {
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if ($mahasiswa != null) {
            return response()->json([
                'status' => 'success',
                'data' => $mahasiswa
            ]);
        }

        return response()->json([
            'message' => "data mahasiswa tidak ditemukan",
        ], 404);
    }
}
