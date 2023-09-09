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

    <!-- Template Main CSS File -->
    <link href="/assets/css/style.css" rel="stylesheet">

    <style>
        body {
            font-family: "Roboto", sans-serif;
            background: #f6f9ff;
            color: #444444;
        }

        /* .print {
            visibility: hidden
        } */

        .card-title {
            color: black;
        }

        .list-title {
            color: black;
        }

        @media print {
            .no-print {
                display: none;
            }

            .print {
                visibility: visible;
            }

            .cover-break {
                break-after: page;
            }

            .halaman-break {
                break-after: page;
            }
        }
    </style>
    @stack('css')

</head>

<body>
    <!-- Main page content-->
    <main class="print">
        <!-- Page Title -->
        <div class="container">
            <div class="pagetitle">
                <h5 class="card-title py-1 text-secondary">
                    Evaluasi Pembelajaran
                </h5>
            </div>
            @cannot('akses', 'wali')
                <a href="/dashboard/learnings/see-report/{{ $raport->siswa->id }}" class="btn btn-danger btn-sm no-print">
                    Kembali
                </a>
            @endcannot
        </div>
        <div class="row">
            <div class="print">
                <div class="text-center pt-5">
                    <h1 class="card-title mt-5 mb-3">
                        <div>LAPORAN</div>
                        <div>PERKEMBANGAN ANAK DIDIK</div>
                        <div>RAUDHATUL ATHFAL</div>
                        <div>(RA)</div>
                    </h1>
                    <img class="my-5" src="/img/logo.png" width="200rem" alt="">
                    <h1 class="card-title my-3">
                        <div>Nama Peserta Didik:</div>
                        <div>{{ $raport->siswa->nama }}</div>
                        <div>NIS:</div>
                        <div>{{ $raport->siswa->no_induk }}</div>
                    </h1>
                    <br><br>
                    <h1 class="card-title my-5 cover-break">
                        <div>RAUDHATUL ATHFAL AL MASKURI</div>
                        <div>KEMENTRIAN AGAMA REPUBLIK INDONESIA</div>
                        <div>PROVINSI JAWA TENGAH</div>
                    </h1>
                </div>
                <div class="card-title text-center mt-5">
                    <h3><strong>LAPORAN PERKEMBANGAN ANAK DIDIK</strong></h3>
                    <h3><strong>RAUDHATUL ATHFAL (RA)</strong></h3>
                    <h3><strong>TAHUN AJARAN 2022/2023</strong></h3>
                </div>
                <div class="container mt-5 halaman-break">
                    <table class="card-title">
                        <thead>
                            <tr>
                                <th>
                                    <h3>Nama</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>:</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>AL MASKURI</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h3>NSM</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>: </h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>101233180225</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h3>Alamat</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>: </h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>Jl. Raya Kayen-Sumbersari RT.02 RW.03</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h3>Desa/Kelurahan</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>: </h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>Kayen</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h3>Kecamatan</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>: </h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>Kayen</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h3>Kota/Kabupaten</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>: </h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>Pati</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h3>Provinsi</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>: </h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>Jawa Tengah</h3>
                                </th>
                            </tr>
                            <tr>
                                <th>
                                    <h3>Kepala RA</h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>: </h3>
                                </th>
                                <th>
                                    <h3>&nbsp;</h3>
                                </th>
                                <th>
                                    <h3>{{ ucwords(strtolower($kepsek->first()->nama_guru)) }}</h3>
                                </th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-title text-center mt-5">
                    <h3><strong>IDENTITAS PESERTA DIDIK</strong></h3>
                </div>
                <div class="container mt-5 halaman-break">
                    <div class="row list-title mb-2">
                        <h5 class="col-4">Nama Lengkap</h5>
                        <h5 class="col-8">:&ensp;{{ ucwords(strtolower($raport->siswa->nama)) }}</h5>
                    </div>
                    <div class="row list-title mb-2">
                        <h5 class="col-4">No Induk</h5>
                        <h5 class="col-8">:&ensp;{{ $raport->siswa->no_induk }}</h5>
                    </div>
                    <div class="row list-title mb-2">
                        <h5 class="col-4">Tempat, Tanggal Lahir</h5>
                        <h5 class="col-8">:&ensp;{{ ucwords(strtolower($raport->siswa->tempat_lahir)) }},
                            {{ \Carbon\Carbon::parse($raport->siswa->tgl_lahir)->translatedFormat('d F Y') }}</h5>
                    </div>
                    <div class="row list-title mb-2">
                        <h5 class="col-4">Jenis Kelamin</h5>
                        <h5 class="col-8">:&ensp;{{ $raport->siswa->jk_siswa }}</h5>
                    </div>
                    <div class="row list-title mb-2">
                        <h5 class="col-4">Agama</h5>
                        <h5 class="col-8">:&ensp;Islam</h5>
                    </div>
                    <div class="row list-title mb-2">
                        <h5 class="col-4">Nama Orang Tua</h5>
                        <h5 class="col-8">:&ensp;{{ ucwords(strtolower($raport->siswa->nama_ortu)) }}</h5>
                    </div>
                    <div class="row list-title mb-5">
                        <h5 class="col-4">Alamat</h5>
                        <h5 class="col-8">:&ensp;{{ ucwords(strtolower($raport->siswa->alamat)) }}</h5>
                    </div>
                    <br><br><br>
                    <div class="row my-5 ms-5">
                        <label class="col-6">
                            @if ($raport->siswa->photo)
                                <img class="rounded border border-black"
                                    src="{{ asset('storage/' . $raport->siswa->photo) }}" height="200rem"
                                    alt="foto siswa">
                            @else
                                <img class="rounded border border-black" src="/img/profile.jpg" height="200rem"
                                    alt="foto siswa">
                            @endif
                        </label>
                        <div class="col-5">
                            <div class="list-title">
                                <strong class="fs-6">Kab. Pati,
                                    {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</strong>
                            </div>
                            <div class="list-title">
                                <strong class="fs-6">Kepala Raudhatul Athfal,</strong>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="list-title">
                                <strong
                                    class="fs-6">({{ ucwords(strtolower($kepsek->first()->nama_guru)) }})</strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container mb-5">
                    <div class="row">
                        <div class="col-7">
                            <div class="row list-title">
                                <div class="col-4"><strong class="fs-6">Nama</strong></div>
                                <div class="col-8">
                                    <strong class="fs-6">:&ensp;{{ $raport->siswa->nama }}</strong>
                                </div>
                            </div>
                            <div class="row list-title">
                                <div class="col-4"><strong class="fs-6">No Induk</strong></div>
                                <div class="col-8">
                                    <strong class="fs-6">:&ensp;{{ $raport->siswa->no_induk }}</strong>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="col-1">&nbsp;</div> --}}
                        <div class="col-5">
                            <div class="row list-title">
                                <div class="col-4"><strong class="fs-6">Kelompok </strong></div>
                                <div class="col-8">
                                    <strong
                                        class="fs-6">:&ensp;{{ $raport->siswa->kelompok->nama_kelompok }}</strong>
                                </div>
                            </div>
                            <div class="row list-title">
                                <div class="col-4"><strong class="fs-6">Semester </strong></div>
                                <div class="col-8">
                                    <strong class="fs-6">:&ensp;{{ $raport->semester }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="mb-3">
                    <h5 class="card-title">
                        Perkembangan Nilai Agama dan Moral
                    </h5>
                    <article class="card-text text-secondary mb-3">
                        {!! $raport->nilai_agama !!}
                    </article>
                    <hr>
                    <h5 class="card-title">
                        Perkembangan Motorik
                    </h5>
                    <article class="card-text text-secondary mb-3">
                        {!! $raport->motorik !!}
                    </article>
                    <hr>
                    <h5 class="card-title">
                        Perkembangan Kognitif
                    </h5>
                    <article class="card-text text-secondary mb-3">
                        {!! $raport->kognitif !!}
                    </article>
                    <hr>
                    <h5 class="card-title">
                        Perkembangan Sosial Emosional
                    </h5>
                    <article class="card-text text-secondary mb-3">
                        {!! $raport->sosial !!}
                    </article>
                    <hr>
                    <h5 class="card-title">
                        Perkembangan Bahasa
                    </h5>
                    <article class="card-text text-secondary mb-3">
                        {!! $raport->bahasa !!}
                    </article>
                    <hr>
                    <h5 class="card-title">
                        Perkembangan Seni
                    </h5>
                    <article class="card-text text-secondary mb-3">
                        {!! $raport->seni !!}
                    </article>
                    <hr>
                </div>
                <br><br><br>
                <div class="container my-5">
                    <div class="row">
                        <div class="col align-self-start text-center">
                            <div class="list-title">
                                <strong class="fs-6">&nbsp;</strong>
                            </div>
                            <div class="list-title">
                                <strong class="fs-6">Orang Tua/Wali</strong>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="list-title">
                                <strong class="fs-6">{{ ucwords(strtolower($raport->siswa->nama_ortu)) }}</strong>
                            </div>
                        </div>
                        <div class="col align-self-center">
                            &nbsp;
                        </div>
                        <div class="col align-self-end text-center">
                            <div class="list-title">
                                <strong class="fs-6">Pati,
                                    {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</strong>
                            </div>
                            <div class="list-title">
                                <strong class="fs-6">Guru Kelas,</strong>
                            </div>
                            <br>
                            <br>
                            <br>
                            <br>
                            <div class="list-title">
                                <strong class="fs-6">{{ ucwords(strtolower($raport->guru->nama_guru)) }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </main><!-- End #main -->

    <script>
        window.print();
    </script>

</body>
