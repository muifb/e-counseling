<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Landing Pages - Conselling</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">

    <!-- Template Style CSS File -->
    <link href="/css/style.css" rel="stylesheet">
</head>

<body>


    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="#">Conselling</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                    <li><a class="nav-link scrollto" href="#about">About</a></li>
                    @auth
                        <li class="dropdown">
                            <a href="#">
                                <span>
                                    {{ auth()->user()->nama }}
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <ul>
                                @cannot('akses', 'administrator')
                                    @if (auth()->user()->role === 'wali')
                                        <button type="submit" class="dropdown-item"
                                            onclick="window.location.href='/wali-profile'">
                                            <i class="bi bi-person"></i> My Profile
                                        </button>
                                    @else
                                        <button type="submit" class="dropdown-item"
                                            onclick="window.location.href='/dashboard/profile'">
                                            <i class="bi bi-person"></i> My Profile
                                        </button>
                                    @endif
                                @endcannot
                                <form action="/logout" method="post">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </ul>
                        </li>
                    @else
                        <li><a class="getstarted" href="/login">Login</a></li>
                    @endauth
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav>
            <!-- .navbar -->

        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1"
                    data-aos="fade-up" data-aos-delay="200">
                    <h1>RA Al Maskuri </h1>
                    <h2>Raudhatul Athfal adalah bagian dari layanan Pendidikan Anak Usia Dini
                        (PAUD) untuk usia 4 sampai dengan 6 tahun.</h2>
                    <div class="d-flex justify-content-center justify-content-lg-start">
                        @auth
                            @if (auth()->user()->role === 'wali')
                                <a href="/learning" class="btn-get-started">
                                    Get Started
                                </a>
                            @else
                                <a href="/dashboard" class="btn-get-started">Get Started</a>
                            @endif
                        @else
                            <a href="/login" class="btn-get-started">Login Now</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img text-center" data-aos="zoom-in" data-aos-delay="200">
                    <img src="/img/logo.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section>
    <!-- End Hero -->


    <main id="main">
        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients section-bg">
            <div class="container">

                <div class="row" data-aos="zoom-in">

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="/img/logo.png" width="46" class="img-fluid" alt="images">
                        <!-- <img src="assets-dash/img/clients/client-1.png" class="img-fluid" alt=""> -->
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="/img/logo.png" width="46" class="img-fluid" alt="images">
                        <!-- <img src="assets-dash/img/clients/client-2.png" class="img-fluid" alt=""> -->
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="/img/logo.png" width="46" class="img-fluid" alt="images">
                        <!-- <img src="assets-dash/img/clients/client-3.png" class="img-fluid" alt=""> -->
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="/img/logo.png" width="46" class="img-fluid" alt="images">
                        <!-- <img src="assets-dash/img/clients/client-4.png" class="img-fluid" alt=""> -->
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="/img/logo.png" width="46" class="img-fluid" alt="images">
                        <!-- <img src="assets-dash/img/clients/client-5.png" class="img-fluid" alt=""> -->
                    </div>

                    <div class="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
                        <img src="/img/logo.png" width="46" class="img-fluid" alt="images">
                        <!-- <img src="assets-dash/img/clients/client-6.png" class="img-fluid" alt=""> -->
                    </div>

                </div>

            </div>
        </section><!-- End Cliens Section -->

        <!-- ======= About Us Section ======= -->
        <section id="about" class="about">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Visi dan Misi</h2>
                </div>

                <div class="row content">
                    <div class="col-lg-6">
                        <p>
                            <strong>Visi RA Al Maskuri</strong> Membentuk Generasi Unggul di Era Milenial”. Dengan
                            indikasi sebagai berikut :
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Peserta didik beriman dan bertaqwa kepada Tuhan
                                Yang Maha
                                Esa.</li>
                            <li><i class="ri-check-double-line"></i> Peserta didik berakhlakul karimah dalam kehidupan
                                sehari-hari.</li>
                            <li><i class="ri-check-double-line"></i> Peserta didik cerdas, terampil dan kreatif dalam
                                menghadapi
                                globalisasi.</li>
                            <li><i class="ri-check-double-line"></i> Peserta didik memiliki sikap mandiri sesuai usia
                                perkembangannya.</li>
                            <li><i class="ri-check-double-line"></i> Peserta didik mempunyai prestasi untuk kemajuan
                                diri,
                                masyarakat dan bangsa.</li>
                        </ul>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0">
                        <p>
                            <strong>Misi RA Al Maskuri</strong> antara lain:
                        </p>
                        <ul>
                            <li><i class="ri-check-double-line"></i> Membiasakan anak untuk hidup sesuai dengan ajaran
                                Islam
                            </li>
                            <li><i class="ri-check-double-line"></i> Membentuk anak menjadi pribadi yang berakhlaqul
                                karimah
                            </li>
                            <li><i class="ri-check-double-line"></i> Membekali anak dengan pengetahuan yang luas</li>
                            <li><i class="ri-check-double-line"></i> Memfasilitasi kegiatan belajar yang aktif dan
                                menyenangkan
                                sesuai dengan
                                tahapan perkembangan, minat, dan potensi anak.</li>
                        </ul>
                        <a href="#" class="btn-learn-more">Learn More</a>
                    </div>
                </div>

            </div>
        </section><!-- End About Us Section -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Sejarah</h2>
                    <p>
                        RA Al Maskuri merupakan nama tempat pendidikan anak usia dini yang berada di desa
                        Kayen RT 02 RW 03 Kecamatan Kayen Kabupaten Pati yang berdiri tahun 1992 di atas tanah
                        wakaf Ibu Umi Chamidah.
                    </p><br>
                    <p>
                        Atas dorongan dan dukungan masyarakat pada tahun 2020 RA Al Maskuri
                        mengajukan ijin operasional dengan nomor SK 3465/KW.11.2/5/PP.03.2/5/2020. Jumlah
                        peserta didik di Raudlatul Athfal Al Maskuri selalu stabil antara 100-120 anak setiap tahunnya
                        yang berasal dari dalam maupun luar kecamatan kayen.
                    </p>
                </div>

            </div>
        </section><!-- End Portfolio Section -->
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Template Main JS File -->
    <script src="/js/main.js"></script>

</body>

</html>
