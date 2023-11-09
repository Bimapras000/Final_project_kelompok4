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
    return view('welcome');
});

Route::get('/dashboard',[DashboardController::class, 'index']);


Route::resource('anggota',AnggotaController::class);
Route::get('/petugas',[PetugasController::class, 'index']);
Route::get('admin/buku',[BukuController::class, 'index']);
Route::get('admin/buku/create',[BukuController::class, 'create']);
Route::post('admin/buku/store',[BukuController::class, 'store']);
Route::get('/Pengembalian',[PengembalianController::class, 'index']);
Route::get('admin/buku/show/{id}',[BukuController::class, 'show']);
Route::get('admin/buku/edit/{id}',[BukuController::class, 'edit']);
Route::post('admin/buku/update/{id}',[BukuController::class, 'update']);
Route::get('admin/buku/delete/{id}',[BukuController::class, 'destroy']);