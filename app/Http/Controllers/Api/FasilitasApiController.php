<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasApiController extends Controller
{
    //
    public function index(Request $request)
    {
        $size = $request->query("size");

        $sizeLimit = 5;

        if (isset($size)) {
            $sizeLimit = $size;
        }

        $fasilitas = Fasilitas::latest()->limit($sizeLimit)->get();
        return response()->json([
            'status' => 'success',
            'data' => $fasilitas
        ]);
    }


    public function show($id)
    {
        $fasilitas = Fasilitas::where('id', $id)->first();

        if ($fasilitas != null) {
            return response()->json([
                'status' => 'success',
                'data' => $fasilitas
            ]);
        }

        return response()->json([
            'message' => "data fasilitas tidak ditemukan",
        ], 404);
    }
}
