<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;

        
        protected $table = 'Pengembalian';
        
        protected $fillable = [
            'tgl_pengembalian','denda','peminjaman_id','petugas_id'
        ];
        
    
        public function peminjaman(){
            return $this->hasMany(Peminjaman::class);
        }
}
