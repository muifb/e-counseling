@extends('dashboard.layouts.main')

@push('css')
    <style>
        .card-title {
            padding: 8px 0 7px 0;
        }

        .card-body {
            padding: 0 14px 7px 14px;
        }

        .row>* {
            padding-right: calc(var(--bs-gutter-x) * .4);
            padding-left: calc(var(--bs-gutter-x) * .4);
        }
    </style>
@endpush
@push('js')
    <script>
        // const icon = document.querySelector('.ri-arrow-down-double-line');
        const seeSchedule = document.querySelector('.lihat-jadwal');

        seeSchedule.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon.className == 'ri-arrow-down-double-line') {
                icon.className = 'ri-arrow-up-double-line';
            } else {
                icon.className = 'ri-arrow-down-double-line'
            }
        })

        const seeScheduleTwo = document.querySelector('.lihat-jadwal-pendamping');

        seeScheduleTwo.addEventListener('click', function() {
            const icon = this.querySelector('i');
            if (icon.className == 'ri-arrow-down-double-line') {
                icon.className = 'ri-arrow-up-double-line';
            } else {
                icon.className = 'ri-arrow-down-double-line'
            }
        })
    </script>
@endpush

@section('container')
    <!-- Left side columns -->
    <div class="col-md">
        @error('*')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-x-circle"></i>
                Failed.!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="row">

            @cannot('admin')
                @can('akses', 'guru')
                    @foreach ($kelompok->where('guru_id', auth()->user()->guru->id) as $item)
                        <a href="/administrator/kelompok/siswa/{{ $item->id }}" class="col-md-3 col-md-3">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Kelompok <span>| {{ $item->nama_kelompok }}</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="ri-user-follow-line"></i>
                                        </div>
                                        <div class="ps-2">
                                            <h6>{{ count($data->where('kelompok_id', $item->id)) }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Penghuni</span>
                                        </div>
                                        <div class="ps-3">
                                            <span class="text-muted small d-flex">
                                                {{ count($data->where('kelompok_id', $item->id)->where('jk_siswa', 'Laki-Laki')) }}
                                                Laki-laki
                                            </span>
                                            <span class="text-muted small d-flex">
                                                {{ count($data->where('kelompok_id', $item->id)->where('jk_siswa', 'Perempuan')) }}
                                                Perempuan
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    @endforeach
                    @if (!$kelompok->where('guru_id', auth()->user()->guru->id)->count())
                        @foreach ($jadwalPendamping as $item)
                            <a href="/administrator/kelompok/siswa/{{ $jadwalPendamping->first()->kelompok_id }}"
                                class="col-md-3 col-md-3">
                                <div class="card info-card sales-card">

                                    <div class="card-body">
                                        <h5 class="card-title">Kelompok <span>|
                                                {{ $jadwalPendamping->first()->kelompok->nama_kelompok }}</span></h5>

                                        <div class="d-flex align-items-center">
                                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                                <i class="ri-user-follow-line"></i>
                                            </div>
                                            <div class="ps-2">
                                                <h6>{{ count($data->where('kelompok_id', $jadwalPendamping->first()->id)) }}</h6>
                                                <span class="text-success small pt-1 fw-bold">Penghuni</span>
                                            </div>
                                            <div class="ps-3">
                                                <span class="text-muted small d-flex">
                                                    {{ count($data->where('kelompok_id', $jadwalPendamping->first()->id)->where('jk_siswa', 'Laki-Laki')) }}
                                                    Laki-laki
                                                </span>
                                                <span class="text-muted small d-flex">
                                                    {{ count($data->where('kelompok_id', $jadwalPendamping->first()->id)->where('jk_siswa', 'Perempuan')) }}
                                                    Perempuan
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </a>
                        @endforeach
                    @endif
                @endcan
                @can('akses', 'kepsek')
                    @foreach ($kelompok as $item)
                        <a href="/administrator/kelompok/siswa/{{ $item->id }}" class="col-md-3 col-md-3">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Kelompok <span>| {{ $item->nama_kelompok }}</span></h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="ri-user-follow-line"></i>
                                        </div>
                                        <div class="ps-2">
                                            <h6>{{ count($data->where('kelompok_id', $item->id)) }}</h6>
                                            <span class="text-success small pt-1 fw-bold">Penghuni</span>
                                        </div>
                                        <div class="ps-3">
                                            <span class="text-muted small d-flex">
                                                {{ count($data->where('kelompok_id', $item->id)->where('jk_siswa', 'Laki-Laki')) }}
                                                Laki-laki
                                            </span>
                                            <span class="text-muted small d-flex">
                                                {{ count($data->where('kelompok_id', $item->id)->where('jk_siswa', 'Perempuan')) }}
                                                Perempuan
                                            </span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </a>
                    @endforeach
                @endcan
            @endcannot

            @can('akses', 'tu')
                @foreach ($kelompok as $item)
                    <a href="/administrator/kelompok/siswa/{{ $item->id }}" class="col-md-3 col-md-3">
                        <div class="card info-card sales-card">
                            <div class="card-body">
                                <h5 class="card-title">Kelompok <span>| {{ $item->nama_kelompok }}</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="ri-user-follow-line"></i>
                                    </div>
                                    <div class="ps-2">
                                        <h6>{{ count($data->where('kelompok_id', $item->id)) }}</h6>
                                        <span class="text-success small pt-1 fw-bold">Penghuni</span>
                                    </div>
                                    <div class="ps-3">
                                        <span class="text-muted small d-flex">
                                            {{ count($data->where('kelompok_id', $item->id)->where('jk_siswa', 'Laki-Laki')) }}
                                            Laki-laki
                                        </span>
                                        <span class="text-muted small d-flex">
                                            {{ count($data->where('kelompok_id', $item->id)->where('jk_siswa', 'Perempuan')) }}
                                            Perempuan
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <a href="#" class="col-md-3 col-md-3" data-bs-toggle="modal" data-bs-target="#add-tahun">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-center">
                                <h5 class="card-title">Add Tahun Ajaran</h5>
                            </div>
                            <div class="d-flex align-items-center justify-content-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="ri-add-circle-fill"></i>
                                </div>
                            </div>
                        </div>

                    </div>
                </a>
                <!-- Modal -->
                <div class="modal fade" id="add-tahun" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Form Add Tahun Ajaran</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/administrator/tahun-ajaran" class="row g-3 needs-validation" novalidate
                                    method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        @error('tahun_ajaran')
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <i class="bi bi-x-circle"></i>
                                                {{ $message }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @enderror
                                        <div class="row">
                                            <label for="inputTahun" class="col-sm-4 col-form-label">
                                                Tahun Ajaran</label>
                                            <div class="col-sm-4">
                                                <input type="text" name="tahun_satu"
                                                    class="form-control @error('tahun_satu') is-invalid @enderror"
                                                    id="inputTahun" placeholder="2021" required
                                                    value="{{ old('tahun_satu') }}">
                                                @error('tahun_satu')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="text" name="tahun_dua"
                                                    class="form-control @error('tahun_dua') is-invalid @enderror"
                                                    id="inputTahun" placeholder="2022" required
                                                    value="{{ old('tahun_dua') }}">
                                                @error('tahun_dua')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">Add Tahun Ajaran</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan

            <!-- Schedule -->
            @cannot('akses', 'administrator')
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title">Jadwal</span></h5>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>07:30-08:00</th>
                                        <th>08:00-09:00</th>
                                        <th>09:00-09:30</th>
                                        <th>09:30-10:00</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pembukaan</td>
                                        <td>Kegiatan Inti</td>
                                        <td>Istirahat/Makan</td>
                                        <td>Penutup</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                @can('akses', 'guru')
                    @if ($jadwal->count())
                        <div class="col-md-12">
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
                                    <h2 class="accordion-header" id="headingOne">
                                        <div class="breadcrumb m-0 p-0">
                                            <a class="breadcrumb-item collapsed lihat-jadwal" href="#"
                                                data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Lihat Jadwal &ensp;
                                                <i class="ri-arrow-down-double-line"></i>
                                            </a>
                                        </div>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                        data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <table class="table table-bordered table-sm mt-3">
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
                                                            <td>Minggu</td>
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
                                                            <td colspan="3" class="text-center text-secondary">Belum ada
                                                                jadwal
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <tr class="table-danger">
                                                        <td>Jumat</td>
                                                        <td colspan="3" class="text-center">Libur</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                    @if ($jadwalPendamping->count())
                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <h5 class="card-title">Kegiatan Inti Kelompok <span>|
                                            {{ $jadwalPendamping->first()->kelompok->nama_kelompok }}
                                        </span></h5>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-lg-4 label">Guru Wali</div>
                                            <div class="col-lg-8 text-secodary">
                                                @if ($jadwalPendamping->first()->kelompok->guru_id != null)
                                                    {{ $jadwalPendamping->first()->kelompok->guru->nama_guru }}
                                                @else
                                                    Guru Wali
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-4 label">Pendamping</div>
                                            <div class="col-lg-8 text-secondary">
                                                @if ($jadwalPendamping->first()->count())
                                                    @if ($jadwalPendamping->first()->guru_id != null)
                                                        {{ $jadwalPendamping->first()->guru->nama_guru }}
                                                    @else
                                                        Guru Pendamping
                                                    @endif
                                                @else
                                                    Belum ada guru pendamping
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <h2 class="accordion-header" id="headingTwo">
                                        <div class="breadcrumb m-0 p-0">
                                            <a class="breadcrumb-item collapsed lihat-jadwal-pendamping" href="#"
                                                data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Lihat Jadwal &ensp;
                                                <i class="ri-arrow-down-double-line"></i>
                                            </a>
                                        </div>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                        data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <table class="table table-bordered table-sm mt-3">
                                                <thead>
                                                    <tr>
                                                        <th>Hari</th>
                                                        <th>Tema</th>
                                                        <th>Sub Tema</th>
                                                        <th>Keterangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if ($jadwalPendamping->first()->count())
                                                        <tr>
                                                            <td>Sabtu</td>
                                                            <td>{{ $jadwalPendamping->first()->sabtu }}</td>
                                                            <td>{{ $jadwalPendamping->first()->sub_sabtu }}</td>
                                                            <td>{{ $jadwalPendamping->first()->ket_sabtu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Minggu</td>
                                                            <td>{{ $jadwalPendamping->first()->minggu }}</td>
                                                            <td>{{ $jadwalPendamping->first()->sub_minggu }}</td>
                                                            <td>{{ $jadwalPendamping->first()->ket_minggu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Senin</td>
                                                            <td>{{ $jadwalPendamping->first()->senin }}</td>
                                                            <td>{{ $jadwalPendamping->first()->sub_senin }}</td>
                                                            <td>{{ $jadwalPendamping->first()->ket_senin }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Selasa</td>
                                                            <td>{{ $jadwalPendamping->first()->selasa }}</td>
                                                            <td>{{ $jadwalPendamping->first()->sub_selasa }}</td>
                                                            <td>{{ $jadwalPendamping->first()->ket_selasa }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Rabu</td>
                                                            <td>{{ $jadwalPendamping->first()->rabu }}</td>
                                                            <td>{{ $jadwalPendamping->first()->sub_rabu }}</td>
                                                            <td>{{ $jadwalPendamping->first()->ket_rabu }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kamis</td>
                                                            <td>{{ $jadwalPendamping->first()->kamis }}</td>
                                                            <td>{{ $jadwalPendamping->first()->sub_kamis }}</td>
                                                            <td>{{ $jadwalPendamping->first()->ket_kamis }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td colspan="3" class="text-center text-secondary">Belum ada
                                                                jadwal
                                                            </td>
                                                        </tr>
                                                    @endif
                                                    <tr class="table-danger">
                                                        <td>Jumat</td>
                                                        <td colspan="3" class="text-center">Libur</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endif
                @endcan
            @endcannot
            @can('akses', 'administrator')
                <div class="px-4 py-3 my-3 text-center">
                    <h1 class="display-5 fw-bold text-body-emphasis">Hi, {{ Auth::user()->nama }}</h1>
                    <div class="col-md-12 mx-auto">
                        <p class="lead mb-4">Anda login sebagai administrator. Ini adalah halaman administrator, yang berfungsi
                            untuk menginputkan guru tatausaha yang kemudian selanjutnya berikan kepada tatausaha untuk
                            menginputkan data-data yang diperlukan.!</p>
                    </div>
                </div>
            @endcan

        </div>
    </div>
    <!-- End Left side columns -->
@endsection
