<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Pengembalian extends Model
{
    use HasFactory;

        
        protected $table = 'pengembalian';
        
        protected $fillable = [
            'kode','tgl_peminjaman','tgl_pengembalian','status','users_id','buku_id','denda','buku_kembali'
        ];
        public $timestamps = false;
    
        public function peminjaman(){
            return $this->belongsTo(Peminjaman::class);
        }
        public function users(){
            return $this->belongsTo(User::class);
        }
        public function buku(){
            return $this->belongsTo(Buku::class);
        }

        // public function hitungDenda($tglPengembalianAktual)
        // {
        //     $tglPengembalianHarusnya = Carbon::createFromFormat('Y-m-d', $this->tgl_pengembalian);
        //     $keterlambatan = $tglPengembalianAktual->diffInDays($tglPengembalianHarusnya, false);
        
        //     $tarifDenda = 5000; // Ganti dengan tarif denda per hari
        //     $totalDenda = $keterlambatan > 0 ? $keterlambatan * $tarifDenda : 0;
        
        //     return $totalDenda;
        // }
}
