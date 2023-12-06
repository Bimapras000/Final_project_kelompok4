<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Kategori;
use DB;



class UserController extends Controller
{
    //
    // public function index(){
    //     $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
    //     ->join('kategori','kategori_id','=','kategori.id')
    //     ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
    //     ->get();
    //     return view ('user', compact('buku'));
    // }

    // public function search(Request $request){
    //     $keyword = $request->input('cari');
    //     $buku = Buku::where('judulbuku','like', "%".keyword."%")->pagination(3);

    //     return view ('user', compact('buku'));
    // }


    // public function index()
    // {
    //     $buku = Buku::paginate(5); // Ganti nilai paginasi dengan sesuai kebutuhan Anda
    //     return view('user', compact('buku'));
    // }

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('s');
    //     $buku = Buku::where('judulbuku', 'like', "%$keyword%")->paginate(5); // Ganti nilai paginasi sesuai kebutuhan

    //     return view('user', compact('buku'));
    // }

    // public function index(Request $request){
    //     if($request){
    //         $judul = $request -> judul;
    //         $buku = buku::where('judulbuku', 'like', '%'.$judul.'%')->paginate(5);
    //         return view('user', compact('buku'));
    //     } else {
    //         $buku = buku::paginate(5);
    //         return view('user', compact('buku'));
    //     }
    // }

    public function index(Request $request){

        // $kategori = DB::table('kategori')->get();
        // return view ('tampiluser', compact('kategori'));

        $judul = $request->input('judul'); // Mengambil nilai dari input 'judul'
    
        if($judul){ // Jika 'judul' ada dalam request
            $buku = Buku::where('judulbuku', 'like', '%'.$judul.'%')->paginate(5);
        } else {
            $buku = Buku::paginate(5);
        }
    
        return view('tampiluser', compact('buku'));
    }
    


}


