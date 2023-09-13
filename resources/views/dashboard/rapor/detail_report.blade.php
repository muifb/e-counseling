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
            <div class="card-body p-4">
                <div class="row g-0">
                    <div class="col-md-2 ms-3 my-3 ps-3">
                        @if ($report->siswa->photo)
                            <img src="{{ asset('storage/' . $report->siswa->photo) }}" alt="Profile" width="100"
                                height="100" class="img-preview rounded-circle">
                        @else
                            <img src="/img/profile.jpg" alt="Profile" width="100" height="100"
                                class=" rounded-circle">
                        @endif
                    </div>
                    <div class="col-md">
                        <div class="row">
                            <div class="breadcrumb my-0 py-0 ps-4">
                                <h5 class="card-title mb-0 pt-1 pb-2">{{ $report->siswa->nama }}</h5>
                            </div>
                            <div class="col-md">
                                <div class="row">
                                    <div class="card-body">
                                        <div class="row breadcrumb m-0 p-0">
                                            <label for="no_indukk" class="col-sm-4 col-form-label">Nomor
                                                Induk</label>
                                            <div class="col-sm">
                                                <input class="form-control form-control-sm" type="text" name="no_induk"
                                                    id="no_indukk" value="{{ $report->siswa->no_induk }}" disabled>
                                            </div>
                                        </div>
                                        <div class="row breadcrumb m-0 p-0">
                                            <label for="tgl_lahirr" class="col-sm-4 col-form-label">Tanggal
                                                Lahir</label>
                                            <div class="col-sm">
                                                <input class="form-control form-control-sm" type="text" name="tgl_lahir"
                                                    id="tgl_lahirr"
                                                    value="{{ \Carbon\Carbon::parse($report->siswa->tgl_lahir)->translatedFormat('j F, Y') }}"
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
                                            <label for="kelompokk" class="col-sm-4 col-form-label">Kelompok</label>
                                            <div class="col-sm">
                                                <input class="form-control form-control-sm" type="text" name="kelompok"
                                                    id="kelompokk" value="{{ $report->siswa->kelompok->nama_kelompok }}"
                                                    disabled>
                                            </div>
                                        </div>
                                        <div class="row breadcrumb m-0 p-0">
                                            <label for="semesterr" class="col-sm-4 col-form-label">Semester</label>
                                            <div class="col-sm">
                                                <input class="form-control form-control-sm" type="text" name="semester"
                                                    id="semesterr" value="{{ $report->semester }}" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                @php
                    $fileAgama = [];
                    $fileMotorik = [];
                    $fileKognitif = [];
                    $fileSosial = [];
                    $fileBahasa = [];
                    $fileSeni = [];
                    foreach ($report->detailReport as $files) {
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
                <h5 class="card-title">
                    Perkembangan Nilai Agama dan Moral
                </h5>
                <article class="card-text text-secondary mb-3">
                    {!! $report->nilai_agama !!}
                </article>
                <div class="row">
                    @foreach ($fileAgama as $agama)
                        @if ($agama['tipe_file'] == 'video')
                            <div class="col-md-3 p-2">
                                <video src="{{ asset('storage/' . $agama['file_fotovideo']) }}" type="video/mp4" loop
                                    class="hover-to-play w-100" controls>
                                </video>
                            </div>
                        @endif
                        @if ($agama['tipe_file'] == 'image')
                            <div class="col-md-3 p-2 portfolio-item">
                                <div class="portfolio-img">
                                    <img src="{{ asset('storage/' . $agama['file_fotovideo']) }}" alt="Profile"
                                        class="img-fluid">
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
                    {!! $report->motorik !!}
                </article>
                <div class="row">
                    @foreach ($fileMotorik as $motorik)
                        @if ($motorik['tipe_file'] == 'video')
                            <div class="col-md-3 p-2">
                                <video src="{{ asset('storage/' . $motorik['file_fotovideo']) }}" type="video/mp4" loop
                                    class="hover-to-play w-100" controls>
                                </video>
                            </div>
                        @endif
                        @if ($motorik['tipe_file'] == 'image')
                            <div class="col-md-3 p-2 portfolio-item">
                                <div class="portfolio-img">
                                    <img src="{{ asset('storage/' . $motorik['file_fotovideo']) }}" alt="Profile"
                                        class="img-fluid">
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
                    {!! $report->kognitif !!}
                </article>
                <div class="row">
                    @foreach ($fileKognitif as $kognitif)
                        @if ($kognitif['tipe_file'] == 'video')
                            <div class="col-md-3 p-2">
                                <video src="{{ asset('storage/' . $kognitif['file_fotovideo']) }}" type="video/mp4" loop
                                    class="hover-to-play w-100" controls>
                                </video>
                            </div>
                        @endif
                        @if ($kognitif['tipe_file'] == 'image')
                            <div class="col-md-3 p-2 portfolio-item">
                                <div class="portfolio-img">
                                    <img src="{{ asset('storage/' . $kognitif['file_fotovideo']) }}" alt="Profile"
                                        class="img-fluid">
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
                    {!! $report->sosial !!}
                </article>
                <div class="row">
                    @foreach ($fileSosial as $sosial)
                        @if ($sosial['tipe_file'] == 'video')
                            <div class="col-md-3 p-2">
                                <video src="{{ asset('storage/' . $sosial['file_fotovideo']) }}" type="video/mp4" loop
                                    class="hover-to-play w-100" controls>
                                </video>
                            </div>
                        @endif
                        @if ($sosial['tipe_file'] == 'image')
                            <div class="col-md-3 p-2 portfolio-item">
                                <div class="portfolio-img">
                                    <img src="{{ asset('storage/' . $sosial['file_fotovideo']) }}" alt="Profile"
                                        class="img-fluid">
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
                    {!! $report->bahasa !!}
                </article>
                <div class="row">
                    @foreach ($fileBahasa as $bahasa)
                        @if ($bahasa['tipe_file'] == 'video')
                            <div class="col-md-3 p-2">
                                <video src="{{ asset('storage/' . $bahasa['file_fotovideo']) }}" type="video/mp4" loop
                                    class="hover-to-play w-100" controls>
                                </video>
                            </div>
                        @endif
                        @if ($bahasa['tipe_file'] == 'image')
                            <div class="col-md-3 p-2 portfolio-item">
                                <div class="portfolio-img">
                                    <img src="{{ asset('storage/' . $bahasa['file_fotovideo']) }}" alt="Profile"
                                        class="img-fluid">
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
                    {!! $report->seni !!}
                </article>
                <div class="row">
                    @foreach ($fileSeni as $seni)
                        @if ($seni['tipe_file'] == 'video')
                            <div class="col-md-3 p-2">
                                <video src="{{ asset('storage/' . $seni['file_fotovideo']) }}" type="video/mp4" loop
                                    class="hover-to-play w-100" controls>
                                </video>
                            </div>
                        @endif
                        @if ($seni['tipe_file'] == 'image')
                            <div class="col-md-3 p-2 portfolio-item">
                                <div class="portfolio-img">
                                    <img src="{{ asset('storage/' . $seni['file_fotovideo']) }}" alt="Profile"
                                        class="img-fluid">
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <hr>

                <div class="text-end">
                    <form action="/dashboard/learnings/reject" class="d-inline needs-validation" novalidate
                        method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $report->id }}">
                        <input type="hidden" name="kelompok_id" value="{{ $report->siswa->kelompok_id }}">
                        <input type="text" class="form-control mb-2" name="saran" placeholder="alasan menolak"
                            required>
                        <button type="submit" class="btn btn-danger" php>Tolak</button>
                        <a href="/dashboard/request-reports/detail-reports/{{ $report->siswa->kelompok_id }}"
                            class="btn btn-secondary">
                            <i class="ri-arrow-go-back-line"></i>
                            Kembali
                        </a>
                    </form>

                    {{-- <form action="/dashboard/learnings/accept" class="d-inline needs-validation" novalidate
                        method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{ $report->id }}">
                        <input type="hidden" name="kelompok_id" value="{{ $report->siswa->kelompok_id }}">
                        <button type="submit" class="btn btn-primary" php>Terima</button>
                    </form> --}}
                </div>

            </div>
        </div>
    </div>
@endsection
