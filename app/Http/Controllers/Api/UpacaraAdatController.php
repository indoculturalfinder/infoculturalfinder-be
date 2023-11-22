<?php

namespace App\Http\Controllers\Api;

use App\Models\Culture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UpacaraAdatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $data = Culture::join('provinces', 'cultures.province_id', '=', 'provinces.id')
        ->join('categories', 'cultures.category_id', '=', 'categories.id')
        ->select('cultures.id', 'cultures.province_id', 'provinces.name as province_name', 'cultures.category_id', 'categories.name as category_name', 'cultures.name', 'cultures.img', 'cultures.video', 'cultures.desc')
        ->where('categories.name', '=', 'Upacara Adat')
        ->orderBy('cultures.id', 'asc')
        ->get();

    return response()->json([
        'status' => true,
        'message' => 'Data ditemukan',
        'result' => $data
    ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Culture::join('provinces', 'cultures.province_id', '=', 'provinces.id')
            ->join('categories', 'cultures.category_id', '=', 'categories.id')
            ->select('cultures.id', 'cultures.province_id', 'provinces.name as province_name', 'cultures.category_id', 'categories.name as category_name', 'cultures.name', 'cultures.img', 'cultures.video', 'cultures.desc')
            ->where('cultures.id', '=', $id)
            ->where('categories.name', '=', 'Upacara Adat')
            ->first();

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Data Ditemukan',
                'result' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'result' => null,
            ], 404);
        }
    }


    public function searchByName(string $name)
    {
        $data = Culture::join('provinces', 'cultures.province_id', '=', 'provinces.id')
            ->join('categories', 'cultures.category_id', '=', 'categories.id')
            ->select('cultures.id', 'cultures.province_id', 'provinces.name as province_name', 'cultures.category_id', 'categories.name as category_name', 'cultures.name', 'cultures.img', 'cultures.video', 'cultures.desc')
            ->where('categories.name', '=', 'Upacara Adat')
            ->where('cultures.name', 'like', "%$name%")
            ->orderBy('cultures.id', 'asc')
            ->get();

        if ($data->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Data Ditemukan',
                'cultures' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'cultures' => $data,
            ], 404);
        }
    }

    public function searchByProvince(string $name)
    {
        $data = Culture::join('provinces', 'cultures.province_id', '=', 'provinces.id')
            ->join('categories', 'cultures.category_id', '=', 'categories.id')
            ->select('cultures.id', 'cultures.province_id', 'provinces.name as province_name', 'cultures.category_id', 'categories.name as category_name', 'cultures.name', 'cultures.img', 'cultures.video', 'cultures.desc')
            ->where('categories.name', '=', 'Upacara Adat')
            ->where('provinces.name', 'like', "%$name%")
            ->orderBy('cultures.id', 'asc')
            ->get();

        if ($data->isNotEmpty()) {
            return response()->json([
                'status' => true,
                'message' => 'Data Ditemukan',
                'cultures' => $data,
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'cultures' => $data,
            ], 404);
        }
    }
}
