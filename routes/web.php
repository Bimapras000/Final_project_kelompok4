<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengembalianController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});

Route::prefix('admin')->group(function(){

Route::get('/dashboard',[DashboardController::class, 'index']);

// route anggota
Route::get('/anggota',[AnggotaController::class, 'index']);
Route::get('/anggota/create',[AnggotaController::class, 'create']);
Route::post('/anggota/store',[AnggotaController::class, 'store']);
Route::get('/anggota/edit/{id}',[AnggotaController::class, 'edit']);
Route::post('/anggota/update/{id}',[AnggotaController::class, 'update']);
Route::get('/anggota/delete/{id}',[AnggotaController::class, 'destroy']);

//Route Buku
Route::get('/petugas',[PetugasController::class, 'index']);
Route::get('/buku',[BukuController::class, 'index']);
Route::get('/buku/create',[BukuController::class, 'create']);
Route::post('/buku/store',[BukuController::class, 'store']);
Route::get('/buku/show/{id}',[BukuController::class, 'show']);
Route::get('/buku/edit/{id}',[BukuController::class, 'edit']);
Route::post('/buku/update/{id}',[BukuController::class, 'update']);
Route::get('/buku/delete/{id}',[BukuController::class, 'destroy']);
Route::get('/buku/bukuPDF',[BukuController::class, 'bukuPDF']);
Route::get('/buku/pdfshow/{id}',[BukuController::class, 'bukuPDF_show']);
Route::get('/buku/export/',[BukuController::class, 'exportBuku']);

Route::get('/pengembalian',[PengembalianController::class, 'index']);

});