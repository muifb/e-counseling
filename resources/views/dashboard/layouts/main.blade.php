<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Pages - Conselling</title>
    <!-- <meta content="" name="description">
  <meta content="" name="keywords"> -->

    <!-- Favicons -->
    <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="/assets/vendor/simple-datatables/style.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">
    <link href="/css/flatpickr.min.css" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">


    {{--  --}}
    @stack('css')

</head>

<body>

    @include('dashboard.layouts.sidebar')

    <!-- Main page content-->
    <main id="main" class="main">

        <!-- Page Title -->
        <div class="pagetitle">
            <h5 class="card-title py-1">
                @if (Request::is('dashboard'))
                    Dashboard
                @elseif (Request::is('dashboard/request-reports*'))
                    Permintaan Rapor
                @elseif (Request::is('dashboard/learnings*'))
                    Evaluasi Pembelajaran
                @elseif (Request::is('dashboard/evaluasi-pembelajaran*'))
                    Evaluasi Pembelajaran
                @elseif (Request::is('dashboard/profile*'))
                    Profil
                @elseif (Request::is('administrator*'))
                    Tatausaha
                @else
                    Home
                @endif
            </h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/"><i class="bi bi-house-door"></i></a></li>
                    @if (Request::is('dashboard'))
                        <li class="breadcrumb-item active">
                            Dashboard
                        </li>
                    @elseif (Request::is('dashboard/galeri'))
                        <li class="breadcrumb-item active">
                            Galery
                        </li>
                    @elseif (Request::is('dashboard/learnings*'))
                        <li class="breadcrumb-item active">
                            Evaluasi Pembelajaran
                        </li>
                    @elseif (Request::is('dashboard/evaluasi-pembelajaran*'))
                        <li class="breadcrumb-item active">
                            Evaluasi Pembelajaran
                        </li>
                    @elseif (Request::is('dashboard/request-reports*'))
                        <li class="breadcrumb-item active">
                            Permintaan Rapor
                        </li>
                    @elseif (Request::is('dashboard/profile*'))
                        <li class="breadcrumb-item active">
                            Profil
                        </li>
                    @elseif (Request::is('administrator/tahun-ajaran'))
                        <li class="breadcrumb-item active">
                            Tahun Ajaran
                        </li>
                    @elseif (Request::is('administrator/semester'))
                        <li class="breadcrumb-item active">
                            Semester
                        </li>
                    @elseif (Request::is('administrator/kelompok*'))
                        @if (Request::is('administrator/kelompok/siswa/*'))
                            <li class="breadcrumb-item"><a href="/administrator/kelompok">Kelompok</a></li>
                            <li class="breadcrumb-item active" style="--bs-breadcrumb-divider: '>>';">
                                Kelompok Siswa
                            </li>
                        @else
                            <li class="breadcrumb-item active">
                                Kelompok
                            </li>
                        @endif
                    @elseif (Request::is('administrator/tema'))
                        <li class="breadcrumb-item active">
                            Tema
                        </li>
                    @elseif (Request::is('administrator/students*'))
                        @if (Request::is('administrator/students/create'))
                            <li class="breadcrumb-item"><a href="/administrator/students">Siswa</a></li>
                            <li class="breadcrumb-item active" style="--bs-breadcrumb-divider: '>>';">Tambah Siswa</li>
                        @elseif(Request::is('administrator/students/*/edit'))
                            <li class="breadcrumb-item"><a href="/administrator/students">Siswa</a></li>
                            <li class="breadcrumb-item active" style="--bs-breadcrumb-divider: '>>';">Edit Siswa
                                ({{ $data->nama }} -
                                {{ $data->no_induk }})</li>
                        @elseif(Request::is('administrator/students/*'))
                            <li class="breadcrumb-item"><a href="/administrator/students">Siswa</a></li>
                            <li class="breadcrumb-item active" style="--bs-breadcrumb-divider: '>>';">Detail Siswa
                                ({{ $data->nama }} -
                                {{ $data->no_induk }})</li>
                        @else
                            <li class="breadcrumb-item active">
                                Siswa
                            </li>
                        @endif
                    @elseif (Request::is('administrator/teachers*'))
                        @if (Request::is('administrator/teachers/create'))
                            <li class="breadcrumb-item"><a href="/administrator/teachers">Guru</a></li>
                            <li class="breadcrumb-item active" style="--bs-breadcrumb-divider: '>>';">Tambah Guru</li>
                        @elseif(Request::is('administrator/teachers/*/edit'))
                            <li class="breadcrumb-item"><a href="/administrator/teachers">Guru</a></li>
                            <li class="breadcrumb-item active" style="--bs-breadcrumb-divider: '>>';">Edit Guru
                                ({{ $data->nama_guru }} -
                                {{ $data->nuptk }})</li>
                        @elseif(Request::is('administrator/teachers/*'))
                            <li class="breadcrumb-item"><a href="/administrator/teachers">Guru</a></li>
                            <li class="breadcrumb-item active" style="--bs-breadcrumb-divider: '>>';">Detail Guru
                                ({{ $data->nama_guru }} -
                                {{ $data->nuptk }})</li>
                        @else
                            <li class="breadcrumb-item active">
                                Guru
                            </li>
                        @endif
                    @elseif (Request::is('administrator/users*'))
                        <li class="breadcrumb-item active">
                            Add Users
                        </li>
                    @elseif (Request::is('administrator/schedule*'))
                        <li class="breadcrumb-item active">
                            Jadwal
                        </li>
                    @else
                        <li class="breadcrumb-item active">
                            Home
                        </li>
                    @endif
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi check-circle"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('danger'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-x-circle"></i>
                {!! session('danger') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <section class="section dashboard">
            <div class="row">
                @yield('container')
            </div>
        </section>

    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="/js/jquery.min.js"></script>

    <!-- Vendor JS Files -->
    <script src="/assets/vendor/apexcharts/apexcharts.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/vendor/simple-datatables/simple-datatables.js"></script>
    {{-- <script src="/assets/vendor/php-email-form/validate.js"></script> --}}
    <script src="/js/flatpickr.min.js"></script>


    <!-- Jguery JS File -->
    <script src="/js/script.js"></script>

    <!-- Template Main JS File -->
    <script src="/assets/js/main.js"></script>

    <!-- <script src="js/script.js"></script> -->
    @stack('js')

</body>
