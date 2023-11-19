<?php

namespace App\Exports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class BukuExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Buku::all();
        $buku = Buku::join('kategori','kategori_id','=','kategori.id')
        ->join('penerbit','penerbit_id','=','penerbit.id')
        ->select('buku.kode','buku.judulbuku','buku.penulis','buku.isbn','buku.th_terbit','kategori.nama as kategori','penerbit.nama as penerbit')
        ->get();
        return $buku;
    }
    public function headings(): array{
        return ["Kode","Judul Buku","Penulis","ISBN","Tahun Terbit","Kategori","Penerbit"];
    }
}
