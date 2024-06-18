<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\TemuanController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);

Route::get('dataJadwal', [JadwalController::class, 'index']);
Route::post('dataJadwal', [JadwalController::class, 'store']);
Route::get('dataJadwal/{id}', [JadwalController::class, 'show']);
Route::patch('dataJadwal/{id}', [JadwalController::class, 'update']);
Route::delete('dataJadwal/{id}', [JadwalController::class, 'destroy']);

Route::get('dataPemeriksaan', [PemeriksaanController::class, 'index']);
Route::post('dataPemeriksaan', [PemeriksaanController::class, 'store']);
Route::get('dataPemeriksaan/{id}', [PemeriksaanController::class, 'show']);
Route::patch('dataPemeriksaan/{id}', [PemeriksaanController::class, 'update']);
Route::delete('dataPemeriksaan/{id}', [PemeriksaanController::class, 'destroy']);

// Route::get('dataPemeriksaan/{pemeriksaan_id}/upload', [PemeriksaanGambarController::class, 'index']);
// Route::post('dataPemeriksaan/{pemeriksaan_id}/upload', [PemeriksaanGambarController::class, 'store']);
// Route::get('data-gambar/{pgambar_id}/delete', [PemeriksaanGambarController::class, 'destroy']);

Route::get('dataTemuan', [TemuanController::class, 'index']);
Route::post('dataTemuan', [TemuanController::class, 'store']);
Route::get('dataTemuan/{id}', [TemuanController::class, 'show']);
Route::patch('dataTemuan/{id}', [TemuanController::class, 'update']);
Route::delete('dataTemuan/{id}', [TemuanController::class, 'destroy']);