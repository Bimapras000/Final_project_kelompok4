<!DOCTYPE html>
<html>
<head>
    <title>Detail Buku</title>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1 {
            background-color: deepskyblue;
            padding: 10px;
            text-align: center;
            color: white;
        }
        table {
            margin: 20px auto;
            border-collapse: collapse;
            background-color: white;
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        footer {
            background-color: deepskyblue;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        a {
            color: blue;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Detail Buku</h1>
    @foreach ($buku as $buku)
    <table>
        <tr>
            <td width="30%">Kode</td>
            <td>: {{$buku->kode}}</td>
        </tr>
        <tr>
            <td>Judul Buku</td>
            <td>: {{$buku->judulbuku}}</td>
        </tr>
        <tr>
            <td>Penulis</td>
            <td>: {{$buku->penulis}}</td>
        </tr>
        <tr>
            <td>ISBN</td>
            <td>: {{$buku->isbn}}</td>
        </tr>
        <tr>
            <td>Tahun Terbit</td>
            <td>: {{$buku->th_terbit}}</td>
        </tr>
        <tr>
            <td>Keterangan</td>
            <td>: {{$buku->ket}}</td>
        </tr>
        <tr>
            <td>Kategori ID</td>
            <td>: {{$buku->kategori_id}}</td>
        </tr>
        <tr>
            <td>Penerbit ID</td>
            <td>: {{$buku->penerbit_id}}</td>
        </tr>
    </table>
    @endforeach
    <footer>
        <p>
            <b>Copyright&copy; 2022</b> Created with HTML <a href="https://www.anaktekno.com">Anaktekno.com</a>
        </p>
    </footer>
</body>
</html>
