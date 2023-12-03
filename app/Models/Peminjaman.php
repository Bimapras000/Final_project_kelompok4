<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    //mapping table
    protected $table = 'peminjaman';
    //mapping kolom atau field
    protected $fillable = [
        'kode','tgl_peminjaman','tgl_pengembalian','status','anggota_id','buku_id','petugas_id'
    ];
    public $timestamps = false;
    //relasi antara table

    // public function kategori(){
    //     return $this->belongsTo(Kategori::class);
    // }
}
