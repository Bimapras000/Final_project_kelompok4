<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $kategori = DB::table('kategori')->get();
        return view ('admin.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $buku = DB::table('kategori')->get();
        return view ('admin.kategori.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'id' => 'required|unique:kategori|max:45',
        'nama' => 'required|max:45',
    ],
    [
        'id.max' => 'id kategori maximal 45 karakter',
        'id.required' => 'id kategori wabjib diisi',
        'id.unique' => 'id kategori sudah terisi pada data lain',
        'nama.required' => 'nama kategori wajib diisi',
        'nama.max' => 'Nama kategori maksimal 45 karakter',
    ]   
    
    );

    // Masukkan data buku ke tabel buku
    DB::table('kategori')->insert([
        'id' => $request->id,
        'nama' => $request->nama,
    ]);

    // Redirect ke halaman admin/buku setelah selesai
    return redirect('admin/kategori');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $buku = DB::table('kategori')
        ->where('kategori.id', $id)
        ->get();
        return view ('admin.kategori.detail', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $buku = DB::table('kategori')->where('id',$id)->get();
        return view ('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'id' => 'required|unique:kategori|max:45',
        'nama' => 'required|max:45',
    ],
    [
        'id.max' => 'id kategori maximal 45 karakter',
        'id.required' => 'id kategori wabjib diisi',
        'id.unique' => 'id kategori sudah terisi pada data lain',
        'nama.required' => 'nama kategori wajib diisi',
        'nama.max' => 'Nama kategori maksimal 45 karakter',
        
    ]   
    
    );

    DB::table('kategori')->where('id', $request->id)->update([
        'id' => $request->id,
        'nama' => $request->nama,
    ]);

    return redirect('admin/kategori');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('kategori')->where('id', $id)->delete();
        return redirect('admin/kategori');
    }
}