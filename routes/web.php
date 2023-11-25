<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\KategoriController;

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
Route::get('/anggota/anggotaPDF',[AnggotaController::class, 'anggotaPDF']);

//Route Buku
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
Route::post('/buku/import/', [BukuController::class, 'importBuku']);

//Route Pengembalian
Route::get('/pengembalian',[PengembalianController::class, 'index']);

//Route Petugas
Route::get('/petugas',[PetugasController::class, 'index']);
Route::get('/petugas/create',[PetugasController::class, 'create']);
Route::post('/petugas/store',[PetugasController::class, 'store']);
Route::get('/petugas/edit/{id}',[PetugasController::class, 'edit']);
Route::post('/petugas/update/{id}',[PetugasController::class, 'update']);
Route::get('/petugas/delete/{id}',[PetugasController::class, 'destroy']);
Route::get('/petugas/petugasPDF',[PetugasController::class, 'petugasPDF']);

//Route Kategori
Route::get('/kategori',[KategoriController::class, 'index']);
Route::get('/kategori/create',[KategoriController::class, 'create']);
Route::post('/kategori/store',[KategoriController::class, 'store']);
Route::get('/kategori/edit/{id}',[KategoriController::class, 'edit']);
Route::post('/kategori/update/{id}',[KategoriController::class, 'update']);
Route::get('/kategori/delete/{id}',[KategoriController::class, 'destroy']);
Route::get('/kategori/kategoriPDF',[KategoriController::class, 'kategoriPDF']);
});