<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PinjamController;
use App\Http\Controllers\DetailPinjamController;
use App\Http\Controllers\KembaliController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('buku', BukuController::class);
    Route::resource('pinjam', PinjamController::class);
    
    Route::get('/detail/{id_pinjam}', [DetailPinjamController::class, 'show']);
    Route::post('/detail', [DetailPinjamController::class, 'store']);

    Route::get('/kembali', [KembaliController::class, 'index']);    
    Route::post('/kembali', [KembaliController::class, 'store']);    

});
