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
@foreach($data_peminjaman as $peminjaman)
<form method="POST" action="{{url('admin/peminjaman/update/'.$b->id)}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="text" name="kode" value="{{$peminjaman->kode}}" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Tanggal Peminjaman</label> 
    <div class="col-8">
      <input id="text1" name="tgl_peminjaman" value="{{$peminjaman->tgl_peminjaman}}" type="date" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Tanggal Pengembalian</label> 
    <div class="col-8">
      <input id="text2" name="tgl_pengembalian" value="{{$peminjaman->tgl_pengembalian}}" type="date" class="form-control">
    </div>
  </div>

  <div class="form-group ">
      <label class="control-label " for="select">
       Status
      </label>
      <select class="select form-control" id="select" value="{{$peminjaman->status_pinjaman}}" name="status_pinjaman">
        <option> Pilih Status</option>
       <option value="First Choice">
        Dipinjam
       </option>
       <option value="Second Choice">
        Kembali
       </option>
      </select>
     </div>

 
  
</div>
<div class="form-group row">
    <label for="select" class="col-4 col-form-label">Nama Anggota</label> 
    <div class="col-8">
      <select id="select" name="anggota_id" class="custom-select">
        @foreach ($anggota as $a)
        @php $sel = ($a->id == $peminjaman->anggota_id) ? 'selected' : ''; @endphp
        <option value="{{$a->id}}" {{$sel}}>{{$a->nama}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Judul Buku</label> 
    <div class="col-8">
      <select id="select" name="buku_id" class="custom-select">
        @foreach ($buku as $buku)
        @php $sel = ($buku->id == $peminjaman->buku_id) ? 'selected' : ''; @endphp
        <option value="{{$buku->id}}" {{$sel}}>{{$buku->judulbuku}}</option>
        @endforeach
      </select>
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