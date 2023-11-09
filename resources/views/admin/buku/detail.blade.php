@extends('admin.layout.appadmin')
@section('content')

@foreach($buku as $buku)
<h1>{{$buku->judulbuku}}</h1>
@endforeach

@endsection