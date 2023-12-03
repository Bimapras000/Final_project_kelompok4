<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Perpustakaan Ngepinter</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="author" content="">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link rel="stylesheet" type="text/css" href="{{asset('usercss/css/normalize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('usercss/icomoon/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" media="all" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('usercss/css/vendor.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('usercss/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <!-- script
    ================================================== -->
    <script src="{{asset('usercss/js/modernizr.js')}}"></script>
  </head>
  <body>

    <div class="preloader-wrapper">
      <div class="preloader">
      </div>
    </div>



    <section class="site-banner jarallax min-height300 padding-large" style="background: url({{asset('usercss/images/back.jpg')}}) no-repeat; background-position: top; ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h1 class="page-title">Ngepinter.com</h1>
            <div class="breadcrumbs">
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

          <section id="selling-products" class="col-md-9 product-store">
            <div class="container">
              <div class="tab-content">
                <div id="all" data-tab-content class="active">
                  <div class="row d-flex flex-wrap">
                    @foreach ($buku as $bukus)
                    <div class="product-item col-lg-4 col-md-6 col-sm-6">
                      <div class="image-holder">
                      @empty($bukus->foto)
                        <img src="{{url('admin/img/nophoto.jpg')}}" alt="Books" class="product-image">
                      @else
                        <img src="{{url('admin/img')}}/{{$bukus->foto}}" alt="Books" class="product-image" style="width: 500px; height: 400px;">
                      @endempty
                      </div>
                      <div class="cart-concern">
                        <div class="cart-button d-flex justify-content-between align-items-center">
                          <button type="button" class="btn-wrap cart-link d-flex align-items-center">add to cart <i class="icon icon-arrow-io"></i>
                          </button>
                          <button type="button" class="view-btn tooltip
                              d-flex">
                            <i class="icon icon-screen-full"></i>
                            <span class="tooltip-text">Quick view</span>
                          </button>
                          <button type="button" class="wishlist-btn">
                            <i class="icon icon-heart"></i>
                          </button>
                        </div>
                      </div>
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
         

          <aside class="col-md-3">
            <div class="sidebar">
              <div class="widgets widget-menu">
                <div class="widget-search-bar">
                  <!-- <form role="search" method="get" class="d-flex">
                    <input class="search-field" placeholder="Search" type="text">
                    <button class="btn btn-dark"><i class="icon icon-search"></i></button>
                  </form> -->
                  <form action="{{ route('user.index') }}" method="get">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Masukkan Nama..." name="judul" id="judul">
                    <button class="btn btn-outline-secondary" type="submit">Search</button>
                </div>
            </form>
                </div> 
              </div>
              <div class="widgets widget-product-tags">
                <h5 class="widget-title">Tags</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="">White</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Cheap</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Branded</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Modern</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Simple</a>
                  </li>
                </ul>
              </div>
              <div class="widgets widget-product-brands">
                <h5 class="widget-title">Brands</h5>
                <ul class="product-tags sidebar-list list-unstyled">
                  <li class="tags-item">
                    <a href="">Nike</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Adidas</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Puma</a>
                  </li>
                  <li class="tags-item">
                    <a href="">Spike</a>
                  </li>
                </ul>
              </div>
            </div>
          </aside>
          
        </div>        
      </div>      
    </div>


    <div id="footer-bottom">
      <div class="container">
        <div class="d-flex align-items-center flex-wrap justify-content-between">
          <div class="copyright">
            <p>Freebies by <a href="https://templatesjungle.com/">Templates Jungle</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <script src="{{asset('usercss/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('usercss/js/plugins.js')}}"></script>
    <script src="{{asset('usercss/js/script.js')}}"></script>
  </body>
</html>