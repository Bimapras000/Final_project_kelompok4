<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Peminjaman;
use App\Models\User;
use DB;



class UserController extends Controller
{

    public function index(Request $request){

        $kategori = DB::table('kategori')->get();
        $penerbit = DB::table('penerbit')->get();
        // return view ('tampiluser', compact('kategori'));

        $judul = $request->input('judul'); // Mengambil nilai dari input 'judul'
    
        if($judul){ 
            // $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
            // ->join('kategori','kategori_id','=','kategori.id')
            // ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
            // ->where('buku.id', $id)
            // ->get();
            $buku = Buku::where('judulbuku', 'like', '%'.$judul.'%')->paginate(6);
        } else {
            $buku = Buku::paginate(6);
        }
    
        return view('tampiluser/tampiluser', compact('buku','kategori','penerbit'));
    }
    
    public function create(string $id)
    {
        //
        // $buku = Buku::all()->where('id', $id);
        $buku = DB::table('buku')->where('id',$id)->get();
        $user = DB::table('users')->get();
        $peminjaman = DB::table('peminjaman')->get();
        return view ('tampiluser/pinjam', compact('peminjaman', 'buku','user'));
        // return view('tampiluser/pinjam');
    }

    public function store(Request $request){
        $request->validate([
            'kode' => 'required|unique:peminjaman|max:45',
            'buku_id' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'user_id' => 'required',

        ],
        [
            'kode.unique' => 'kode peminjaman sudah terisi pada data lain',
            'kode.required' => 'kode peminjaman wajib diisi',
            'kode.max' => 'kode peminjaman maksimal 45 karakter',
            
        ]   
        
        );
    
        // DB::table('peminjaman')->insert([
        //     'kode' => $request->kode,
        //     'buku_id' => $request->buku_id,
        //     'tgl_peminjaman' => $request->tgl_peminjaman,
        //     'tgl_pengembalian' => $request->tgl_pengembalian,
        //     'user_id' => $request->auth()->user()->id,
        //     'status' => 'pinjam',
        //     'konfirmasi' => null, 
        // ]);

        $peminjaman = new Peminjaman();
        $peminjaman->kode = $request->kode;
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->tgl_peminjaman = $request->tgl_peminjaman;
        $peminjaman->tgl_pengembalian = $request->tgl_pengembalian;
        $peminjaman->users_id = $request->user()->id; // Mendapatkan ID pengguna yang login
        $peminjaman->status = 'pinjam';
        $peminjaman->konfirmasi = null; // Nilai konfirmasi default adalah null saat peminjaman dibuat
        $peminjaman->save();
        
        return redirect('user')->with('success', 'Berhasil Mengedit Kategori');;
    }

    public function pinjam()
    {
        $users_id = auth()->user()->id;

        $buku = DB::table('buku')->get();
        $users = DB::table('users')->get();
        $peminjaman = Peminjaman::where('users_id', $users_id)
        ->join('buku', 'buku_id', '=', 'buku.id')
        ->join('users', 'users_id', '=', 'users.id')
        ->select('peminjaman.*', 'buku.judulbuku as judul_buku','users.name as users')
        ->get();

        // $buku = DB::table('buku')->get();
        // $user = DB::table('users')->get();
        // $peminjaman = Peminjaman::join('users', 'user_id', '=', 'users.id')
        //     ->join('buku', 'buku_id', '=', 'buku.id')
        //     ->select('peminjaman.*', 'users.name as users', 'buku.judulbuku as buku')
        //     ->get();
        // return view ('admin.peminjaman.index', compact('peminjaman','buku','user'));

        return view('tampiluser/pinjaman', compact('peminjaman','buku','users'));
    }
}


