@extends('admin.layout.appadmin')
@section('content')

@foreach ($buku as $b)
<section class="py-5">
    <input type="hidden" value="{{$b->id}}">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            @empty($b->foto)
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset('admin/img'.$b->foto)}}"
                    alt="..." /></div>
            @else
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{asset('admin/img')}}/{{$b->foto}}"
                    alt="..." /></div>
            @endempty
            <div class="col-md-6">
                <div class="small mb-1">{{$b->kode}}</div>
                <h1 class="display-5 fw-bolder">{{$b->judulbuku}}</h1>
                <div class="fs-5 mb-5">
                    <p><strong>Penulis:</strong> {{$b->penulis}}</p>
                    <p><strong>ISBN:</strong> {{$b->isbn}}</p>
                    <p><strong>Tahun Terbit:</strong> {{$b->th_terbit}}</p>
                    <p><strong>Deskripsi:</strong> {{$b->ket}}</p>
                    <p><strong>Kategori:</strong> {{$b->kategori}}</p>
                    <p><strong>Penerbit:</strong> {{$b->penerbit}}</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endforeach

@endsection