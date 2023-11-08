<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    //mapping table
    protected $table = 'buku';
    //mapping kolom atau field
    protected $fillable = [
        'kode','judulbuku','penulis','isbn','th_terbit','ket','foto','ketgori_id','penerbit_id'
    ];
    public $timestamps = false;
    //relasi antara table

    // public function kategori(){
    //     return $this->belongsTo(Kategori::class);
    // }
}
