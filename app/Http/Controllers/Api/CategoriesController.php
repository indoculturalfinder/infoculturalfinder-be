<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Categorie::select('id', 'name', 'img', 'desc')->orderBy('id', 'asc')->get();

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
        $dataCategories = new Categorie;

        $rules = [
            'name' => 'required',
            'img' => 'required',
            'desc' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'massage'=>'Gagal memasukkan data',
                'data'=>$validator->errors()
            ], 400);
        }

        $dataCategories->name = $request->name;
        $dataCategories->img = $request->img;
        $dataCategories->desc = $request->desc;

        $dataCategories->save();

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
        $data = Categorie::select('id', 'name')->find($id);
        if ($data) {
            return response()->json([
                'status'=>true,
                'message'=>'Data Ditemukan',
                'categories'=>$data,
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan',
                'categories' => $data
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataCategories = Categorie::find($id);

        if (empty($dataCategories)) {
            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ], 404);
        }

        $rules = [
            'name' => 'required',
            'img' => 'required',
            'desc' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json([
                'status'=>false,
                'massage'=>'Gagal update data',
                'data'=>$validator->errors()
            ], 400);
        }

        $dataCategories->name = $request->name;
        $dataCategories->img = $request->img;
        $dataCategories->desc = $request->desc;

        $dataCategories->save();

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
