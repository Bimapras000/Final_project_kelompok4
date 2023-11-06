<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

        
        protected $table = 'anggota';
        
        protected $fillable = [
            'nama','alamat','no_tlp','tanggal_bergabung','email','username','password'
        ];
        
    
        public function peminjaman(){
            return $this->hasMany(Peminjaman::class);
        }
}
