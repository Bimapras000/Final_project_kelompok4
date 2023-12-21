<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use Illuminate\Support\Facades\DB;
use PDF;

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
        // $kategori = DB::table('kategori')->get();
        // return view ('admin.kategori.create', compact('kategori'));
        return view ('admin.kategori.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([

        'nama' => 'required|unique:kategori|max:45',
    ],
    [
        'nama.unique' => 'nama kategori sudah terisi pada data lain',
        'nama.required' => 'nama kategori wajib diisi',
        'nama.max' => 'Nama kategori maksimal 45 karakter',
    ]   
    
    );

    // Masukkan data buku ke tabel buku
    DB::table('kategori')->insert([
        'nama' => $request->nama,
    ]);

    // Redirect ke halaman admin/buku setelah selesai
    return redirect('admin/kategori')->with('success', 'Berhasil Menambahkan Kategori');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $kategori = DB::table('kategori')
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
        $kategori = DB::table('kategori')->where('id',$id)->get();
        return view ('admin.kategori.edit', compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'nama' => 'required|max:45',
    ],
    [
        'nama.unique' => 'nama kategori sudah terisi pada data lain',
        'nama.required' => 'nama kategori wajib diisi',
        'nama.max' => 'Nama kategori maksimal 45 karakter',
        
    ]   
    
    );

    DB::table('kategori')->where('id', $request->id)->update([
        'nama' => $request->nama,
    ]);

    return redirect('admin/kategori')->with('success', 'Berhasil Mengedit Kategori');;
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('kategori')->where('id', $id)->delete();
        return redirect('admin/kategori')->with('success', 'Kategori Berhasil DiHapus!');;
    }

    public function kategoriPDF(){
        $kategori = Kategori::get();
        $pdf = PDF::loadView('admin.kategori.kategoriPDF', ['kategori' => $kategori])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}