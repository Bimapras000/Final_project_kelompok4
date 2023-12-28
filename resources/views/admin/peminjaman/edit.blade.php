@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
@foreach($peminjaman as $peminjaman)
<form method="POST" action="{{url('admin/peminjaman/update/'.$peminjaman->id)}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="text" name="kode" value="{{$peminjaman->kode}}" type="text" class="form-control" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Judul Buku</label> 
    <div class="col-8">
      <select id="select" name="buku_id" class="custom-select" >
        @foreach ($buku as $buku)
        @php $sel = ($buku->id == $peminjaman->buku_id) ? 'selected' : ''; @endphp
        <option value="{{$buku->id}}" {{$sel}}>{{$buku->judulbuku}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Tanggal Peminjaman</label> 
    <div class="col-8">
      <input id="text1" name="tgl_peminjaman" value="{{$peminjaman->tgl_peminjaman}}" type="date" class="form-control" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Tanggal Pengembalian</label> 
    <div class="col-8">
      <input id="text2" name="tgl_pengembalian" value="{{$peminjaman->tgl_pengembalian}}" type="date" class="form-control" readonly>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Nama Peminjam</label> 
    <div class="col-8">
      <select id="select" name="users_id" class="custom-select" >
        @foreach ($users as $user)
        @php $sel = ($user->id == $peminjaman->users_id) ? 'selected' : ''; @endphp
        <option value="{{$user->id}}" {{$sel}} readonly>{{$user->name}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Status</label> 
    <div class="col-8">
      <select id="select" name="status" class="custom-select" value="{{$peminjaman->status}}">
        <option value="Pinjam">Pinjam</option>
        <option value="Kembali">Kembali</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Konfirmasi</label> 
    <div class="col-8">
      <select id="select" name="konfirmasi" class="custom-select" value="{{$peminjaman->konfirmasi}}">
        <option value="Diterima">Diterima</option>
        <option value="Ditolak">Ditolak</option>
      </select>
    </div>
  </div> 
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Denda</label> 
    <div class="col-8">
      <input id="text3" name="denda" value="{{$peminjaman->denda}}" type="text" class="form-control" >
      <span style="color:red;"><i> Dikenakan denda Rp. 5000 / hari untuk anggota yang terlambat mengembalikan buku.</i></span>
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-warning">Update</button>
    </div>
  </div>
</form>
@endforeach
@endsection