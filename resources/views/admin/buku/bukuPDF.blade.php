<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <style>
        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px 12px;
            text-align: center;
            border: 1px solid #ccc;
        }
        th {
            background-color: #f2f2f2;
        }
        h3 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h3>Data Buku</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>ISBN</th>
                <th>Tahun Terbit</th>
                <th>Keterangan</th>
                <th>Kategori ID</th>
                <th>Penerbit ID</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($buku as $buku)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$buku->kode}}</td>
                <td>{{$buku->judulbuku}}</td>
                <td>{{$buku->penulis}}</td>
                <td>{{$buku->isbn}}</td>
                <td>{{$buku->th_terbit}}</td>
                <td>{{$buku->ket}}</td>
                <td>{{$buku->kategori_id}}</td>
                <td>{{$buku->penerbit_id}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
