@extends('layouts.main')

@section('sections')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol class="pb-1">
                <li><a href="/">Home</a></li>
                <li>Jadwal Pembelajaran</li>
            </ol>
            <h2 class="mb-0">Jadwal Pembelajaran</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="col-md-12">
                @if ($jadwal->count())
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Kegiatan Inti Kelompok <span>|
                                    {{ $jadwal->first()->kelompok->nama_kelompok }}
                                </span></h5>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-lg-4 label">Guru Wali</div>
                                    <div class="col-lg-8 text-secodary">
                                        @if ($jadwal->first()->kelompok->guru_id != null)
                                            {{ $jadwal->first()->kelompok->guru->nama_guru }}
                                        @else
                                            Guru Wali
                                        @endif
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-4 label">Pendamping</div>
                                    <div class="col-lg-8 text-secondary">
                                        @if ($jadwal->first()->count())
                                            @if ($jadwal->first()->guru_id != null)
                                                {{ $jadwal->first()->guru->nama_guru }}
                                            @else
                                                Guru Pendamping
                                            @endif
                                        @else
                                            Belum ada guru pendamping
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <table class="table table-bordered table-sm">
                                <thead>
                                    <tr>
                                        <th>Hari</th>
                                        <th>Tema</th>
                                        <th>Sub Tema</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($jadwal->first()->count())
                                        <tr>
                                            <td>Sabtu</td>
                                            <td>{{ $jadwal->first()->sabtu }}</td>
                                            <td>{{ $jadwal->first()->sub_sabtu }}</td>
                                            <td>{{ $jadwal->first()->ket_sabtu }}</td>
                                        </tr>
                                        <tr>
                                            <td>minggu</td>
                                            <td>{{ $jadwal->first()->minggu }}</td>
                                            <td>{{ $jadwal->first()->sub_minggu }}</td>
                                            <td>{{ $jadwal->first()->ket_minggu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Senin</td>
                                            <td>{{ $jadwal->first()->senin }}</td>
                                            <td>{{ $jadwal->first()->sub_senin }}</td>
                                            <td>{{ $jadwal->first()->ket_senin }}</td>
                                        </tr>
                                        <tr>
                                            <td>Selasa</td>
                                            <td>{{ $jadwal->first()->selasa }}</td>
                                            <td>{{ $jadwal->first()->sub_selasa }}</td>
                                            <td>{{ $jadwal->first()->ket_selasa }}</td>
                                        </tr>
                                        <tr>
                                            <td>Rabu</td>
                                            <td>{{ $jadwal->first()->rabu }}</td>
                                            <td>{{ $jadwal->first()->sub_rabu }}</td>
                                            <td>{{ $jadwal->first()->ket_rabu }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kamis</td>
                                            <td>{{ $jadwal->first()->kamis }}</td>
                                            <td>{{ $jadwal->first()->sub_kamis }}</td>
                                            <td>{{ $jadwal->first()->ket_kamis }}</td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="3" class="text{{ }}center text-secondary">Belum
                                                ada
                                                jadwal</td>
                                        </tr>
                                    @endif
                                    <tr class="table-danger">
                                        <td>Minggu</td>
                                        <td colspan="3" class="text-center">Libur</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                @else
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-info alert-dismissible fade show text-center mt-3" role="alert">
                                <i class="bi bi-info-circle fs-4"></i>
                                <h4 class="alert-heading">Tidak ada jadwal untuk ditampilkan</h4>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

        </div>
    </section>
@endsection
