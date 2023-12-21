<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pengembalian</title>
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
    <h3>Data Pengembalian</h3>
    <table>
        <thead>
            <tr>
                <th>NO</th>
                <th>Kode Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Buku Kembali</th>
                <th>Denda</th>

            </tr>
        </thead>
        <tbody>
        @php $no=1 @endphp
        @foreach ($pengembalian as $pengem)

            <tr>
                <td>{{$no++}}</td>
                <td>{{$pengem->kode}}</td>
                <td>{{$pengem->nama_peminjam}}</td>
                <td>{{$pengem->judul_buku}}</td>
                <td>{{$pengem->tgl_peminjaman}}</td>
                <td>{{$pengem->tgl_pengembalian}}</td>
                <td>{{$pengem->status}}</td>
                <td>{{$pengem->buku_kembali}}</td>
                <td>{{$pengem->denda }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
