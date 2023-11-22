<?php

namespace App\Http\Controllers\Api;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        //
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
