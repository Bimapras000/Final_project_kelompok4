<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\BukuExport;
use PDF;
use App\Imports\BukuImport;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
        ->join('kategori','kategori_id','=','kategori.id')
        ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
        ->get();
        return view ('admin.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kategori = DB::table('kategori')->get();
        $penerbit = DB::table('penerbit')->get();
        return view ('admin.buku.create', compact('kategori','penerbit'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'kode' => 'required|unique:buku|max:45',
        'judulbuku' => 'required|max:45',
        'penulis' => 'required|max:45',
        'isbn' => 'required|max:45',
        'th_terbit' => 'required|numeric',
        'ket' => 'nullable|string|min:10',
        'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
        'kategori_id' => 'required|integer',
        'penerbit_id' => 'required|integer',
    ],
    [
        'kode.max' => 'Kode maximal 45 karakter',
        'kode.required' => 'Kode wabjib diisi',
        'kode.unique' => 'Kode sudah terisi pada data lain',
        'judulbuku.required' => 'Judul buku wajib diisi',
        'judulbuku.max' => 'Judul buku maksimal 45 karakter',
        'penulis.required' => 'Penulis wajib diisi',
        'penulis.max' => 'Penulis maksimal 45 karakter',
        'isbn.required' => 'ISBN wajib diisi',
        'isbn.max' => 'ISBN maksimal 45 karakter',
        'th_terbit.required' => 'Th Terbit wajib diisi',
        'th_terbit.numeric' => 'Th Terbit harus diisi dengan angka',
        'ket.min' => 'Keterangan minimal diisi 10 kata',
        'foto.max' => 'Maksimal 2 MB',
        'foto.image' => 'File ekstensi harus jpg,jpeg,gif,svg',
        'kategori_id.required' => 'Kategori ID harus diisi',
        'penerbit_id.required' => 'Penerbit ID harus diisi',
        
    ]   
    
    );

    // Jika ada foto diunggah
    if (!empty($request->foto)) {
        // Buat nama unik untuk file foto
        $fileName = 'foto-' . uniqid() . '.' . $request->foto->extension();
        
        // Pindahkan file foto ke direktori yang ditentukan
        $request->foto->move(public_path('admin/img'), $fileName);
    } else {
        $fileName = ''; // Jika tidak ada foto diunggah, atur nama file kosong
    }

    // Masukkan data buku ke tabel buku
    DB::table('buku')->insert([
        'kode' => $request->kode,
        'judulbuku' => $request->judulbuku,
        'penulis' => $request->penulis,
        'isbn' => $request->isbn,
        'th_terbit' => $request->th_terbit,
        'ket' => $request->ket,
        'foto' => $fileName,
        'kategori_id' => $request->kategori_id,
        'penerbit_id' => $request->penerbit_id,
    ]);

    // Redirect ke halaman admin/buku setelah selesai
    return redirect('admin/buku')->with('success', 'Berhasil Menambahkan Data Baru!');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
        ->join('kategori','kategori_id','=','kategori.id')
        ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
        ->where('buku.id', $id)
        ->get();
        return view ('admin.buku.detail', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $kategori = DB::table('kategori')->get();
        $penerbit = DB::table('penerbit')->get();
        $buku = DB::table('buku')->where('id',$id)->get();
        return view ('admin.buku.edit', compact('buku','kategori','penerbit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $request->validate([
        'judulbuku' => 'required|max:45',
        'penulis' => 'required|max:45',
        'isbn' => 'required|max:45',
        'th_terbit' => 'required|numeric',
        'ket' => 'nullable|string|min:10',
        'foto' => 'nullable|image|mimes:jpg,jpeg,gif,png,svg|max:2048',
        'kategori_id' => 'required|integer',
        'penerbit_id' => 'required|integer',
    ],
    [
        'judulbuku.required' => 'Judul buku wajib diisi',
        'judulbuku.max' => 'Judul buku maksimal 45 karakter',
        'penulis.required' => 'Penulis wajib diisi',
        'penulis.max' => 'Penulis maksimal 45 karakter',
        'isbn.required' => 'ISBN wajib diisi',
        'isbn.max' => 'ISBN maksimal 45 karakter',
        'th_terbit.required' => 'Th Terbit wajib diisi',
        'th_terbit.numeric' => 'Th Terbit harus diisi dengan angka',
        'ket.min' => 'Keterangan minimal diisi 10 kata',
        'foto.max' => 'Maksimal 2 MB',
        'foto.image' => 'File ekstensi harus jpg,jpeg,gif,svg',
        'kategori_id.required' => 'Kategori ID harus diisi',
        'penerbit_id.required' => 'Penerbit ID harus diisi',
        
    ]   
    
    );
   
   
    $fileName = '';

    if (!empty($request->foto)) {
        // Proses foto baru
        $fileName = 'foto-' . $request->id . '.' . $request->foto->extension();
        $request->foto->move(public_path('admin/img'), $fileName);
    }

    DB::table('buku')->where('id', $request->id)->update([
        'kode' => $request->kode,
        'judulbuku' => $request->judulbuku,
        'penulis' => $request->penulis,
        'isbn' => $request->isbn,
        'th_terbit' => $request->th_terbit,
        'ket' => $request->ket,
        'foto' => $fileName,
        'kategori_id' => $request->kategori_id,
        'penerbit_id' => $request->penerbit_id,
    ]);

    return redirect('admin/buku')->with('success', 'Berhasil Update Data!');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        DB::table('buku')->where('id', $id)->delete();
        return redirect('admin/buku')->with('success', 'Data Berhasil DiHapus!');
    }

    public function bukuPDF(){
        $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
        ->join('kategori','kategori_id','=','kategori.id')
        ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
        ->get();
        $pdf = PDF::loadView('admin.buku.bukuPDF', ['buku' => $buku])->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function bukuPDF_show(string $id){
        $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
        ->join('kategori','kategori_id','=','kategori.id')
        ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
        ->where('buku.id', $id)
        ->get();
        $pdf = PDF::loadView('admin.buku.bukuPDF_show', ['buku' => $buku]);
        return $pdf->stream();
    }

    public function exportBuku(){
        
        return Excel::download(new BukuExport, 'buku.xlsx');
    }
    public function importBuku(Request $request) 
    {
        // Excel::import(new ProdukImport, 'produk.xlsx');
        // $file = $request->file('file');
        // $nama_file = rand().$file->getClientOriginalName();
        // $file->move('file_excel', $nama_file);
        Excel::import(new BukuImport, $request->file('file')->store('temp'));
        
        return redirect('admin/buku')->with('success', 'Buku Berhasil Diimport!');
    }
}
