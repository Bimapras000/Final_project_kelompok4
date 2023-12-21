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
@foreach($penerbit as $pener)
<div class="card shadow mb-4">
    <div class="card-body">
<form method="POST" action="{{url('admin/penerbit/update/'.$pener->id)}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Nama Penerbit</label> 
    <div class="col-8">
      <input id="text" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror" value="{{$pener->nama}}" >
      @error('nama')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
    </div>
  </div>
  <div class="form-group row">
    <div class="offset-4 col-8">
      <a href="{{url('admin/penerbit')}}" class="btn btn-secondary">Close</a>
      <button name="submit" type="submit" class="btn btn-primary">Update</button>
    </div>
  </div>
</form>
</div>
</div>
@endforeach
@endsection