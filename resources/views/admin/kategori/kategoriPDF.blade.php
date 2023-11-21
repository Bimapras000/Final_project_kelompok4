<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kategori</title>
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
    <h3>Data Kategori</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1 @endphp
            @foreach ($kategori as $k)
                                    
            <tr>
                <td>{{$no++}}</td>
                <td>{{$k->nama}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
