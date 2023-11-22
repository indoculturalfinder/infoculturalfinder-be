<?php

namespace App\Http\Controllers\Api;

use App\Models\Culture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CulturesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Culture::join('provinces', 'cultures.province_id', '=', 'provinces.id')
        ->join('categories', 'cultures.category_id', '=', 'categories.id')
        ->select('cultures.id', 'cultures.province_id', 'provinces.name as province_name', 'cultures.category_id', 'categories.name as category_name', 'cultures.name', 'cultures.img', 'cultures.video', 'cultures.desc')
        ->orderBy('cultures.id', 'asc')
        ->get();

        return response()->json([
        'status' => true,
        'message' => 'Data ditemukan',
        'Cultures' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Culture::join('provinces', 'cultures.province_id', '=', 'provinces.id')
        ->join('categories', 'cultures.category_id', '=', 'categories.id')
        ->select('cultures.id', 'cultures.province_id', 'provinces.name as province_name', 'cultures.category_id', 'categories.name as category_name', 'cultures.name', 'cultures.img', 'cultures.video', 'cultures.desc')
        ->orderBy('cultures.id', 'asc')
        ->find($id);

        if ($data) {
            return response()->json([
                'status'=>true,
                'message'=>'Data Ditemukan',
                'cultures'=>$data,
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'cultures' => $data
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
