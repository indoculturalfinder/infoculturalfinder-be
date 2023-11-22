<?php

namespace App\Http\Controllers\Api;

use App\Models\Province;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ProvincesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Province::select('id', 'name')->orderBy('id', 'asc')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data ditemukan',
            'Categories' => $data
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $dataProvinces = new Province;

        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'massage'=>'Gagal memasukkan data',
                'data'=>$validator->errors()
            ], 400);
        }

        $dataProvinces->name = $request->name;

        $dataProvinces->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukan data'
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Province::select('id', 'name')->find($id);
        if ($data) {
            return response()->json([
                'status'=>true,
                'message'=>'Data Ditemukan',
                'provinces'=>$data,
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'provinces' => $data
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataProvinces = Province::find($id);

        if (empty($dataProvinces)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'massage'=>'Gagal update data',
                'data'=>$validator->errors()
            ], 400);
        }

        $dataProvinces->name = $request->name;

        $post = $dataProvinces->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses update data'
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
