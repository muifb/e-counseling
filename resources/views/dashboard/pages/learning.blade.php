@extends('dashboard.layouts.main')

@push('css')
    <style>
        .btn-sm {
            --bs-btn-padding-y: 0.05rem;
        }
    </style>
@endpush

@push('js')
@endpush

@section('container')
    @if ($kelompok->count())
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-tabs-bordered">
                            <li class="nav-item">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#data-semua">Kelompok
                                    {{ $kelompok[0]->nama_kelompok }}</button>
                            </li>
                            @foreach ($kelompok->skip(1) as $item)
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#{{ $item->nama_kelompok }}">
                                        Kelompok {{ $item->nama_kelompok }}
                                    </button>
                                </li>
                            @endforeach

                        </ul>

                        <div class="tab-content pt-2">
                            <div class="tab-pane fade show active profile-overview" id="data-semua">
                                <h6 class="card-title">Nama Siswa Kelompok {{ $kelompok[0]->nama_kelompok }}</h6>

                                <div class="student">
                                    <!-- Table with stripped rows -->
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Nis</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->where('kelompok_id', $kelompok[0]->id) as $d)
                                                @if ($d->report->count())
                                                    @if ($d->report->first()->status == 'ditolak')
                                                        <tr class='table-danger'>
                                                        @elseif($d->report->first()->status == 'menunggu')
                                                        <tr class ='table-warning'>
                                                        @else
                                                        <tr>
                                                    @endif
                                                @else
                                                    <tr>
                                                @endif
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $d->nama }}</td>
                                                <td>{{ $d->no_induk }}</td>
                                                <td>
                                                    @can('akses', 'guru')
                                                        <a class="btn btn-info btn-sm"
                                                            href="/dashboard/learnings/add-detail/{{ $d->id }}">
                                                            <i class="ri-add-box-fill"></i> Perkembangan
                                                        </a>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="/dashboard/learnings/report/{{ $d->id }}">
                                                            <i class="ri-add-box-fill"></i> Rapor
                                                        </a>
                                                    @endcan
                                                    <div class="note d-inline">
                                                        <a href="/dashboard/learnings/{{ $d->id }}"
                                                            class="btn btn-indigo btn-sm">Konseling
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        @if ($d->Perkembangan->count() && App\Models\Pesan::where('perkembangan_id', $d->Perkembangan->first()->id)->count())
                                                            <span class="badge bg-danger badge-note">
                                                                {{ App\Models\Pesan::where('perkembangan_id', $d->Perkembangan->first()->id)->count() }}
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <a class="btn btn-success btn-sm"
                                                        href="/dashboard/learnings/see-report/{{ $d->id }}">Lihat
                                                        Rapor
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- End Table with stripped rows -->
                                </div>

                                <!-- Table with stripped rows -->
                                <div class="android">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->where('kelompok_id', $kelompok[0]->id) as $d)
                                                @if ($d->report->count())
                                                    <tr
                                                        class="{{ $d->report->first()->status == 'ditolak' ? 'table-danger' : '' }}">
                                                    @else
                                                    <tr>
                                                @endif
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $d->nama }} <br>
                                                    <span class="text-body-secondary">{{ $d->no_induk }}</span>
                                                </td>
                                                <td>
                                                    @can('akses', 'guru')
                                                        <a class="btn btn-info btn-sm"
                                                            href="/dashboard/learnings/add-detail/{{ $d->id }}">
                                                            <i class="ri-add-box-fill"></i> Perkembangan
                                                        </a>
                                                        <a class="btn btn-danger btn-sm"
                                                            href="/dashboard/learnings/report/{{ $d->id }}">
                                                            <i class="ri-add-box-fill"></i> Rapor
                                                        </a>
                                                    @endcan
                                                    <a href="/dashboard/learnings/{{ $d->id }}"
                                                        class="btn btn-indigo btn-sm">Konseling
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    <a class="btn btn-success btn-sm"
                                                        href="/dashboard/learnings/see-report/{{ $d->id }}">Lihat
                                                        Rapor
                                                        <i class="ri-eye-line"></i>
                                                    </a>
                                                    {{-- <a class="btn btn-warning btn-sm"
                                                    href="/dashboard/learnings/see-grafik/{{ $d->id }}">Grafik
                                                    <i class="ri-file-chart-line"></i>
                                                </a> --}}
                                                </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table with stripped rows -->
                            </div>

                            @foreach ($kelompok->skip(1) as $item)
                                <div class="tab-pane fade profile-overview" id="{{ $item->nama_kelompok }}">
                                    <h6 class="card-title">Nama Siswa Kelompok {{ $item->nama_kelompok }}</h6>

                                    <div class="student">
                                        <!-- Table with stripped rows -->
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Nis</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->where('kelompok_id', $item->id) as $d)
                                                    @if ($d->report->count())
                                                        @if ($d->report->first()->status == 'ditolak')
                                                            <tr class='table-danger'>
                                                            @elseif($d->report->first()->status == 'menunggu')
                                                            <tr class ='table-warning'>
                                                            @else
                                                            <tr>
                                                        @endif
                                                    @else
                                                        <tr>
                                                    @endif
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $d->nama }}</td>
                                                    <td>{{ $d->no_induk }}</td>
                                                    <td>
                                                        @can('akses', 'guru')
                                                            <a class="btn btn-info btn-sm"
                                                                href="/dashboard/learnings/add-detail/{{ $d->id }}">
                                                                <i class="ri-add-box-fill"></i> Perkembangan
                                                            </a>
                                                            <a class="btn btn-danger btn-sm"
                                                                href="/dashboard/learnings/report/{{ $d->id }}">
                                                                <i class="ri-add-box-fill"></i> Rapor
                                                            </a>
                                                        @endcan
                                                        <div class="note d-inline">
                                                            <a href="/dashboard/learnings/{{ $d->id }}"
                                                                class="btn btn-indigo btn-sm">konseling
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                            @if ($d->Perkembangan->count() && App\Models\Pesan::where('perkembangan_id', $d->Perkembangan->first()->id)->count())
                                                                <span class="badge bg-danger badge-note">
                                                                    {{ App\Models\Pesan::where('perkembangan_id', $d->Perkembangan->first()->id)->count() }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                        <a class="btn btn-success btn-sm"
                                                            href="/dashboard/learnings/see-report/{{ $d->id }}">Lihat
                                                            Rapor
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        {{-- <a class="btn btn-warning btn-sm"
                                                        href="/dashboard/learnings/see-grafik/{{ $d->id }}">Grafik
                                                        <i class="ri-file-chart-line"></i>
                                                    </a> --}}
                                                    </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->
                                    </div>

                                    <!-- Table with stripped rows -->
                                    <div class="android">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->where('kelompok_id', $item->id) as $d)
                                                    @if ($d->report->count())
                                                        <tr
                                                            class="{{ $d->report->first()->status == 'ditolak' ? 'table-danger' : '' }}">
                                                        @else
                                                        <tr>
                                                    @endif
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ $d->nama }} <br>
                                                        <span class="text-body-secondary">{{ $d->no_induk }}</span>
                                                    </td>
                                                    <td>
                                                        @can('akses', 'guru')
                                                            <a class="btn btn-info btn-sm"
                                                                href="/dashboard/learnings/add-detail/{{ $d->id }}">
                                                                <i class="ri-add-box-fill"></i> Perkembangan
                                                            </a>
                                                            <a class="btn btn-danger btn-sm"
                                                                href="/dashboard/learnings/report/{{ $d->id }}">
                                                                <i class="ri-add-box-fill"></i> Rapor
                                                            </a>
                                                        @endcan
                                                        <a href="/dashboard/learnings/{{ $d->id }}"
                                                            class="btn btn-indigo btn-sm">Konseling
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn btn-success btn-sm"
                                                            href="/dashboard/learnings/see-report/{{ $d->id }}">Lihat
                                                            Rapor
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        {{-- <a class="btn btn-warning btn-sm"
                                                        href="/dashboard/learnings/see-grafik/{{ $d->id }}">Grafik
                                                        <i class="ri-file-chart-line"></i>
                                                    </a> --}}
                                                    </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Table with stripped rows -->
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    @else
        <div class="card">
            <div class="card-body pt-3">
                <div class="alert alert-info alert-dismissible fade show my-3 text-center" role="alert">
                    <i class="bi bi-info-circle me-1"></i>
                    <h4 class="alert-heading">Pemberihatuan</h4>
                    <p>Untuk saat ini daftar <strong>Kelompok</strong> masih <strong>kosong</strong>. Hubungi bagian
                        <strong>Tatausaha</strong> untuk segera menambahkan
                        kelompok dan memasukkan daftar siswa.
                    </p>
                    <hr>
                    <p class="mb-0">Silahkan kembali lagi setelah kelompok telah ada.</p>
                </div>
            </div>
        </div>
    @endif
@endsection
