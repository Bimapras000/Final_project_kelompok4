<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PenerbitController;

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

Route::get('/', [LandingController::class, 'index']);
Route::get('/details/{id}',[DetailsController::class, 'details'])->name('details');

Route::get('/',[LandingController::class, 'index']);
Route::get('details/{id}',[DetailsController::class, 'details'])->name('details');

// Route::group(['middleware' => ['auth', 'role:user']], function(){
Route::middleware(['role:anggota'])->group(function () {
    // Route::resource('user', UserController::class);
    Route::get('/user',[UserController::class, 'index']);
    Route::get('/user/pinjamBuku',[UserController::class, 'pinjam']);
    Route::get('/user/create/{id}',[UserController::class, 'create']);
    Route::post('/user/store',[UserController::class, 'store']);

    Route::get('/userprofile', [UserController::class, 'showuserprofile'])->name('profileuser.show');
    Route::patch('/user/profile/{id}', [UserController::class, 'updateuserprofil'])->name('profiluser.update');

    Route::get('/password', [UserController::class, 'showpass'])->name('user.show');
    Route::patch('/password/update', [UserController::class, 'updatepass'])->name('user.update');
});

//route sementara api
Route::get('/bukuapi', [BukuController::class, 'apiBuku']);
Route::get('/bukuapi/{id}', [BukuController::class, 'apiBukuDetail']);

// Route::get('/user',[DashboardController::class, 'index']);

// Custum Authenticate 
Route::get('/login', [AuthController::class, 'showlogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'role:admin-petugas']], function(){
Route::prefix('admin')->group(function(){

Route::get('/dashboard',[DashboardController::class, 'index']);
Route::get('/profile', [DashboardController::class, 'showprofile'])->name('profile.show');
Route::patch('/profile/{id}', [DashboardController::class, 'updateprofil'])->name('profil.update');
Route::get('/reset', [DashboardController::class, 'show'])->name('reset.show');
Route::patch('/reset/update', [DashboardController::class, 'update'])->name('reset.update');



// route anggota
Route::get('/anggota',[AnggotaController::class, 'index']);
Route::get('/anggota/create',[AnggotaController::class, 'create']);
Route::post('/anggota/store',[AnggotaController::class, 'store']);
Route::get('/anggota/show/{id}',[AnggotaController::class, 'show']);
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
Route::get('/pengembalian/delete/{id}',[PengembalianController::class, 'destroy']);
Route::get('/pengembalian/pengembalianPDF',[PengembalianController::class, 'pengembalianPDF']);
Route::get('/pengembalian/export/',[PengembalianController::class, 'exportpengembalian']);

//Route Petugas
Route::get('/petugas',[PetugasController::class, 'index']);
Route::get('/petugas/create',[PetugasController::class, 'create']);
Route::post('/petugas/store',[PetugasController::class, 'store']);
Route::get('/petugas/show/{id}',[PetugasController::class, 'show']);
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

//Route Penerbit
Route::get('/penerbit',[PenerbitController::class, 'index']);
Route::get('/penerbit/create',[PenerbitController::class, 'create']);
Route::post('/penerbit/store',[PenerbitController::class, 'store']);
Route::get('/penerbit/edit/{id}',[PenerbitController::class, 'edit']);
Route::post('/penerbit/update/{id}',[PenerbitController::class, 'update']);
Route::get('/penerbit/delete/{id}',[PenerbitController::class, 'destroy']);

// Route Peminjaman
Route::get('/peminjaman',[PeminjamanController::class, 'index']);
Route::get('/peminjaman/create',[PeminjamanController::class, 'create']);
Route::post('/peminjaman/store',[PeminjamanController::class, 'store']);
Route::get('/peminjaman/edit/{id}',[PeminjamanController::class, 'edit']);
Route::post('/peminjaman/update/{id}',[PeminjamanController::class, 'update']);
Route::get('/peminjaman/delete/{id}',[PeminjamanController::class, 'destroy']);
Route::get('/peminjaman/peminjamanPDF',[PeminjamanController::class, 'peminjamanPDF']);
Route::get('/peminjaman/export/',[PeminjamanController::class, 'exportpeminjaman']);


});
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');