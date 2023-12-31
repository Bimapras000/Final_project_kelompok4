<?php

namespace App\Imports;

use App\Models\Buku;
use Maatwebsite\Excel\Concerns\ToModel;

class BukuImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Buku([
            //
            'kode' => $row[1],
            'judulbuku' => $row[2],
            'penulis' => $row[3],
            'isbn' => $row[4],
            'th_terbit' => $row[5],
            'kategori' => $row[6],
            'penerbit' => $row[7],
        ]);
    }
}
