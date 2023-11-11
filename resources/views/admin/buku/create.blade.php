@extends('admin.layout.appadmin')
@section('content')

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<form method="POST" action="{{url('admin/buku/store')}}" enctype="multipart/form-data">
    @csrf
  <div class="form-group row">
    <label for="text" class="col-4 col-form-label">Kode</label> 
    <div class="col-8">
      <input id="text" name="kode" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text1" class="col-4 col-form-label">Judul Buku</label> 
    <div class="col-8">
      <input id="text1" name="judulbuku" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text2" class="col-4 col-form-label">Penulis</label> 
    <div class="col-8">
      <input id="text2" name="penulis" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text3" class="col-4 col-form-label">ISBN</label> 
    <div class="col-8">
      <input id="text3" name="isbn" type="text" class="form-control">
    </div>
  </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Tahun Terbit</label> 
    <div class="col-8">
      <input id="text4" name="th_terbit" type="text" class="form-control">
    </div>
  </div>
    <div class="form-group row">
      <label for="textarea" class="col-4 col-form-label">Keterangan</label> 
      <div class="col-8">
        <textarea id="textarea" name="ket" cols="40" rows="5" class="form-control"></textarea>
      </div>
    </div>
  <div class="form-group row">
    <label for="text4" class="col-4 col-form-label">Foto</label> 
    <div class="col-8">
      <input id="text4" name="foto" type="file" class="form-control">
  </div>
</div>
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">Kategori</label> 
    <div class="col-8">
      <input id="text6" name="kategori_id" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <label for="text6" class="col-4 col-form-label">Penerbit</label> 
    <div class="col-8">
      <input id="text6" name="penerbit_id" type="text" class="form-control">
    </div>
  </div> 
  <div class="form-group row">
    <div class="offset-4 col-8">
      <button name="submit" type="submit" class="btn btn-primary">Submit</button>
    </div>
  </div>
</form>
@endsection