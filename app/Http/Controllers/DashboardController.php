<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Petugas;
// use App\Models\Peminjaman;
use App\Models\Pengembalian;
use DB;

class DashboardController extends Controller
{
    //fungsi index 
    public function index(){
        $anggota = Anggota::count();
        $buku = Buku::count();
        $kategori = Kategori::count();
        $petugas = Petugas::count();
        // $peminjaman = Peminjaman::count();
        $pengembalian = Pengembalian::count();
        $judulbuku = DB::table('buku')
        ->selectRaw('judulbuku, count(judulbuku) as jumlah')
        ->groupBy('judulbuku')
        ->get();
        $hitung_anggota = DB::table('anggota')->select('nama', 'tgl_bergabung')->get();

        return view('admin.dashboard', compact('anggota', 'buku', 'kategori', 'petugas', 'pengembalian', 'judulbuku', 'hitung_anggota'));

    }
}
