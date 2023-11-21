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
    <h3>Data Anggota</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Bergabung</th>
                <th>Email</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($anggota as $a)
                                    
            <tr>
                <td>{{$no++}}</td>
                <td>{{$a->nama}}</td>
                <td>{{$a->alamat}}</td>
                <td>{{$a->no_tlp}}</td>
                <td>{{$a->tgl_bergabung}}</td>
                <td>{{$a->email}}</td>
                <td>{{$a->username}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
