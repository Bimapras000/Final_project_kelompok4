<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penerbit;
use Illuminate\Support\Facades\DB;

class PenerbitController extends Controller
{
    //
    public function index()
    {
        //
        $penerbit = DB::table('penerbit')->get();
        return view ('admin.penerbit.index', compact('penerbit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $penerbit = DB::table('penerbit')->get();
        // return view ('admin.penerbit.create', compact('penerbit'));
        return view ('admin.penerbit.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $request->validate([

        'nama' => 'required|unique:penerbit|max:50',
    ],
    [
        'nama.unique' => 'nama penerbit sudah terisi pada data lain',
        'nama.required' => 'nama penerbit wajib diisi',
        'nama.max' => 'Nama penerbit maksimal 50 karakter',
    ]   
    
    );

    // Masukkan data buku ke tabel buku
    DB::table('penerbit')->insert([
        'nama' => $request->nama,
    ]);

    // Redirect ke halaman admin/buku setelah selesai
    return redirect('admin/penerbit')->with('success', 'Berhasil Menambahkan Penerbit');
    }

    public function edit(string $id)
    {
        //
        $penerbit = DB::table('penerbit')->where('id',$id)->get();
        return view ('admin.penerbit.edit', compact('penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'nama' => 'required|max:50',
    ],
    [
        'nama.unique' => 'nama penerbit sudah terisi pada data lain',
        'nama.required' => 'nama penerbit wajib diisi',
        'nama.max' => 'Nama penerbit maksimal 50 karakter',
        
    ]   
    
    );

    DB::table('penerbit')->where('id', $request->id)->update([
        'nama' => $request->nama,
    ]);

    return redirect('admin/penerbit')->with('success', 'Berhasil Mengedit Penerbit');;
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('penerbit')->where('id', $id)->delete();
        return redirect('admin/penerbit')->with('success', 'Data Penerbit Berhasil DiHapus!');;
    }

}
