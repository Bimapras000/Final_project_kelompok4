<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Petugas</title>
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
    <h3>Data Petugas</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Nomor Telepon</th>
                <th>Tanggal Bergabung</th>
                <th>Email</th>
                <th>Role</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
                @foreach ($petugas as $petugas)
                @if($petugas->role === 'petugas' || $petugas->role === 'admin')
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$petugas->name}}</td>
                    <td>{{$petugas->alamat}}</td>
                    <td>{{$petugas->no_tlp}}</td>
                    <td>{{$petugas->tgl_bergabung}}</td>
                    <td>{{$petugas->email}}</td>
                    <td>{{$petugas->role}}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</body>
</html>
