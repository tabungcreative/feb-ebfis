<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanApiController extends Controller
{
    //
    public function index(Request $request)
    {
        $pageSize = $request->page_size ?? 10;
        $pengumuman = Pengumuman::orderBy('created_at', 'desc')->paginate($pageSize);

        return response()->json([
            'status' => 'success',
            'data' => $pengumuman
        ]);
    }


    public function show($id)
    {
        $pengumuman = Pengumuman::where('id', $id)->first();

        if ($pengumuman != null) {
            return response()->json([
                'status' => 'success',
                'data' => $pengumuman
            ]);
        }

        return response()->json([
            'message' => "data pengumuman tidak ditemukan",
        ], 404);
    }
}
