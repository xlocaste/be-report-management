<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengumpulanPenugasanController;
use App\Http\Controllers\PenugasanController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);


Route::middleware('auth:sanctum')->group(function () {
    Route::group(['middleware' => ['role:superVisor|karyawan']], function () {
        Route::get('/pengumpulan-penugasan', [PengumpulanPenugasanController::class, 'index']);
        Route::get('/pengumpulan-penugasan/{pengumpulanPenugasan}', [PengumpulanPenugasanController::class, 'show']);
        Route::put('/pengumpulan-penugasan/{pengumpulanPenugasan}', [PengumpulanPenugasanController::class, 'update']);
        Route::get('/penugasan', [PenugasanController::class, 'index']);
        Route::get('/penugasan/{penugasan}', [PenugasanController::class, 'show']);
    });

    Route::group(['middleware' => ['role:karyawan']], function () {
        Route::post('/pengumpulan-penugasan', [PengumpulanPenugasanController::class, 'store']);
    });

    Route::group(['middleware' => ['role:superVisor']], function () {
        Route::post('/penugasan', [PenugasanController::class, 'store']);
        Route::put('/penugasan/{penugasan}', [PenugasanController::class, 'update']);
        Route::delete('/penugasan/{penugasan}', [PenugasanController::class, 'destroy']);
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
