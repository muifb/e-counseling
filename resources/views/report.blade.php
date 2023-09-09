@extends('layouts.main')

@push('css')
    @livewireStyles
@endpush

@push('js')
    @livewireScripts

    <script>
        Livewire.on('comment_store', commentId => {
            var viewScroll = document.getElementById('comment-' + commentId);
            viewScroll.scrollIntoView({
                behavior: 'smooth'
            }, true);
        })

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

@section('sections')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol class="pb-1">
                <li><a href="/">Home</a></li>
                <li>Hasil Belajar Anak</li>
            </ol>
            <h2 class="mb-0">Hasil Belajar Anak</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div class="col-xl">

                <div class="card">
                    <div class="card-body pt-3">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" style="--bs-breadcrumb-divider: '>>';">

                            <li class="breadcrumb">
                                <span class="breadcrumb-item"><a href="#">Report Siswa</a></span>
                                <span class="breadcrumb-item active">Detail Report Siswa ({{ $siswa->nama }} -
                                    {{ $siswa->no_induk }})</span>
                            </li>

                        </ul>
                        <div class="tab-content">

                            @if ($siswa->report->where('status', 'diterima')->count())
                                @foreach ($siswa->report->where('status', 'diterima') as $item)
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <div class="m-3 d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                @if ($siswa->photo)
                                                    <div class="rounded-circle" style="max-height: 75px; overflow:hidden;">
                                                        <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Profile"
                                                            width="75px">
                                                    </div>
                                                @else
                                                    <div class="rounded-circle" style="max-height: 75px; overflow:hidden;">
                                                        <img src="/img/profile.jpg" alt="Profile" width="75px">
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h5 class="card-title my-0">{{ $siswa->nama }}</h5>
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div class="breadcrumb my-0 py-0">
                                                            <span class="breadcrumb-item active">Nis :
                                                                {{ $siswa->no_induk }}</span>
                                                        </div>
                                                        <div class="breadcrumb my-0 py-0">
                                                            <span class="breadcrumb-item active">Tanggal Lahir :
                                                                {{ \Carbon\Carbon::parse($siswa->tgl_lahir)->translatedFormat('j F, Y') }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <div class="breadcrumb my-0 py-0">
                                                            <span class="breadcrumb-item active">Kelompok :
                                                                {{ $siswa->kelompok->nama_kelompok }}</span>
                                                        </div>
                                                        <div class="breadcrumb my-0 py-0">
                                                            <span class="breadcrumb-item active">Semester :
                                                                {{ $item->semester }}</span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-body">
                                                {{-- <form action="/learning/print" class="mb-3" target="__blank"
                                                    method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        Print
                                                        <i class="bi bi-printer-fill"></i>
                                                    </button>
                                                </form> --}}
                                                <h5 class="card-title">
                                                    Perkembangan Nilai Agama dan Moral
                                                </h5>
                                                <article class="card-text text-secondary mb-3">
                                                    {!! $item->nilai_agama !!}
                                                </article>
                                                <div class="row">
                                                    @foreach ($item->detailReport as $files)
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'video/nilai-aga')
                                                            <div class="col-md-3 p-2">
                                                                <video
                                                                    src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                    type="video/mp4" loop class="hover-to-play w-100"
                                                                    controls>
                                                                </video>
                                                            </div>
                                                        @endif
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'image/nilai-aga')
                                                            <div class="col-md-3 p-2 portfolio-item">
                                                                <div class="portfolio-img">
                                                                    <img src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                        alt="Profile" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <h5 class="card-title">
                                                    Perkembangan Motorik
                                                </h5>
                                                <article class="card-text text-secondary mb-3">
                                                    {!! $item->motorik !!}
                                                </article>
                                                <div class="row">
                                                    @foreach ($item->detailReport as $files)
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'video/nilai-mot')
                                                            <div class="col-md-3 p-2">
                                                                <video
                                                                    src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                    type="video/mp4" loop class="hover-to-play w-100"
                                                                    controls>
                                                                </video>
                                                            </div>
                                                        @endif
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'image/nilai-mot')
                                                            <div class="col-md-3 p-2 portfolio-item">
                                                                <div class="portfolio-img">
                                                                    <img src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                        alt="Profile" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <h5 class="card-title">
                                                    Perkembangan Kognitif
                                                </h5>
                                                <article class="card-text text-secondary mb-3">
                                                    {!! $item->kognitif !!}
                                                </article>
                                                <div class="row">
                                                    @foreach ($item->detailReport as $files)
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'video/nilai-kog')
                                                            <div class="col-md-3 p-2">
                                                                <video
                                                                    src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                    type="video/mp4" loop class="hover-to-play w-100"
                                                                    controls>
                                                                </video>
                                                            </div>
                                                        @endif
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'image/nilai-kog')
                                                            <div class="col-md-3 p-2 portfolio-item">
                                                                <div class="portfolio-img">
                                                                    <img src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                        alt="Profile" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <h5 class="card-title">
                                                    Perkembangan Sosial Emosional
                                                </h5>
                                                <article class="card-text text-secondary mb-3">
                                                    {!! $item->sosial !!}
                                                </article>
                                                <div class="row">
                                                    @foreach ($item->detailReport as $files)
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'video/nilai-sos')
                                                            <div class="col-md-3 p-2">
                                                                <video
                                                                    src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                    type="video/mp4" loop class="hover-to-play w-100"
                                                                    controls>
                                                                </video>
                                                            </div>
                                                        @endif
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'image/nilai-sos')
                                                            <div class="col-md-3 p-2 portfolio-item">
                                                                <div class="portfolio-img">
                                                                    <img src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                        alt="Profile" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <h5 class="card-title">
                                                    Perkembangan Bahasa
                                                </h5>
                                                <article class="card-text text-secondary mb-3">
                                                    {!! $item->bahasa !!}
                                                </article>
                                                <div class="row">
                                                    @foreach ($item->detailReport as $files)
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'video/nilai-bah')
                                                            <div class="col-md-3 p-2">
                                                                <video
                                                                    src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                    type="video/mp4" loop class="hover-to-play w-100"
                                                                    controls>
                                                                </video>
                                                            </div>
                                                        @endif
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'image/nilai-bah')
                                                            <div class="col-md-3 p-2 portfolio-item">
                                                                <div class="portfolio-img">
                                                                    <img src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                        alt="Profile" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <hr>
                                                <h5 class="card-title">
                                                    Perkembangan Seni
                                                </h5>
                                                <article class="card-text text-secondary mb-3">
                                                    {!! $item->seni !!}
                                                </article>
                                                <div class="row">
                                                    @foreach ($item->detailReport as $files)
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'video/nilai-sen')
                                                            <div class="col-md-3 p-2">
                                                                <video
                                                                    src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                    type="video/mp4" loop class="hover-to-play w-100"
                                                                    controls>
                                                                </video>
                                                            </div>
                                                        @endif
                                                        @if (substr($files->file_fotovideo, 14, 15) == 'image/nilai-sen')
                                                            <div class="col-md-3 p-2 portfolio-item">
                                                                <div class="portfolio-img">
                                                                    <img src="{{ asset('storage/' . $files->file_fotovideo) }}"
                                                                        alt="Profile" class="img-fluid">
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <hr>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <div class="m-3 d-flex align-items-center">
                                        <div class="flex-shrink-0">
                                            @if ($siswa->photo)
                                                <div class="rounded-circle" style="max-height: 75px; overflow:hidden;">
                                                    <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Profile"
                                                        width="75px">
                                                </div>
                                            @else
                                                <div class="rounded-circle" style="max-height: 75px; overflow:hidden;">
                                                    <img src="/img/profile.jpg" alt="Profile" width="75px">
                                                </div>
                                            @endif
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h5 class="card-title my-0">{{ $siswa->nama }}</h5>
                                            <div class="row">
                                                <div class="col-md-5">
                                                    <div class="breadcrumb my-0 py-0">
                                                        <span class="breadcrumb-item active">Nis :
                                                            {{ $siswa->no_induk }}</span>
                                                    </div>
                                                    <div class="breadcrumb my-0 py-0">
                                                        <span class="breadcrumb-item active">Tanggal Lahir :
                                                            {{ \Carbon\Carbon::parse($siswa->tgl_lahir)->format('j F, Y') }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-5">
                                                    <div class="breadcrumb my-0 py-0">
                                                        <span class="breadcrumb-item active">Kelompok :
                                                            @if (!$siswa->kelompok_id)
                                                                Belum ada kelompok.
                                                            @else
                                                                {{ $siswa->kelompok->nama_kelompok }}
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <div class="breadcrumb my-0 py-0">
                                                        <span class="breadcrumb-item active">Semester :
                                                            -</span>
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
                            <div class="card my-3">
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
                                                    var name{{ $item2->id }} = {{ Js::from($name1) }};
                                                    var data{{ $item2->id }} = {{ Js::from($data1) }};
                                                    var label{{ $item2->id }} = {{ Js::from($label1) }};
                                                    document.addEventListener("DOMContentLoaded", () => {
                                                        new ApexCharts(document.querySelector("#columnChart{{ $item2->id }}"), {
                                                            series: [{
                                                                name: name{{ $item2->id }},
                                                                data: data{{ $item2->id }}
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
                                                                categories: label{{ $item2->id }},
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
            </div>
        </div>
    </section>
@endsection
