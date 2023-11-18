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
@foreach($buku as $b)
<form method="POST" action="{{url('admin/buku/update/'.$b->id)}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="text" name="kode" value="{{$b->kode}}" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Judul Buku</label> 
    <div class="col-8">
      <input id="text1" name="judulbuku" value="{{$b->judulbuku}}" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Penulis</label> 
    <div class="col-8">
      <input id="text2" name="penulis" value="{{$b->penulis}}" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">ISBN</label> 
    <div class="col-8">
      <input id="text3" name="isbn" value="{{$b->isbn}}" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Tahun Terbit</label> 
    <div class="col-8">
      <input id="text4" name="th_terbit" value="{{$b->th_terbit}}" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
      <label for="textarea" class="col-4 col-form-label">Keterangan</label> 
      <div class="col-8">
        <textarea id="textarea" name="ket" value="{{$b->ket}}" cols="40" rows="5" class="form-control"></textarea>
      </div>
    </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text4" name="foto" type="file" class="form-control">
      @if(!empty($b->foto))
    <img src="{{url('admin/img')}}/{{$b->foto}}" alt="">
  
    @endif
  </div>
</div>
<div class="form-group row">
    <label for="select" class="col-4 col-form-label">Kategori</label> 
    <div class="col-8">
      <select id="select" name="kategori_id" class="custom-select">
        @foreach ($kategori as $k)
        @php $sel = ($k->id == $b->kategori_id) ? 'selected' : ''; @endphp
        <option value="{{$k->id}}" {{$sel}}>{{$k->nama}}</option>
        @endforeach
      </select>
    </div>
  </div>
  <div class="form-group row">
    <label for="select" class="col-4 col-form-label">Penerbit</label> 
    <div class="col-8">
      <select id="select" name="penerbit_id" class="custom-select">
        @foreach ($penerbit as $p)
        @php $sel = ($p->id == $b->penerbit_id) ? 'selected' : ''; @endphp
        <option value="{{$p->id}}" {{$sel}}>{{$p->nama}}</option>
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