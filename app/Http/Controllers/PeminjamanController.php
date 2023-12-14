<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buku = DB::table('buku')->get();
        $users = DB::table('users')->get();
        // $peminjaman = Peminjaman::join('users', 'users_id', '=', 'users.id')
        //     ->join('buku', 'buku_id', '=', 'buku.id')
        //     ->select('peminjaman.*', 'users.id as users', 'buku.judulbuku as buku')
        //     ->get();
        // return view ('admin.peminjaman.index', compact('peminjaman','buku','users'));
        $peminjaman = Peminjaman::join('users', 'users.id', '=', 'peminjaman.users_id')
        ->join('buku', 'buku.id', '=', 'peminjaman.buku_id')
        ->select('peminjaman.*', 'users.name as nama_peminjam', 'buku.judulbuku as judul_buku')
        ->get();
        return view ('admin.peminjaman.index', compact('peminjaman','buku','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
            $request->validate([
                'kode' => 'required|unique:peminjaman|max:45',
                'buku_id' => 'required',
                'tgl_peminjaman' => 'required',
                'tgl_pengembalian' => 'required',
                'users_id' => 'required',


    
            ],
            [
                'kode.unique' => 'kode peminjaman sudah terisi pada data lain',
                'kode.required' => 'kode peminjaman wajib diisi',
                'kode.max' => 'kode peminjaman maksimal 45 karakter',
                
            ]   
            
            );

        DB::table('peminjaman')->insert([
        'kode' => $request->kode,
        'users_id' => $request->users_id,
        'tgl_peminjaman' => $request->tgl_peminjaman,
        'tgl_pengembalian' => $request->tgl_pengembalian,
        'buku_id' => $request->buku_id,
        'status' => $request->status = 'pinjam',
        'konfirmasi' => $request->konfirmasi,

        ]);
        return redirect('admin/peminjaman')->with('success', 'Berhasil Menambahkan Peminjaman');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $buku = DB::table('buku')->get();
        $users = DB::table('users')->get();
        $peminjaman = DB::table('peminjaman')->where('id',$id)->get();
        return view ('admin.peminjaman.edit', compact('peminjaman','buku','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'buku_id' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'users_id' => 'required',



        ],
        [
            
            'buku_id.required' => 'Judul Buku wajib diisi',
            'tgl_peminjaman.required' => 'Tanggal peminjaman wajib diisi',
            'tgl_peminjaman.required' => 'Tanggal peminjaman wajib diisi',
            'users_id.required' => 'Nama peminjam wajib diisi',

            
        ]);


        DB::table('peminjaman')->where('id', $request->id)->update([
            'kode' => $request->kode,
            'users_id' => $request->users_id,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'buku_id' => $request->buku_id,
            'status' => $request->status,
            'konfirmasi' => $request->konfirmasi,
        ]);
        return redirect('admin/peminjaman')->with('success', 'Berhasil Edit Data Peminjaman');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
