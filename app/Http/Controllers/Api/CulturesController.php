<?php

namespace App\Http\Controllers\Api;

use App\Models\Culture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

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
        $rules = [
            'province_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'img' => 'required',
            'video' => 'required',
            'desc' => 'required'
        ];
    
        $validator = Validator::make($request->all(), $rules);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memasukkan data',
                'data' => $validator->errors()
            ], 400);
        }
    
        $dataCultures = new Culture;
        $dataCultures->province_id = $request->province_id;
        $dataCultures->category_id = $request->category_id;
        $dataCultures->name = $request->name;
        $dataCultures->img = $request->img;
        $dataCultures->video = $request->video;
        $dataCultures->desc = $request->desc;
    
        $dataCultures->save();
    
        return response()->json([
            'status' => true,
            'message' => 'Sukses memasukkan data'
        ], 201);
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
        $rules = [
            'province_id' => 'required',
            'category_id' => 'required',
            'name' => 'required',
            'img' => 'required',
            'video' => 'required',
            'desc' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui data',
                'data' => $validator->errors(),
            ], 400);
        }

        $dataCulture = Culture::find($id);

        if (!$dataCulture) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
            ], 404);
        }

        $dataCulture->province_id = $request->province_id;
        $dataCulture->category_id = $request->category_id;
        $dataCulture->name = $request->name;
        $dataCulture->img = $request->img;
        $dataCulture->video = $request->video;
        $dataCulture->desc = $request->desc;

        $dataCulture->save();

        return response()->json([
            'status' => true,
            'message' => 'Sukses memperbarui data',
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
