<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenApiController extends Controller
{
    //
    public function index(Request $request)
    {
        $size = $request->query("size");

        $sizeLimit = 5;

        if (isset($size)) {
            $sizeLimit = $size;
        }

        $dosen = Dosen::latest()->limit($sizeLimit)->get();
        return response()->json([
            'status' => 'success',
            'data' => $dosen
        ]);
    }
    public function show($nidn)
    {
        $dosen = Dosen::where('nidn', $nidn)->first();

        if ($dosen != null) {
            return response()->json([
                'status' => 'success',
                'data' => $dosen
            ]);
        }

        return response()->json([
            'message' => "data dosen tidak ditemukan",
        ], 404);
    }
}
