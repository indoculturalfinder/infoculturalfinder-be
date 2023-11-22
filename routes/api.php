<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\Tarian;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CulturesController;
use App\Http\Controllers\Api\ProvincesController;
use App\Http\Controllers\Api\CategoriesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Categories
Route::get('categories', [CategoriesController::class, 'index']);
Route::get('categories/{id}', [CategoriesController::class, 'show']);
Route::post('categories', [CategoriesController::class, 'store']);
Route::put('categories/{id}', [CategoriesController::class, 'update']);
Route::delete('categories/{id}', [CategoriesController::class, 'destroy']);

// Provinces
Route::get('provinces', [ProvincesController::class, 'index']);
Route::get('provinces/{id}', [ProvincesController::class, 'show']);
Route::post('provinces', [ProvincesController::class, 'store']);
Route::put('provinces/{id}', [ProvincesController::class, 'update']);
Route::delete('provinces/{id}', [ProvincesController::class, 'destroy']);

// Cultures
Route::get('cultures', [CulturesController::class, 'index']);
Route::get('cultures/{id}', [CulturesController::class, 'show']);
Route::get('cultures/search/{name}', [CulturesController::class, 'searchByProvince']);
Route::post('cultures', [CulturesController::class, 'store']);
Route::put('cultures/{id}', [CulturesController::class, 'update']);
Route::delete('cultures/{id}', [CulturesController::class, 'destroy']);

// Tarian
Route::get('tarian', [Tarian::class, 'index']);
Route::get('tarian/{id}', [Tarian::class, 'show']);
Route::get('tarian/search/name/{name}', [Tarian::class, 'searchByName']);
Route::get('tarian/search/province/{name}', [Tarian::class, 'searchByProvince']);

// Upacara Adat
Route::get('upacara-adat', [UpacaraAdatController::class, 'index']);
Route::get('upacara-adat/{id}', [UpacaraAdatController::class, 'show']);
Route::get('upacara-adat/search/name/{name}', [UpacaraAdatController::class, 'searchByName']);
Route::get('upacara-adat/search/province/{name}', [UpacaraAdatController::class, 'searchByProvince']);

// Rumah Adat
Route::get('rumah-adat', [RumahAdatController::class, 'index']);
Route::get('rumah-adat/{id}', [RumahAdatController::class, 'show']);
Route::get('rumah-adat/search/name/{name}', [RumahAdatController::class, 'searchByName']);
Route::get('rumah-adat/search/province/{name}', [RumahAdatController::class, 'searchByProvince']);

// Makanan Khas
Route::get('makanan-khas', [MakananKhasController::class, 'index']);
Route::get('makanan-khas/{id}', [MakananKhasController::class, 'show']);
Route::get('makanan-khas/search/name/{name}', [MakananKhasController::class, 'searchByName']);
Route::get('makanan-khas/search/province/{name}', [MakananKhasController::class, 'searchByProvince']);