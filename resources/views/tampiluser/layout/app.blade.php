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

    <!-- Favicons -->
    <link href="{{url('admin/assets/img/books.png')}}" rel="icon">
    <link href="{{url('admin/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{url('admin/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{url('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('admin/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{url('admin/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{url('admin/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{url('admin/assets/css/style.css')}}" rel="stylesheet">

    <link href="{{asset('admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    
  </head>
  <body>

  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="{{url('user')}}">Ngepinter.com</a></h1>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
                <!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> -->
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                        @if(empty(Auth::user()->name))
                        {{''}}
                        @else
                        {{Auth::user()->name}}
                        @endif
                    </span>
                    <img class="img-profile rounded-circle"
                        src="{{asset('admin/img/undraw_profile.svg')}}" style="width: 40px; height: 40px;">
                </a>


                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <a class="dropdown-item" href="{{url ('user/pinjamBuku')}}">
                        <i class="fas fa-book fa-sm fa-fw mr-2 text-gray-400"></i>
                        Pinjaman
                    </a>
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    
                    <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                </div>
            </li>
        <!-- </nav>.navbar -->
        </ul>
        
    </div>
</header><!-- End Header -->
<br>
<br>
<br>

@yield('user')

<!-- <div id="footer-bottom">
      <div class="container">
        <div class="d-flex align-items-center flex-wrap justify-content-between">
          <div class="copyright">
            <p>Freebies by <a href="https://templatesjungle.com/">Templates Jungle</a> Distributed by <a href="https://themewagon.com">ThemeWagon</a>
            </p>
          </div>
        </div>
      </div>
    </div> -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"> -->
    
    <script>
    document.getElementById('openSecondModal').addEventListener('click', function() {
        $('#exampleModal').modal('show'); // Menampilkan modal kedua menggunakan ID "exampleModal"
    });
</script>

    <script src="{{asset('usercss/js/jquery-1.11.0.min.js')}}"></script>
    <script src="{{asset('usercss/js/plugins.js')}}"></script>
    <script src="{{asset('usercss/js/script.js')}}"></script>

    <!-- Vendor JS Files -->
<script src="{{url('admin/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{url('admin/assets/vendor/aos/aos.js')}}"></script>
<script src="{{url('admin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{url('admin/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{url('admin/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{url('admin/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{url('admin/assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{url('admin/assets/js/main.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>


  </body>
</html>