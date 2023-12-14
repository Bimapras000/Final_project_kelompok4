<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Http\Resources\BukuResource;
use Illuminate\Support\Facades\Validator;

class BukuController extends Controller
{
    //
    public function index(){
        $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
        ->join('kategori','kategori_id','=','kategori.id')
        ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
        ->get();
        return new BukuResource(true, 'Data Buku', $buku);
    }
    public function show($id){
        $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
        ->join('kategori','kategori_id','=','kategori.id')
        ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
        ->where('buku.id', $id)
        ->get();
        return new BukuResource(true, 'Detail Buku', $buku);
    }
    public function store(Request $request){
        // $request->validate([
            $validator = Validator::make($request->all(),[
            'judulbuku' => 'required|max:45',
            'penulis' => 'required|max:45',
            'isbn' => 'required|max:45',
            'th_terbit' => 'required|numeric',
            'ket' => 'nullable|string|min:10',
            'kategori_id' => 'required|integer',
            'penerbit_id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 442);
        }
        DB::table('buku')->insert([
            'kode' => $request->kode,
            'judulbuku' => $request->judulbuku,
            'penulis' => $request->penulis,
            'isbn' => $request->isbn,
            'th_terbit' => $request->th_terbit,
            'ket' => $request->ket,
            'foto' => $request->foto,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
        ]);
        return new BukuResource(true, 'Data Buku Berhasil Ditambahkan', 'buku');
    }
    public function update(Request $request, $id){
        $validator = Validator::make($request->all(),[
            'kode' => 'required|max:10',
            'judulbuku' => 'required|max:45',
            'penulis' => 'required|max:45',
            'isbn' => 'required|max:45',
            'th_terbit' => 'required|numeric',
            'ket' => 'nullable|string|min:10',
            'kategori_id' => 'required|integer',
            'penerbit_id' => 'required|integer',
        ]);
        if ($validator->fails()){
            return response()->json($validator->errors(), 442);
        }
        $buku = Buku::whereId($id)->update([
            'kode' => $request->kode,
            'judulbuku' => $request->judulbuku,
            'penulis' => $request->penulis,
            'isbn' => $request->isbn,
            'th_terbit' => $request->th_terbit,
            'ket' => $request->ket,
            'foto' => $request->foto,
            'kategori_id' => $request->kategori_id,
            'penerbit_id' => $request->penerbit_id,
        ]);
        return new BukuResource(true, 'Data Berhasil Diupdate', $buku);
    }
    public function destroy($id){
        $buku = Buku::whereId($id)->first();
        $buku->delete();
        return new BukuResource(true, 'Data Berhasil Dihapus', $buku);
    }
}
