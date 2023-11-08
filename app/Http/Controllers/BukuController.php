<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buku = DB::table('buku')->get();
        return view ('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $buku = DB::table('buku')->get();

        return view ('admin.buku.create', compact('buku'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $buku = new Buku;
        $buku->kode = $request->kode;
        $buku->judulbuku = $request->judulbuku;
        $buku->penulis = $request->penulis;
        $buku->isbn = $request->isbn;
        $buku->th_terbit = $request->th_terbit;
        $buku->ket = $request->ket;
        $buku->foto = $request->foto;
        $buku->kategori_id = $request->kategori_id;
        $buku->penerbit_id = $request->penerbit_id;
        $buku->save();
        return redirect('admin/buku');
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
