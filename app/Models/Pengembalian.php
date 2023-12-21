<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
