@extends('admin.layout.appadmin')
@section('content')


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@foreach ($anggota as $a)
<form method="POST" action="{{url('admin/anggota/update/'.$a->id)}}" enctype="multipart/form-data">
  @csrf
    <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="text" name="nama" type="text" class="form-control" value="{{$a->nama}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Alamat</label> 
    <div class="col-8">
      <input id="text1" name="alamat" type="text" class="form-control" value="{{$a->alamat}}">
    </div>
  </div>
  
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Nomor Telepon</label> 
    <div class="col-8">
      <input id="text2" name="no_tlp" type="text" class="form-control" value="{{$a->no_tlp}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Tanggal Bergabung</label> 
    <div class="col-8">
      <input id="text3" name="tgl_bergabung" type="date" class="form-control" value="{{$a->tgl_bergabung}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text4" name="email" type="email" class="form-control" value="{{$a->email}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="text4" name="username" type="text" class="form-control" value="{{$a->username}}">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="text4" name="password" type="text" class="form-control" value="{{$a->password}}">
    </div>
  </div>
  
  <div class="form-group row">
    <div class="offset-4 col-8">
        <a href="{{url('admin/anggota')}}" class="btn btn-secondary">close</a>
      <button name="submit" type="submit" class="btn btn-warning" style="color:white">Edit</button>
    </div>
  </div>
</form>

@endforeach

@endsection