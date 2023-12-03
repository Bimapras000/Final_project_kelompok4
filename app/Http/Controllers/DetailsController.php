<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class DetailsController extends Controller
{
    //
    public function details($id){
        // $buku = Buku::find($id);
        $buku = Buku::join('penerbit','penerbit_id','=','penerbit.id')
        ->join('kategori','kategori_id','=','kategori.id')
        ->select('buku.*','penerbit.nama as penerbit','kategori.nama as kategori')
        ->where('buku.id', $id)
        ->get();
        return view ('details', compact('buku'));
    }
}
