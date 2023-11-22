<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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