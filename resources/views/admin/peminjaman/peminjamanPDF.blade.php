<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
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
    <h3>Data Peminjaman</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Judul Buku</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Status</th>
                <th>Konfirmasi</th>
                <th>Denda</th>
            </tr>
        </thead>
        <tbody>
            @php $no=1 @endphp
            @foreach ($peminjaman as $peminjaman)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$peminjaman->kode}}</td>
                <td>{{$peminjaman->nama_peminjam}}</td>
                <td>{{$peminjaman->judul_buku}}</td>
                <td>{{$peminjaman->tgl_peminjaman}}</td>
                <td>{{$peminjaman->tgl_pengembalian}}</td>
                <td>{{$peminjaman->status}}</td>
                <td>{{$peminjaman->konfirmasi}}</td>
                <td>{{$peminjaman->denda }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
