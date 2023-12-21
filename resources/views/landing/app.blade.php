<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Ngepinter.com</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

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

    <!-- =======================================================
  * Template Name: Rapid
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<!-- ======= Header ======= -->
<header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.html">Ngepinter.com</a></h1>

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul class="mb-8">
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">About</a></li>
                <li><a class="nav-link scrollto" href="#services">Services</a></li>
                <li><a class="nav-link scrollto " href="#portfolio">Book</a></li>
                
            </ul>
            <ul >
              <li><a class="login mt-6" href="{{ route('login') }}">Login</a></li>
              <li><a class="nav-link scrollto" href="{{ route('register') }}">Register</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
        
    </div>
</header><!-- End Header -->

@yield('landing')

<!-- Footer -->
<footer class="text-center text-lg-start bg-body-tertiary text-muted">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

        <!-- Right -->
        <div>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-google"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-linkedin"></i>
            </a>
            <a href="" class="me-4 text-reset">
                <i class="fab fa-github"></i>
            </a>
        </div>
        <!-- Right -->
    </section>
    <!-- Section: Social media -->

    <!-- Section: Links  -->
    <section class="">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row mt-3">
                <!-- Grid column -->
                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <!-- Content -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>Ngepinter.com
                    </h6>
                    <p>
                        A digital library portal enriching knowledge and facilitating access to literature for all.
                        Explore a world of books, knowledge, and endless learning possibilities right at your
                        fingertips.
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Book
                    </h6>
                    <p>
                        <a href="#!" class="text-reset">Sains</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Sejarah</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Kimia</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Ekonomi</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="#" class="text-reset">Home</a>
                    </p>
                    <p>
                        <a href="#about" class="text-reset">About</a>
                    </p>
                    <p>
                        <a href="#services" class="text-reset">Services</a>
                    </p>
                    <p>
                        <a href="#portfolio" class="text-reset">Book</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Indonesia</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        admin@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> +6285 795 414 584</p>
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © 2023 Copyright:
        <a class="text-reset fw-bold" href="https://mdbootstrap.com/">Ngepinter.com</a>
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
        class="bi bi-arrow-up-short"></i></a>

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

</body>

</html>