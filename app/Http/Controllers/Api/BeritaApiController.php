<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaApiController extends Controller
{
    //


    public function index(Request $request)
    {
        $size = $request->query("size");

        $sizeLimit = 5;

        if (isset($size)) {
            $sizeLimit = $size;
        }

        $berita = Berita::latest()->limit($sizeLimit)->get();
        return response()->json([
            'status' => 'success',
            'data' => $berita
        ]);
    }


    public function show($id)
    {
        $berita = Berita::where('id', $id)->first();

        if ($berita != null) {
            return response()->json([
                'status' => 'success',
                'data' => $berita
            ]);
        }

        return response()->json([
            'message' => "data berita tidak ditemukan",
        ], 404);
    }
}
