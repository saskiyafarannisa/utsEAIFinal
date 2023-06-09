<?php

use App\Http\Controllers\BukuController;
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

Route::get('/buku', [BukuController::class, 'index']);
Route::post('/buku/add', [BukuController::class, 'add']);
Route::put('/buku/update', [BukuController::class, 'update']);
Route::get('/buku/highscore', [BukuController::class, 'HighScore']);
Route::get('/buku/lowscore', [BukuController::class, 'LowScore']);
Route::get('/buku/GetbyId/{id}', [BukuController::class ,'GetbyId']);