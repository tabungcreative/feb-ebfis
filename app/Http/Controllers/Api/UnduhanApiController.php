<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Unduhan;
use Illuminate\Http\Request;

class UnduhanApiController extends Controller
{
    //


    public function index(Request $request)
    {
        $size = $request->query("size");

        $sizeLimit = 5;

        if (isset($size)) {
            $sizeLimit = $size;
        }

        $unduhan = Unduhan::latest()->limit($sizeLimit)->get();
        return response()->json([
            'status' => 'success',
            'data' => $unduhan
        ]);
    }


    public function show($id)
    {
        $unduhan = Unduhan::where('id', $id)->first();

        if ($unduhan != null) {
            return response()->json([
                'status' => 'success',
                'data' => $unduhan
            ]);
        }

        return response()->json([
            'message' => "data unduhan tidak ditemukan",
        ], 404);
    }
}
