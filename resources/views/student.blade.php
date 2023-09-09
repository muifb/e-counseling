@extends('layouts.main')

@section('sections')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol class="pb-1">
                <li><a href="/">Home</a></li>
                <li>Informasi Siswa</li>
            </ol>
            <h2 class="mb-1">Informasi Siswa</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row gy-4">

                <div class="col-md-4">
                    <div class="portfolio-info d-flex flex-column align-items-center p-3">
                        @if ($data->photo)
                            <div class="rounded-circle" style="max-height: 200px; overflow:hidden;">
                                <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile" width="200px"
                                    class="mb-3">
                            </div>
                        @else
                            <div class="rounded-circle" style="max-height: 200px; overflow:hidden;">
                                <img src="/img/profile.jpg" alt="Profile" width="200px" class="mb-3">
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="portfolio-info">
                        <h3>Student information</h3>
                        <ul>
                            <li><strong>Nama</strong>: {{ $data->nama }}</li>
                            <li><strong>Nomor Induk</strong>: {{ $data->no_induk }}</li>
                            <li>
                                <strong>Kelompok</strong>:
                                @if (!$data->kelompok_id)
                                    Belum ada kelas.
                                @else
                                    {{ $data->kelompok->nama_kelompok }}
                                @endif
                            </li>
                            <li><strong>Tempat lahir</strong>: {{ $data->tempat_lahir }}</li>
                            <li><strong>Tanggal lahir</strong>:
                                {{ \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('j F, Y') }}
                            </li>
                            <li><strong>Usia</strong>:
                                {{ \Carbon\Carbon::parse($data->tgl_lahir)->age }} Tahun
                            </li>
                            <li><strong>Jenis Kelamin</strong>: {{ $data->jk_siswa }}</li>
                            <li><strong>Alamat</strong>: {{ $data->alamat }}</li>
                            <li><strong>Tahun Masuk</strong>: {{ $data->tahun->tahun_ajaran }}</li>
                            <li><strong>Nama Wali</strong>: {{ $data->nama_ortu }}</li>
                            {{-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> --}}
                        </ul>
                    </div>
                    {{-- <div class="portfolio-description">
                        <h2>This is an example of profile detail</h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero, quibusdam.
                        </p>
                    </div> --}}
                </div>

            </div>

        </div>
    </section>
@endsection
