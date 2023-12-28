<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Pengembalian;
use App\Models\Buku;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengembalianExport;
use Carbon\Carbon;

use PDF;
use DB;

class PengembalianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pengembalian = Pengembalian::all();
        // return view ('admin.pengembalian.index', compact('pengembalian'));
        $buku = DB::table('buku')->get();
        $user = DB::table('users')->get();
        // $peminjaman = Peminjaman::join('users', 'users_id', '=', 'users.id')
        //     ->join('buku', 'buku_id', '=', 'buku.id')
        //     ->select('peminjaman.*', 'users.id as users', 'buku.judulbuku as buku')
        //     ->get();
        // return view ('admin.peminjaman.index', compact('peminjaman','buku','users'));
        $pengembalian = Pengembalian::join('users', 'users.id', '=', 'pengembalian.users_id')
        ->join('buku', 'buku.id', '=', 'pengembalian.buku_id')
        ->select('pengembalian.*', 'users.name as nama_peminjam', 'buku.judulbuku as judul_buku')
        ->get();
        return view ('admin.pengembalian.index', compact('pengembalian','buku','user'));
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        DB::table('riwayat_peminjaman')->insert([
            'kode' => $request->kode,
            'users_id' => $request->users_id,
            'tgl_peminjaman' => $request->tgl_peminjaman,
            'tgl_pengembalian' => $request->tgl_pengembalian,
            'buku_id' => $request->buku_id,
            'status' => $request->status,
            'denda' => $request->denda,

        ]);
        return redirect('admin/pengembalian')->with('success', 'Berhasil Menambahkan Pengembalian');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('pengembalian')->where('id',$id)->delete();
        return redirect('admin/pengembalian')->with('success', 'Pengembalian Berhasil Dihapus!');;
    }

    public function pengembalianPDF(){
        $buku = DB::table('buku')->get();
        $user = DB::table('users')->get();

        $pengembalian = Pengembalian::join('users', 'users.id', '=', 'pengembalian.users_id')
        ->join('buku', 'buku.id', '=', 'pengembalian.buku_id')
        ->select('pengembalian.*', 'users.name as nama_peminjam', 'buku.judulbuku as judul_buku')
        ->get();
        $pdf = PDF::loadView('admin.pengembalian.pengembalianPDF', ['pengembalian' => $pengembalian])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function exportPengembalian(){
        
        return Excel::download(new PengembalianExport, 'pengembalian.xlsx');
    }

}