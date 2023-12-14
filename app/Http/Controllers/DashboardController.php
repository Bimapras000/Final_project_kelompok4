<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Petugas;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use DB;

class DashboardController extends Controller
{
    //fungsi index 
    public function index(){
        $users = User::count();
        $buku = Buku::count();
        $kategori = Kategori::count();
        $petugas = Petugas::count();
        $peminjaman = Peminjaman::count();
        $pengembalian = Pengembalian::count();
        // $penerbit_id = DB::table('buku')
        // ->selectRaw('penerbit_id, count(penerbit_id) as jumlah')
        // ->groupBy('penerbit_id')
        // ->get();
        $penerbit_info = Buku::join('penerbit', 'buku.penerbit_id', '=', 'penerbit.id')
        ->selectRaw('penerbit.nama, count(buku.penerbit_id) as jumlah')
        ->groupBy('buku.penerbit_id', 'penerbit.nama')
        ->get();
        $kategori_info = Buku::join('kategori', 'buku.kategori_id', '=', 'kategori.id')
        ->select('kategori.nama as nama', DB::raw('COUNT(buku.id) as total'))
        ->groupBy('kategori.nama')
        ->get();
        return view('admin.dashboard', compact('users', 'buku', 'kategori', 'petugas', 'pengembalian','penerbit_info', 'kategori_info'));

    }
}
