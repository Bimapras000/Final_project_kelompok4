@extends('tampiluser.layout.app')
@section('user')

    <section class="site-banner jarallax min-height300 padding-large" style="background: url({{asset('usercss/images/back.jpg')}}) no-repeat; background-position: top; ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-title">Ngepinter.com</h1>
            <br><br><br><br>
            <div class="breadcrumbss">
              <span class="item">
                <a href="index.html" style="color:white;">Home /</a>
              </span>
              <span class="item" style="color:white;">Book</span>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="shopify-grid padding-large">
      <div class="container">
        <div class="row">

          <section id="selling-products" class="col-md-12 product-store">
            <div class="container">
              <form class="d-flex" role="search" action="{{ url('user') }}" method="get">
              <input class="search-field" placeholder="Search" type="text" name="judul" id="judul">
              <!-- <div class="input-group-append"> -->
                  <button class="btn btn-dark" type="submit">Search <i class="icon icon-search"></i></button>
              <!-- </div> -->
              </form>
              <div class="tab-content">
                <div id="all" data-tab-content class="active">
                  <div class="row d-flex flex-wrap">
                    @foreach ($buku as $bukus)
                    <div class="product-item col-lg-3 col-md-6 col-sm-6">
                      <div class="image-holder"  data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$bukus->id}}">
                      <!-- <div class="image-holder" data-toggle="modal" data-target="#exampleModal"> -->
                      @empty($bukus->foto)
                        <img src="{{url('admin/img/nophoto.jpg')}}" alt="Books" class="product-image" style="width: 300px; height: 400px;">
                      @else
                        <img src="{{url('admin/img')}}/{{$bukus->foto}}" alt="Books" class="product-image" style="width: 300px; height: 400px;">
                      @endempty
                      </div>
                      
                      <!-- Modal Content -->
                      <!-- <div class="modal fade" id="exampleModal{{$bukus->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
                      <div class="modal fade" id="staticBackdrop{{$bukus->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
                          <div class="modal-content">
                          
                            <div class="modal-header">
                              <h1 class="modal-title fs-4" id="exampleModalLabel">Book Details</h1>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="row gy-4">
                            
                                <div class="col-lg-6 d-flex justify-content-center">
                                  <div class="portfolio-details-slider swiper">
                                    <div class="swiper-wrapper align-items-center">

                                    @empty($bukus->foto)
                                    <div class="portfolio-wrap"><img class="card-img-top mb-5 mb-md-0" src="{{asset('admin/img'.$bukus->foto)}}" style="width: 400px; height: 500px; object-fit: cover;"
                                            alt="..." /></div>
                                    @else
                                    <div class="portfolio-wrap"><img class="card-img-top mb-5 mb-md-0" src="{{asset('admin/img')}}/{{$bukus->foto}}" style="width: 400px; height: 500px; object-fit: cover;"
                                            alt="..." /></div>
                                    @endempty
                                    
                                    </div>
                                    <div class="swiper-pagination"></div>
                                  </div>
                                </div>

                                <div class="col-lg-4">
                                  <div class="portfolio-info">
                                    
                                    <ul style="list-style: none; padding-left: 0;">
                                      <li><strong>Kode</strong>: {{$bukus->kode}} </li>
                                      <li><strong>Judul Buku</strong>: {{$bukus->judulbuku}} </li>
                                      <li><strong>Penulis</strong>: {{$bukus->penulis}} </li>
                                      <li><strong>ISBN</strong>: {{$bukus->isbn}} </li>
                                      <li><strong>Th Terbit</strong>: {{$bukus->th_terbit}} </li>
                                      <li><strong>Keterangan</strong>: {{$bukus->ket}} </li>
                                      <li><strong>Kategori</strong>: {{$bukus->kategori->nama}} </li>
                                      <li><strong>Penerbit</strong>: {{$bukus->penerbit->nama}} </li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                        
                            </div>
                            <div class="modal-footer">
                              <a  class="btn btn-secondary" data-bs-dismiss="modal">Close</a>
                              <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#openSecondModal">Save changes</button> -->
                              <a href="{{url('user/create/'.$bukus->id)}}" class="btn btn-primary">Pinjam Buku</a>
                            </div>
                          
                          </div>
                        </div>
                      </div>
                      <!-- End Modal -->
                      <!-- Button trigger modal -->

                      <!-- <div class="cart-concern">
                        <div class="cart-button d-flex justify-content-between align-items-center">
                          <button type="button" class="btn-wrap cart-link d-flex align-items-center">add to cart <i class="icon icon-arrow-io"></i>
                          </button>
                          <button type="button" class="view-btn tooltip
                              d-flex">
                            <i class="icon icon-screen-full"></i>
                            <span class="tooltip-text">Quick view</span>
                          </button>
                        </div>
                      </div> -->
                      <div class="product-detail">
                        <h3 class="product-title">
                          {{$bukus->judulbuku}}
                        </h3>
                        <div class="item-price text-primary"></div>
                      </div>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>

              <!-- <nav class="navigation paging-navigation text-center padding-medium" role="navigation">
                <div class="pagination loop-pagination d-flex justify-content-center">
                  <a href="#" class="pagination-arrow d-flex align-items-center">
                    <i class="icon icon-arrow-left"></i>
                  </a>
                  <span aria-current="page" class="page-numbers current">1</span>
                  <a class="page-numbers" href="#">2</a>
                  <a class="page-numbers" href="#">3</a>
                  <a href="#" class="pagination-arrow d-flex align-items-center">
                    <i class="icon icon-arrow-right"></i>
                  </a>
                </div>
              </nav> -->

              {{ $buku->links('pagination::bootstrap-5')}}

            </div>
          </section>
         

          <!-- <aside class="col-md-3">
            <div class="sidebar">
              <div class="widgets widget-menu">
                <div class="widget-search-bar">
                  <form role="search" action="{{ url('user') }}" method="get">
                    <input class="form-control" placeholder="Search" type="text" name="judul" id="judul">
                    <button class="btn btn-dark">Search <i class="icon icon-search"></i></button>
                  </form>
                </div> 
              </div>
              
              <div class="widgets widget-product-tags">
                <h5 class="widget-title">Kategori</h5>
                
                <ul class="product-tags sidebar-list list-unstyled">
                @foreach($kategori as $item)
                  <li class="tags-item">
                    <a href="">{{$item->nama}}</a>
                  </li>
                  @endforeach
                </ul>
              </div>
              
            </div>
          </aside> -->
          
        </div>        
      </div>      
    </div>


@endsection