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
@foreach($petugas as $p)
<div class="card shadow mb-4">
    <div class="card-body">
<form method="POST" action="{{url('admin/petugas/update/'.$p->id)}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama</label> 
    <div class="col-8">
      <input id="text" name="nama" type="text" value="{{$p->nama}}" class="form-control @error('nama') is-invalid @enderror" >
      @error('nama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Email</label> 
    <div class="col-8">
      <input id="text1" name="email" type="text" value="{{$p->email}}" class="form-control @error('email') is-invalid @enderror">
      @error('email')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Username</label> 
    <div class="col-8">
      <input id="text2" name="username" type="text" value="{{$p->username}}" class="form-control @error('username') is-invalid @enderror">
      @error('username')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">Password</label> 
    <div class="col-8">
      <input id="text3" name="password" type="text" value="{{$p->password}}" class="form-control @error('password') is-invalid @enderror">
      @error('password')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
</div>
</div>
@endforeach
@endsection