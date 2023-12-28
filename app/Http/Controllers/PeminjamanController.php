<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PeminjamanExport;
use PDF;


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
                
            ]);
            $defaultDenda = 0;

        DB::table('peminjaman')->insert([
        'kode' => $request->kode,
        'users_id' => $request->users_id,
        'tgl_peminjaman' => $request->tgl_peminjaman,
        'tgl_pengembalian' => $request->tgl_pengembalian,
        'buku_id' => $request->buku_id,
        'status' => $request->status = 'pinjam',
        'konfirmasi' => $request->konfirmasi,
        'denda' => $defaultDenda,

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
        $peminjaman = Peminjaman::findOrFail($id);
    
        $request->validate([
            'buku_id' => 'required',
            'tgl_peminjaman' => 'required',
            'tgl_pengembalian' => 'required',
            'users_id' => 'required',
            'denda' => 'nullable',
        ], [
            'buku_id.required' => 'Judul Buku wajib diisi',
            'tgl_peminjaman.required' => 'Tanggal peminjaman wajib diisi',
            'tgl_pengembalian.required' => 'Tanggal pengembalian wajib diisi',
            'users_id.required' => 'Nama peminjam wajib diisi',

        ]);
    
        // Simpan perubahan pada peminjaman
        $peminjaman->update([
            'kode' => $request->kode,
            'users_id' => $request->users_id,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'buku_id' => $request->buku_id,
            'status' => $request->status,
            'konfirmasi' => $request->konfirmasi,
            'denda' => $request->denda,
        ]);
    
        // Pindahkan ke tabel pengembalian jika status "Kembali"
        if ($request->status === 'Kembali') {
            // Insert ke tabel pengembalian
            Pengembalian::create([
                'kode' => $request->kode,
                'users_id' => $request->users_id,
                'tgl_peminjaman' => $request->tgl_peminjaman,
                'tgl_pengembalian' => $request->tgl_pengembalian,
                'buku_id' => $request->buku_id,
                'status' => $request->status,
                'buku_kembali' => now()->toDateString(),
                'denda' => $request->denda,
            ]);
    
            // Hapus dari tabel peminjaman
            $peminjaman->delete();
        }
    
        return redirect('admin/peminjaman')->with('success', 'Berhasil Edit Data Peminjaman');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('peminjaman')->where('id',$id)->delete();
        return redirect('admin/peminjaman')->with('success', 'Peminjaman Berhasil Dihapus!');;
    }

    public function peminjamanPDF(){
        $buku = DB::table('buku')->get();
        $users = DB::table('users')->get();

        $peminjaman = Peminjaman::join('users', 'users.id', '=', 'peminjaman.users_id')
        ->join('buku', 'buku.id', '=', 'peminjaman.buku_id')
        ->select('peminjaman.*', 'users.name as nama_peminjam', 'buku.judulbuku as judul_buku')
        ->get();
        $pdf = PDF::loadView('admin.peminjaman.peminjamanPDF', ['peminjaman' => $peminjaman])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function exportPeminjaman(){
        
        return Excel::download(new PeminjamanExport, 'peminjaman.xlsx');
    }

}
