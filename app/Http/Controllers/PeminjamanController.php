<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $peminjaman = Peminjaman::join('anggota', 'anggota_id', '=', 'anggota.id')
            ->join('buku', 'buku_id', '=', 'buku.id')
            ->join('pengembalian', 'pengembalian_id', '=', 'pengembalian.id')
            ->select('peminjaman.*', 'anggota.nama as anggota', 'buku.judulbuku as buku', 'pengembalian.tgl_pengembalian as pengembalian')
            ->get();
        return view ('admin.peminjaman.index', compact('peminjaman'));
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
    }
}
