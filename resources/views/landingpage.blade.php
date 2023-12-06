@extends('landing.app')
@section('landing')

<body>



    <!-- ======= Hero Section ======= -->
    <section id="hero" class="clearfix">
        <div class="container d-flex h-100">
            <div class="row justify-content-center align-self-center" data-aos="fade-up">
                <div class="col-lg-6 intro-info order-lg-first order-last" data-aos="zoom-in" data-aos-delay="100">
                    <h2>Library Hub<br><span>Quick-Fire Solutions for Your Reading Needs!</span></h2>
                </div>

                <div class="col-lg-6 intro-img order-lg-last order-first" data-aos="zoom-out" data-aos-delay="200">
                    <img src="{{url('admin/assets/img/intro-img.svg')}}" alt="" class="img-fluid">
                </div>
            </div>

        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= About Section ======= -->
        <section id="about" class="about">

            <div class="container" data-aos="fade-up">
                <div class="row">

                    <div class="col-lg-5 col-md-6">
                        <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                            <img src="{{url('admin/assets/img/Perpus.png')}}" alt="" width="200px" height="auto">
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-6">
                        <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                            <h2>Library website</h2>
                            <p>Kami adalah penyedia perpustakaan online khusus yang berkomitmen untuk membawa dunia
                                pengetahuan ke ujung jari Anda.</p>
                            <p>Melalui koleksi e-book yang kaya, jurnal ilmiah, dan sumber belajar terkini, kami
                                bertujuan untuk memfasilitasi perjalanan intelektual Anda. Dengan platform yang mudah
                                digunakan dan aksesibilitas yang luas, kami bercita-cita untuk menumbuhkan minat baca,
                                pembelajaran, dan penelitian, membangun komunitas terhubung yang terikat oleh hasrat
                                akan pengetahuan. Jelajahi dunia informasi dan inspirasi tanpa batas di perpustakaan
                                kami, dengan penuh semangat mendukung pertumbuhan dan penemuan Anda.</p>
                            <ul>
                                <li><i class="bi bi-check-circle"></i> Dengan menggunakan situs web perpustakaan, Anda
                                    mendapatkan akses ke ribuan judul buku, bahan referensi, dan sumber daya lainnya
                                    dari mana saja, kapan saja. </li>
                                <li><i class="bi bi-check-circle"></i> Situs web perpustakaan sering kali menyediakan
                                    antarmuka yang ramah pengguna dan opsi pencarian lanjutan.</li>
                                <li><i class="bi bi-check-circle"></i> Situs web perpustakaan sering menawarkan koleksi
                                    yang sangat beragam, mulai dari e-book hingga jurnal ilmiah dan materi multimedia.
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3>Services</h3>
                </header>

                <div class="row g-5">

                    <div class="col-md-6 col-lg-4 wow bounceInUp" data-aos="zoom-in" data-aos-delay="100">
                        <div class="box">
                            <div class="icon" style="background: #fceef3;"><i class="bi bi-briefcase"
                                    style="color: #ff689b;"></i></div>
                            <h4 class="title"><a href="">Akses Mudah</a></h4>
                            <p class="description">Dapat di akses dimana saja dengan menggunakan koneksi internet dan
                                temukan informasi terkini dan pengetahuan mendalam dalam beragam topik.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <div class="icon" style="background: #fff0da;"><i class="bi bi-card-checklist"
                                    style="color: #e98e06;"></i></div>
                            <h4 class="title"><a href="">Akses Multi-Platform</a></h4>
                            <p class="description">Nikmati fleksibilitas akses dari berbagai perangkat, mulai dari
                                komputer hingga perangkat mobile. Website perpustakaan kami dioptimalkan untuk
                                memberikan pengalaman yang konsisten di semua platform.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="box">
                            <div class="icon" style="background: #e6fdfc;"><i class="bi bi-bar-chart"
                                    style="color: #3fcdc7;"></i></div>
                            <h4 class="title"><a href="">Koleksi Terdiversifikasi</a></h4>
                            <p class="description">Banyak perpustakaan online menawarkan beragam genre dan judul buku!
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Services Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="row feature-item">
                    <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{url('admin/assets/img/Perpustakaan.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0" data-aos="fade-left" data-aos-delay="150">
                        <h4>Tujuan</h4>
                        <p>
                            Tujuan utama dari sebuah website perpustakaan adalah untuk merangkul akses universal
                            terhadap pengetahuan. Melalui sumber daya yang beragam,
                            website ini memberikan akses yang mudah dan cepat kepada informasi berkualitas dari berbagai
                            bidang, mulai dari ilmu pengetahuan hingga humaniora. Hal ini bertujuan untuk mendukung
                            proses pembelajaran,
                            penelitian, dan pertumbuhan intelektual bagi siapa pun, di mana pun mereka berada.
                        </p>
                        <p>
                            Di samping itu, website perpustakaan bertujuan untuk mengadopsi teknologi terkini guna
                            meningkatkan pengalaman pengguna. Ini mencakup fitur-fitur kustomisasi, rekomendasi
                            personal,
                            dan navigasi yang intuitif, sehingga setiap pengguna dapat menyesuaikan pengalaman belajar
                            mereka sesuai dengan preferensi dan kebutuhan individu.
                        </p>
                    </div>
                </div>

                <div class="row feature-item mt-5 pt-5">
                    <div class="col-lg-6 wow fadeInUp order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                        <img src="{{url('admin/assets/img/Buku.png')}}" class="img-fluid" alt="">
                    </div>

                    <div class="col-lg-6 wow fadeInUp pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-right"
                        data-aos-delay="150">
                        <p>
                            Buku pelajaran di platform ini sering diperbarui secara berkala untuk mencerminkan
                            perkembangan terbaru dalam bidangnya. Ini memastikan bahwa pembelajar memiliki akses ke
                            informasi yang mutakhir dan relevan.
                        </p>
                        <p>
                            Dengan sifat online, buku-buku pelajaran ini dapat diakses dari mana saja dan kapan saja.
                            Hal ini memudahkan siswa atau siapa pun yang belajar untuk mengakses materi tanpa terkendala
                            oleh batasan tempat atau waktu.
                        </p>
                        <p>
                            Website perpustakaan menjadi sumber daya yang sangat berharga bagi siswa yang mengikuti
                            pendidikan jarak jauh. Mereka dapat mengakses buku pelajaran dan materi pembelajaran dengan
                            mudah, mendukung proses pembelajaran mereka dari jarak jauh.
                        </p>
                    </div>

                </div>

            </div>
        </section><!-- End Features Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio section-bg">
            <div class="container" data-aos="fade-up">

                <header class="section-header">
                    <h3 class="section-title">Book Recommendations</h3>
                </header>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($buku as $b)
                    <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                        <div class="portfolio-wrap">
                            @empty($b->foto)
                            <div class="portfolio-wrap"><img class="card-img-top mb-5 mb-md-0"
                                    src="{{asset('admin/img'.$b->foto)}}" alt="..." /></div>
                            @else
                            <div class="portfolio-wrap"><img class="card-img-top mb-5 mb-md-0"
                                    src="{{asset('admin/img')}}/{{$b->foto}}" alt="..." /></div>
                            @endempty
                            <div class="portfolio-info">
                                <h4><a href="{{route('details', $b->id)}}">{{$b->judulbuku}}</a></h4>
                                <div>
                                    <a href="{{route('details', $b->id)}}" class="link-details" title="More Details"><i
                                            class="bi bi-link"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </section>

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container" data-aos="fade-up">
                <div class="section-header">
                    <h3>Team</h3>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="member">
                            <img src="{{url('admin/assets/img/Bima.jpg')}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Bima Prasetya</h4>
                                    <span>Fullstack Web Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                        <div class="member">
                            <img src="{{url('admin/assets/img/Brilian.jpg')}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Brilian Wahyu Hidayat</h4>
                                    <span>Fullstack Web Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                        <div class="member">
                            <img src="{{url('admin/assets/img/Dhini.jpg')}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Dhini Fidya Anggraeni</h4>
                                    <span>Fullstack Web Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                        <div class="member">
                            <img src="{{url('admin/assets/img/Milano.jpg')}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Milano Sheva Wibowo</h4>
                                    <span>Fullstack Web Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="500">
                        <div class="member">
                            <img src="{{url('admin/assets/img/Anggita.jpg')}}" class="img-fluid" alt="">
                            <div class="member-info">
                                <div class="member-info-content">
                                    <h4>Rizky Anggita</h4>
                                    <span>Fullstack Web Developer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Team Section -->
    </main><!-- End #main -->

    @endsection