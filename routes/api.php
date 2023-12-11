<?php

use App\Http\Controllers\BrandController;
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

Route::get('brands', [BrandController::class, "index"])->name('brands.index');
Route::get('brands/{id}', [BrandController::class, "find"])->name('brands.find');
Route::post('brands', [BrandController::class, "create"])->name('brands.create');
Route::put('brands/{id}', [BrandController::class, "update"])->name('brands.update');
Route::delete('brands/{id}', [BrandController::class, "delete"])->name('brands.delete');
