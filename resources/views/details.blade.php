@extends('landing.app')
@section('landing')

<section id="portfolio-details" class="portfolio-details">
      <div class="container">
     @foreach ($buku as $buku)
        <div class="row gy-4">
       
          <div class="col-lg-6">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

              @empty($buku->foto)
            <div class="portfolio-wrap"><img class="card-img-top mb-5 mb-md-0" src="{{asset('admin/img'.$buku->foto)}}"
                    alt="..." /></div>
            @else
            <div class="portfolio-wrap"><img class="card-img-top mb-5 mb-md-0" src="{{asset('admin/img')}}/{{$buku->foto}}"
                    alt="..." /></div>
            @endempty
               
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3>Project information</h3>
              <ul>
                <li><strong>Kode</strong>: {{$buku->kode}} </li>
                <li><strong>Judul Buku</strong>: {{$buku->judulbuku}} </li>
                <li><strong>Penulis</strong>: {{$buku->penulis}} </li>
                <li><strong>ISBN</strong>: {{$buku->isbn}} </li>
                <li><strong>Th Terbit</strong>: {{$buku->th_terbit}} </li>
                <li><strong>Keterangan</strong>: {{$buku->ket}} </li>
                <li><strong>Kategori</strong>: {{$buku->kategori}} </li>
                <li><strong>Penerbit</strong>: {{$buku->penerbit}} </li>
              </ul>
            </div>
            <div class="portfolio-description">
              <h2>This is an example of portfolio detail</h2>
              <p>
                Autem ipsum nam porro corporis rerum. Quis eos dolorem eos itaque inventore commodi labore quia quia. Exercitationem repudiandae officiis neque suscipit non officia eaque itaque enim. Voluptatem officia accusantium nesciunt est omnis tempora consectetur dignissimos. Sequi nulla at esse enim cum deserunt eius.
              </p>
            </div>
          </div>

        </div>
      @endforeach
      </div>
    </section>

@endsection