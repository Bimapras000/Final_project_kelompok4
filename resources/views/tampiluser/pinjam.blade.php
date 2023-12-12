@extends('tampiluser.layout.app')
@section('user')

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
<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST" action="{{url('user/store')}}" enctype="multipart/form-data">
            @csrf
            <div class="form-group row">
                <label for="kode" class="col-sm-4 col-form-label">Kode</label> 
                <div class="col-sm-8">
                    <input id="kode" name="kode" type="text" class="form-control @error('kode') is-invalid @enderror" >
                    @error('kode')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                
                <!-- <label for="judulbuku" class="col-sm-4 col-form-label">Judul Buku</label> 
                <div class="col-sm-8">
                    <input id="judulbuku" name="judulbuku" value="{{ $b->judulbuku }}" readonly type="text" class="form-control" >
                </div> -->
                
                <div class="form-group row">
                    <label for="select" class="col-sm-4 col-form-label">Judul Buku</label> 
                    <div class="col-8">
                        <select id="select" name="buku_id" class="custom-select @error('buku_id') is-invalid @enderror">
                            <option value="{{$b->id}}">{{$b->judulbuku}}</option>
                        </select>
                        @error('buku_id')
                        <div class="invalid-feedback">
                        {{$message}}
                        </div>
                        @enderror
                    </div>
                </div>

                <label for="tgl_peminjaman" class="col-sm-4 col-form-label">Tanggal Peminjaman</label> 
                <div class="col-sm-8">
                    <input id="tgl_peminjaman" name="tgl_peminjaman" type="date" class="form-control" value="{{ date('Y-m-d') }}" readonly>
                </div>

                <label for="tgl_pengembalian" class="col-sm-4 col-form-label">Tanggal Pengembalian</label> 
                <?php
                    $tglPeminjaman = date('Y-m-d');
                    $tglPengembalian = date('Y-m-d', strtotime($tglPeminjaman . ' + 5 days'));
                ?>
                <div class="col-sm-8">
                    <input id="tgl_pengembalian" name="tgl_pengembalian" type="date" class="form-control" value="{{ $tglPengembalian }}" readonly>
                </div>

                <label for="user_id" class="col-sm-4 col-form-label">Nama Peminjam</label> 
                <div class="col-sm-8">
                    <input id="user_id" name="user_id" type="text" class="form-control @error('user_id') is-invalid @enderror" value="{{ Auth::user()->name }}" readonly>
                    @error('user_id')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-4 col-sm-8">
                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endforeach
@endsection