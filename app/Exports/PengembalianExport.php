<?php

namespace App\Exports;

use App\Models\Pengembalian;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class PengembalianExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Buku::all();
        $pengembalian = Pengembalian::join('users', 'users.id', '=', 'pengembalian.users_id')
        ->join('buku', 'buku.id', '=', 'pengembalian.buku_id')
        ->select('pengembalian.kode','users.name as nama_peminjam','buku.judulbuku as judul_buku','pengembalian.tgl_peminjaman','pengembalian.tgl_pengembalian','pengembalian.status','pengembalian.buku_kembali','pengembalian.denda')
        ->get();
        return $pengembalian;
    }
    public function headings(): array{
        return ["Kode","Nama Peminjam","Judul Buku","Tanggal Peminjaman","Tanggal Pengembalian","Status","Buku Kembali","Denda"];
    }
}
