<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\StatistikController;
use App\Http\Controllers\API\KendaraanController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Storage;

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

// generate url dokumen
Route::get('upload/{pathA}/{pathB}/{pathC?}', function ($pathA, $pathB, $pathC = null) {
    $path = "{$pathA}/{$pathB}";
    if ($pathC !== null) $path .= "/{$pathC}";
    $mime = Storage::mimeType($path);
    $allowedMime = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/msword', 'application/vnd.ms-excel'];

    if (!in_array($mime, $allowedMime))
        return response()->json(['error' => 'Tidak terpenuhi.'], 400);
    else
        return response()->file(storage_path("app/{$path}"));
});
// end generate url dokumen

Route::post('issue-token', [AuthController::class, 'issueTokenAdmin']);
Route::get('user', [AuthController::class, 'getMe'])->middleware('auth:api');
Route::post('user/update-profil', [AuthController::class, 'updateProfil'])->middleware('auth:api');
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');

Route::middleware('auth:api')->group(function () {
    Route::get('statistik/total-by-tanggal', [StatistikController::class, 'grafikBySurat']);
    Route::get('statistik/total-surat', [StatistikController::class, 'totalSurat']);
    Route::get('statistik/total-by-personil', [StatistikController::class, 'totalByPersonil']);
    Route::get('history', [StatistikController::class, 'history']);

    Route::post('search-nrkb', [KendaraanController::class, 'searchNopol']);


    Route::prefix('surat')->group(function() {
        Route::get('/{surat}/show', [KendaraanController::class, 'show']);
        Route::post('/store', [KendaraanController::class, 'storeSurat']);
        Route::post('/{kode}/update-file-print', [KendaraanController::class, 'updateFilePrint']);
    });

    Route::prefix('manage-user')->group(function() {
        Route::post('/store-admin', [UserController::class, 'storeAdmin']);
        Route::post('/store-csv', [UserController::class, 'storeCsv']);
    });
});
