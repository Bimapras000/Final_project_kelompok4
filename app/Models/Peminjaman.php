<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Peminjaman extends Model
{
    use HasFactory;
    //mapping table
    protected $table = 'peminjaman';
    //mapping kolom atau field
    protected $fillable = [
        'kode','tgl_peminjaman','tgl_pengembalian','status','users_id','buku_id','konfirmasi','denda'
    ];
    public $timestamps = false;
    //relasi antara table

    // public function kategori(){
    //     return $this->belongsTo(Kategori::class);
    // }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function buku(){
        return $this->belongsTo(Buku::class);
    }
    public function peminjaman(){
        return $this->hasMany(Peminjaman::class);
    }

    // public function hitungDenda($tglPengembalianAktual)
    //     {
    //         $tglPengembalianHarusnya = Carbon::createFromFormat('Y-m-d', $this->tgl_pengembalian);
    //         $keterlambatan = $tglPengembalianAktual->diffInDays($tglPengembalianHarusnya, false);
        
    //         $tarifDenda = 5000; // Ganti dengan tarif denda per hari
    //         $totalDenda = $keterlambatan > 0 ? $keterlambatan * $tarifDenda : 0;
        
    //         return $totalDenda;
    //     }
}
