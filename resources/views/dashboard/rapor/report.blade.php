@extends('dashboard.layouts.main')

@push('css')
    {{--  --}}
@endpush

@push('js')
    <script>
        const clip = document.querySelectorAll(".hover-to-play");
        for (let i = 0; i < clip.length; i++) {
            clip[i].addEventListener("mouseenter", function(e) {
                clip[i].muted = true;
                clip[i].play();
            });
            clip[i].addEventListener("mouseout", function(e) {
                clip[i].muted = true;
                clip[i].pause();
            });
        }
    </script>
@endpush

@section('container')
    <div class="col-md">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" style="--bs-breadcrumb-divider: '>>';">

                    <li class="breadcrumb">
                        @can('akses', 'guru')
                            <span class="breadcrumb-item"><a href="/dashboard/learnings">Siswa</a></span>
                        @elsecan('akses', 'kepsek')
                            <span class="breadcrumb-item"><a
                                    href="/dashboard/evaluasi-pembelajaran/kelompok/siswas/{{ $siswa->kelompok_id }}">Siswa</a></span>
                        @endcan
                        <span class="breadcrumb-item active">Detail Report Siswa ({{ $siswa->nama }} -
                            {{ $siswa->no_induk }})</span>
                    </li>

                </ul>
                <div class="tab-content pt-3">
                    @if ($siswa->report->where('status', 'diterima')->count())
                        @foreach ($siswa->report->where('status', 'diterima') as $raport)
                            <div class="tab-pane fade show active profile-overview">
                                <div class="row g-0">
                                    <div class="col-md-2 ms-3 my-3 ps-3">
                                        @if ($siswa->photo)
                                            <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Profile" width="100"
                                                height="100" class="img-preview rounded-circle">
                                        @else
                                            <img src="/img/profile.jpg" alt="Profile" width="100" height="100"
                                                class=" rounded-circle">
                                        @endif
                                    </div>
                                    <div class="col-md">
                                        <div class="row">
                                            <div class="breadcrumb my-0 py-0 ps-4">
                                                <h5 class="card-title mb-0 pt-1 pb-2">{{ $siswa->nama }}</h5>
                                            </div>
                                            <div class="col-md">
                                                <div class="row">
                                                    <div class="card-body">
                                                        <div class="row breadcrumb m-0 p-0">
                                                            <label for="no_indukk" class="col-sm-4 col-form-label">Nomor
                                                                Induk</label>
                                                            <div class="col-sm">
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="no_induk" id="no_indukk"
                                                                    value="{{ $siswa->no_induk }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row breadcrumb m-0 p-0">
                                                            <label for="tgl_lahirr" class="col-sm-4 col-form-label">Tanggal
                                                                Lahir</label>
                                                            <div class="col-sm">
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="tgl_lahir" id="tgl_lahirr"
                                                                    value="{{ \Carbon\Carbon::parse($siswa->tgl_lahir)->translatedFormat('j F, Y') }}"
                                                                    disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div class="row align-items-center">
                                                    <div class="card-body">
                                                        <div class="row breadcrumb m-0 p-0">
                                                            <label for="kelompokk"
                                                                class="col-sm-4 col-form-label">Kelompok</label>
                                                            <div class="col-sm">
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="kelompok" id="kelompokk"
                                                                    value="{{ $siswa->kelompok->nama_kelompok }}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="row breadcrumb m-0 p-0">
                                                            <label for="semesterr"
                                                                class="col-sm-4 col-form-label">Semester</label>
                                                            <div class="col-sm">
                                                                <input class="form-control form-control-sm" type="text"
                                                                    name="semester" id="semesterr"
                                                                    value="Semester {{ $raport->semester }}" disabled>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $fileAgama = [];
                                    $fileMotorik = [];
                                    $fileKognitif = [];
                                    $fileSosial = [];
                                    $fileBahasa = [];
                                    $fileSeni = [];
                                    foreach ($raport->detailReport as $files) {
                                        if (substr($files->file_fotovideo, 14, 9) == 'nilai-aga') {
                                            $fileAgama[] = [
                                                'tipe_file' => $files->tipe_file,
                                                'file_fotovideo' => $files->file_fotovideo,
                                            ];
                                        } elseif (substr($files->file_fotovideo, 14, 9) == 'nilai-mot') {
                                            $fileMotorik[] = [
                                                'tipe_file' => $files->tipe_file,
                                                'file_fotovideo' => $files->file_fotovideo,
                                            ];
                                        } elseif (substr($files->file_fotovideo, 14, 9) == 'nilai-kog') {
                                            $fileKognitif[] = [
                                                'tipe_file' => $files->tipe_file,
                                                'file_fotovideo' => $files->file_fotovideo,
                                            ];
                                        } elseif (substr($files->file_fotovideo, 14, 9) == 'nilai-sos') {
                                            $fileSosial[] = [
                                                'tipe_file' => $files->tipe_file,
                                                'file_fotovideo' => $files->file_fotovideo,
                                            ];
                                        } elseif (substr($files->file_fotovideo, 14, 9) == 'nilai-bah') {
                                            $fileBahasa[] = [
                                                'tipe_file' => $files->tipe_file,
                                                'file_fotovideo' => $files->file_fotovideo,
                                            ];
                                        } elseif (substr($files->file_fotovideo, 14, 9) == 'nilai-sen') {
                                            $fileSeni[] = [
                                                'tipe_file' => $files->tipe_file,
                                                'file_fotovideo' => $files->file_fotovideo,
                                            ];
                                        }
                                    }
                                @endphp
                                <div class="card">
                                    <div class="card-body pt-2">
                                        {{-- @can('akses', 'guru')
                                        <form action="/learning/print" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $raport->id }}">
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                Print
                                                <i class="bi bi-printer-fill"></i>
                                            </button>
                                        </form>
                                        @endcan --}}
                                        <h5 class="card-title">
                                            Perkembangan Nilai Agama dan Moral
                                        </h5>
                                        <article class="card-text text-secondary mb-3">
                                            {!! $raport->nilai_agama !!}
                                        </article>
                                        {{-- @dd($raport->detailReport) --}}
                                        <div class="row">
                                            @foreach ($fileAgama as $agama)
                                                @if ($agama['tipe_file'] == 'video')
                                                    <div class="col-md-3 p-2">
                                                        <video src="{{ asset('storage/' . $agama['file_fotovideo']) }}"
                                                            type="video/mp4" loop class="hover-to-play w-100" controls>
                                                        </video>
                                                    </div>
                                                @endif
                                                @if ($agama['tipe_file'] == 'image')
                                                    <div class="col-md-3 p-2 portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $agama['file_fotovideo']) }}"
                                                                alt="Profile" class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <hr class="my-0 py-0">
                                        <h5 class="card-title">
                                            Perkembangan Motorik
                                        </h5>
                                        <article class="card-text text-secondary mb-3">
                                            {!! $raport->motorik !!}
                                        </article>
                                        <div class="row">
                                            @foreach ($fileMotorik as $motorik)
                                                @if ($motorik['tipe_file'] == 'video')
                                                    <div class="col-md-3 p-2">
                                                        <video src="{{ asset('storage/' . $motorik['file_fotovideo']) }}"
                                                            type="video/mp4" loop class="hover-to-play w-100" controls>
                                                        </video>
                                                    </div>
                                                @endif
                                                @if ($motorik['tipe_file'] == 'image')
                                                    <div class="col-md-3 p-2 portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $motorik['file_fotovideo']) }}"
                                                                alt="Profile" class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <hr class="my-0 py-0">
                                        <h5 class="card-title">
                                            Perkembangan Kognitif
                                        </h5>
                                        <article class="card-text text-secondary mb-3">
                                            {!! $raport->kognitif !!}
                                        </article>
                                        <div class="row">
                                            @foreach ($fileKognitif as $kognitif)
                                                @if ($kognitif['tipe_file'] == 'video')
                                                    <div class="col-md-3 p-2">
                                                        <video src="{{ asset('storage/' . $kognitif['file_fotovideo']) }}"
                                                            type="video/mp4" loop class="hover-to-play w-100" controls>
                                                        </video>
                                                    </div>
                                                @endif
                                                @if ($kognitif['tipe_file'] == 'image')
                                                    <div class="col-md-3 p-2 portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $kognitif['file_fotovideo']) }}"
                                                                alt="Profile" class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <hr class="my-0 py-0">
                                        <h5 class="card-title">
                                            Perkembangan Sosial Emosional
                                        </h5>
                                        <article class="card-text text-secondary mb-3">
                                            {!! $raport->sosial !!}
                                        </article>
                                        <div class="row">
                                            @foreach ($fileSosial as $sosial)
                                                @if ($sosial['tipe_file'] == 'video')
                                                    <div class="col-md-3 p-2">
                                                        <video src="{{ asset('storage/' . $sosial['file_fotovideo']) }}"
                                                            type="video/mp4" loop class="hover-to-play w-100" controls>
                                                        </video>
                                                    </div>
                                                @endif
                                                @if ($sosial['tipe_file'] == 'image')
                                                    <div class="col-md-3 p-2 portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $sosial['file_fotovideo']) }}"
                                                                alt="Profile" class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <hr class="my-0 py-0">
                                        <h5 class="card-title">
                                            Perkembangan Bahasa
                                        </h5>
                                        <article class="card-text text-secondary mb-3">
                                            {!! $raport->bahasa !!}
                                        </article>
                                        <div class="row">
                                            @foreach ($fileBahasa as $bahasa)
                                                @if ($bahasa['tipe_file'] == 'video')
                                                    <div class="col-md-3 p-2">
                                                        <video src="{{ asset('storage/' . $bahasa['file_fotovideo']) }}"
                                                            type="video/mp4" loop class="hover-to-play w-100" controls>
                                                        </video>
                                                    </div>
                                                @endif
                                                @if ($bahasa['tipe_file'] == 'image')
                                                    <div class="col-md-3 p-2 portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $bahasa['file_fotovideo']) }}"
                                                                alt="Profile" class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <hr class="my-0 py-0">
                                        <h5 class="card-title">
                                            Perkembangan Seni
                                        </h5>
                                        <article class="card-text text-secondary">
                                            {!! $raport->seni !!}
                                        </article>
                                        <div class="row">
                                            @foreach ($fileSeni as $seni)
                                                @if ($seni['tipe_file'] == 'video')
                                                    <div class="col-md-3 p-2">
                                                        <video src="{{ asset('storage/' . $seni['file_fotovideo']) }}"
                                                            type="video/mp4" loop class="hover-to-play w-100" controls>
                                                        </video>
                                                    </div>
                                                @endif
                                                @if ($seni['tipe_file'] == 'image')
                                                    <div class="col-md-3 p-2 portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $seni['file_fotovideo']) }}"
                                                                alt="Profile" class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endif
                                            @endforeach
                                        </div>
                                        <hr class="my-0 py-0">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="tab-pane fade show active profile-overview">
                            <div class="row g-0">
                                <div class="col-md-2 ms-3 mb-3 ps-3">
                                    @if ($siswa->photo)
                                        <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Profile" width="100"
                                            height="100" class="img-preview rounded-circle">
                                    @else
                                        <img src="/img/profile.jpg" alt="Profile" width="100" height="100"
                                            class=" rounded-circle">
                                    @endif
                                </div>
                                <div class="col-md">
                                    <div class="row">
                                        <div class="breadcrumb my-0 py-0 ps-4">
                                            <h5 class="card-title mb-0 pt-1 pb-2">{{ $siswa->nama }}</h5>
                                        </div>
                                        <div class="col-md">
                                            <div class="row">
                                                <div class="card-body">
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="no_induk" class="col-sm-4 col-form-label">Nomor
                                                            Induk</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="no_induk" id="no_induk"
                                                                value="{{ $siswa->no_induk }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal
                                                            Lahir</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="tgl_lahir" id="tgl_lahir"
                                                                value="{{ \Carbon\Carbon::parse($siswa->tgl_lahir)->translatedFormat('j F, Y') }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="row align-items-center">
                                                <div class="card-body">
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="kelompok"
                                                            class="col-sm-4 col-form-label">Kelompok</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="kelompok" id="kelompok"
                                                                value="{{ $siswa->kelompok->nama_kelompok }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="semester"
                                                            class="col-sm-4 col-form-label">Semester</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="semester" id="semester" value=" - " disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- End Bordered Tabs -->


                @if ($tema->count())
                    <div class="card">
                        <div class="card-body pt-3">

                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#{{ $tema[0]->id }}">{{ $tema[0]->nama_tema }}</button>
                                </li>
                                @foreach ($tema->skip(1) as $item)
                                    <li class="nav-item">
                                        <button class="nav-link" data-bs-toggle="tab"
                                            data-bs-target="#{{ $item->id }}">
                                            {{ $item->nama_tema }}
                                        </button>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="{{ $tema[0]->id }}">
                                    <h6 class="card-title">Grafik Perkembangan {{ $tema[0]->nama_tema }}</h6>
                                    @php
                                        $data = [];
                                        $label = [];
                                        $name = $tema[0]->nama_tema;
                                        $i = 1;
                                        foreach ($rating->where('tema_id', $tema[0]->id) as $item) {
                                            $data[] = $item->star_rated;
                                            $label[] = 'Ke ' . $i;
                                        
                                            $i++;
                                        }
                                    @endphp

                                    <!-- Column Chart -->
                                    <div class="col-lg-6" id="columnChart"></div>

                                    <script>
                                        var name = {{ Js::from($name) }};
                                        var data = {{ Js::from($data) }};
                                        var label = {{ Js::from($label) }};
                                        document.addEventListener("DOMContentLoaded", () => {
                                            new ApexCharts(document.querySelector("#columnChart"), {
                                                series: [{
                                                    name: name,
                                                    data: data
                                                }],
                                                chart: {
                                                    type: 'bar',
                                                    height: 350
                                                },
                                                plotOptions: {
                                                    bar: {
                                                        horizontal: false,
                                                        columnWidth: '55%',
                                                        endingShape: 'rounded'
                                                    },
                                                },
                                                dataLabels: {
                                                    enabled: false
                                                },
                                                stroke: {
                                                    show: true,
                                                    width: 2,
                                                    colors: ['transparent']
                                                },
                                                xaxis: {
                                                    categories: label,
                                                    title: {
                                                        text: 'Pertemuan'
                                                    }
                                                },
                                                yaxis: {
                                                    title: {
                                                        text: 'Stars'
                                                    }
                                                },
                                                fill: {
                                                    opacity: 1
                                                },
                                                tooltip: {
                                                    y: {
                                                        formatter: function(val) {
                                                            return val + " Stars"
                                                        }
                                                    }
                                                }
                                            }).render();
                                        });
                                    </script>
                                    <!-- End Column Chart -->
                                </div>

                                @foreach ($tema->skip(1) as $item2)
                                    <div class="tab-pane fade profile-overview" id="{{ $item2->id }}">
                                        <h6 class="card-title">Grafik Perkembangan {{ $item2->nama_tema }}</h6>
                                        @php
                                            $data1 = [];
                                            $label1 = [];
                                            $name1 = $item2->nama_tema;
                                            $i = 1;
                                            foreach ($rating->where('tema_id', $item2->id) as $rate) {
                                                $data1[] = $rate->star_rated;
                                                $label1[] = 'Ke ' . $i;
                                            
                                                $i++;
                                            }
                                        @endphp

                                        <!-- Column Chart -->
                                        <div class="col-lg-6" id="columnChart{{ $item2->id }}"></div>

                                        <script>
                                            const name{!! $item2->id !!} = {!! Illuminate\Support\Js::from($name1) !!};
                                            const data{!! $item2->id !!} = {!! Illuminate\Support\Js::from($data1) !!};
                                            const label{!! $item2->id !!} = {!! Illuminate\Support\Js::from($label1) !!};

                                            document.addEventListener("DOMContentLoaded", () => {
                                                new ApexCharts(document.querySelector("#columnChart{{ $item2->id }}"), {
                                                    series: [{
                                                        name: name{!! $item2->id !!},
                                                        data: data{!! $item2->id !!}
                                                    }],
                                                    chart: {
                                                        type: 'bar',
                                                        height: 350
                                                    },
                                                    plotOptions: {
                                                        bar: {
                                                            horizontal: false,
                                                            columnWidth: '55%',
                                                            endingShape: 'rounded'
                                                        },
                                                    },
                                                    dataLabels: {
                                                        enabled: false
                                                    },
                                                    stroke: {
                                                        show: true,
                                                        width: 2,
                                                        colors: ['transparent']
                                                    },
                                                    xaxis: {
                                                        categories: label{!! $item2->id !!},
                                                        title: {
                                                            text: 'Pertemuan'
                                                        }
                                                    },
                                                    yaxis: {
                                                        title: {
                                                            text: 'Stars'
                                                        }
                                                    },
                                                    fill: {
                                                        opacity: 1
                                                    },
                                                    tooltip: {
                                                        y: {
                                                            formatter: function(val) {
                                                                return val + " Stars"
                                                            }
                                                        }
                                                    }
                                                }).render();
                                            });
                                        </script>
                                        <!-- End Column Chart -->

                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                @endif

            </div>
        </div>
        <div class="d-flex justify-content-end me-5 mb-3">
            @can('akses', 'guru')
                <a href="/dashboard/learnings" class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line"></i>
                    Kembali
                </a>
            @elsecan('akses', 'kepsek')
                <a href="/dashboard/evaluasi-pembelajaran/kelompok/siswas/{{ $siswa->kelompok_id }}"
                    class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line"></i>
                    Kembali
                </a>
            @endcan
        </div>
    </div>
@endsection
