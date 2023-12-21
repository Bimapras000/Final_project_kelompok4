<?php

namespace App\Exports;

use App\Models\Peminjaman;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;


class PeminjamanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Buku::all();
        $peminjaman = Peminjaman::join('users', 'users.id', '=', 'peminjaman.users_id')
        ->join('buku', 'buku.id', '=', 'peminjaman.buku_id')
        ->select('peminjaman.kode','users.name as nama_peminjam','peminjaman.tgl_peminjaman','peminjaman.tgl_pengembalian','buku.judulbuku as judul_buku','peminjaman.status','peminjaman.konfirmasi')
        ->get();
        return $peminjaman;
    }
    public function headings(): array{
        return ["Kode","Nama Peminjam","Tanggal Peminjaman","Tanggal Pengembalian","Judul Buku","Status","Konformasi"];
    }
}
