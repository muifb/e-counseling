@extends('dashboard.layouts.main')

{{-- @push('css')
    <style>
        .datatable-top,
        .datatable-bottom {
            padding: 0px 0px;
        }
    </style>
@endpush --}}

@section('container')
    @if ($tahun->count())
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bordered">
                        <li class="nav-item">
                            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#{{ $tahun[0]->id }}">
                                Tahun Ajaran {{ $tahun[0]->tahun_ajaran }}
                            </button>
                        </li>
                        @foreach ($tahun->skip(1) as $item)
                            <li class="nav-item">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#{{ $item->id }}">
                                    Tahun Ajaran {{ $item->tahun_ajaran }}
                                </button>
                            </li>
                        @endforeach

                    </ul>

                    <div class="tab-content pt-2">
                        <div class="tab-pane fade show active profile-overview" id="{{ $tahun[0]->id }}">
                            <h5 class="card-title my-0 py-2">
                                Nama Siswa Tahun Ajaran {{ $tahun[0]->tahun_ajaran }}
                            </h5>
                            <a href="/administrator/students/create" class="btn btn-primary btn-sm">
                                Tambahkan Siswa <i class="ri-add-box-fill"></i>
                            </a>
                            @if ($data->where('tahun_id', $tahun[0]->id)->count())
                                <div class="student">
                                    <!-- Table with stripped rows -->
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Nis</th>
                                                <th scope="col">Kelompok</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->where('tahun_id', $tahun[0]->id) as $d)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ ucwords(strtolower($d->nama)) }}</td>
                                                    <td>{{ $d->no_induk }}</td>
                                                    <td>
                                                        {{ $d->kelompok_id != null ? $d->kelompok->nama_kelompok : '-' }}
                                                    </td>
                                                    <td>
                                                        <a href="/administrator/students/{{ $d->id }}"
                                                            class="btn btn-info btn-sm">Lihat
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn btn-warning btn-sm"
                                                            href="/administrator/students/{{ $d->id }}/edit">Ubah
                                                            <i class="ri-edit-2-line"></i>
                                                        </a>
                                                        <form action="/administrator/students/{{ $d->id }}"
                                                            method="post" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">
                                                                Hapus
                                                                <i class="ri-delete-bin-5-line"></i>
                                                            </button>
                                                        </form>
                                                        <form
                                                            action="/administrator/users/reset-password/{{ $d->user_id }}"
                                                            class="d-inline" method="POST">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" name="password" value="password">
                                                            <button type="submit" class="btn btn-dark btn-sm"
                                                                onclick="return confirm('Are you sure?')">Reset Pass
                                                                <i class="ri-refresh-line"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!-- End Table with stripped rows -->
                                </div>

                                <!-- Table with stripped rows -->
                                <div class="android">
                                    <table class="table datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Options</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data->where('tahun_id', $tahun[0]->id) as $d)
                                                <tr>
                                                    <th scope="row">{{ $loop->iteration }}</th>
                                                    <td>{{ ucwords(strtolower($d->nama)) }} <br>
                                                        <span class="text-body-secondary">{{ $d->no_induk }}</span>
                                                    </td>
                                                    <td>
                                                        <a href="/administrator/students/{{ $d->id }}"
                                                            class="btn btn-info btn-sm">Lihat
                                                            <i class="ri-eye-line"></i>
                                                        </a>
                                                        <a class="btn btn-warning btn-sm"
                                                            href="/administrator/students/{{ $d->id }}/edit">Ubah
                                                            <i class="ri-edit-2-line"></i>
                                                        </a>
                                                        <form action="/administrator/students/{{ $d->id }}"
                                                            method="post" class="d-inline">
                                                            @method('delete')
                                                            @csrf
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">
                                                                Hapus
                                                                <i class="ri-delete-bin-5-line"></i>
                                                            </button>
                                                        </form>
                                                        <form
                                                            action="/administrator/users/reset-password/{{ $d->user_id }}"
                                                            class="d-inline" method="POST">
                                                            @method('put')
                                                            @csrf
                                                            <input type="hidden" name="password" value="password">
                                                            <button type="submit" class="btn btn-dark btn-sm"
                                                                onclick="return confirm('Are you sure?')">Reset Pass
                                                                <i class="ri-refresh-line"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- End Table with stripped rows -->
                            @else
                                <div class="alert alert-info alert-dismissible fade show text-center my-5" role="alert">
                                    <i class="bi bi-info-circle me-1"></i>
                                    <h4 class="alert-heading">Belum ada siswa yang terdaftar diTahun Ajaran
                                        {{ $tahun[0]->tahun_ajaran }}, silahkan tambahkan daftar siswa!</h4>
                                </div>
                            @endif
                        </div>

                        @foreach ($tahun->skip(1) as $item)
                            <div class="tab-pane fade profile-overview" id="{{ $item->id }}">
                                <h6 class="card-title">Nama Siswa Tahun Ajaran {{ $item->tahun_ajaran }}</h6>
                                <a href="/administrator/students/create" class="btn btn-primary btn-sm">
                                    Tambahkan Siswa <i class="ri-add-box-fill"></i>
                                </a>
                                @if ($data->where('tahun_id', $item->id)->count())
                                    <div class="student">
                                        <!-- Table with stripped rows -->
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Nis</th>
                                                    <th scope="col">Kel</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->where('tahun_id', $item->id) as $d)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ ucwords(strtolower($d->nama)) }}</td>
                                                        <td>{{ $d->no_induk }}</td>
                                                        <td>
                                                            {{ $d->kelompok_id != null ? $d->kelompok->nama_kelompok : '-' }}
                                                        </td>
                                                        <td>
                                                            <a href="/administrator/students/{{ $d->id }}"
                                                                class="btn btn-info btn-sm">Lihat
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                            <a class="btn btn-warning btn-sm"
                                                                href="/administrator/students/{{ $d->id }}/edit">Ubah
                                                                <i class="ri-edit-2-line"></i>
                                                            </a>
                                                            <form action="/administrator/students/{{ $d->id }}"
                                                                method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you sure?')">
                                                                    Hapus
                                                                    <i class="ri-delete-bin-5-line"></i>
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="/administrator/users/reset-password/{{ $d->user_id }}"
                                                                class="d-inline" method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <input type="hidden" name="password" value="password">
                                                                <button type="submit" class="btn btn-dark btn-sm"
                                                                    onclick="return confirm('Are you sure?')">Reset
                                                                    Pass
                                                                    <i class="ri-refresh-line"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- End Table with stripped rows -->
                                    </div>

                                    <!-- Table with stripped rows -->
                                    <div class="android">
                                        <table class="table datatable">
                                            <thead>
                                                <tr>
                                                    <th scope="col"></th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Options</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($data->where('tahun_id', $item->id) as $d)
                                                    <tr>
                                                        <th scope="row">{{ $loop->iteration }}</th>
                                                        <td>{{ ucwords(strtolower($d->nama)) }} <br>
                                                            <span class="text-body-secondary">{{ $d->no_induk }}</span>
                                                        </td>
                                                        <td>
                                                            <a href="/administrator/students/{{ $d->id }}"
                                                                class="btn btn-info btn-sm">Lihat
                                                                <i class="ri-eye-line"></i>
                                                            </a>
                                                            <a class="btn btn-warning btn-sm"
                                                                href="/administrator/students/{{ $d->id }}/edit">Ubah
                                                                <i class="ri-edit-2-line"></i>
                                                            </a>
                                                            <form action="/administrator/students/{{ $d->id }}"
                                                                method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button type="submit" class="btn btn-danger btn-sm"
                                                                    onclick="return confirm('Are you sure?')">
                                                                    Hapus
                                                                    <i class="ri-delete-bin-5-line"></i>
                                                                </button>
                                                            </form>
                                                            <form
                                                                action="/administrator/users/reset-password/{{ $d->user_id }}"
                                                                class="d-inline" method="POST">
                                                                @method('put')
                                                                @csrf
                                                                <input type="hidden" name="password" value="password">
                                                                <button type="submit" class="btn btn-dark btn-sm"
                                                                    onclick="return confirm('Are you sure?')">Reset
                                                                    Pass
                                                                    <i class="ri-refresh-line"></i>
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- End Table with stripped rows -->
                                @else
                                    <div class="alert alert-info alert-dismissible fade show text-center my-5"
                                        role="alert">
                                        <i class="bi bi-info-circle me-1"></i>
                                        <h4 class="alert-heading">Belum ada siswa yang terdaftar diTahun Ajaran
                                            {{ $item->tahun_ajaran }}, silahkan tambahkan daftar siswa!</h4>
                                    </div>
                                @endif
                            </div>
                        @endforeach

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
                    <p>
                        Untuk menambahkan, melihat dan edit daftar siswa, seilahkan masukkan tahun ajaran terlebih
                        dahulu dihalaman dashboard.
                    </p>
                    <hr>
                    <p class="mb-0">Silahkan kembali lagi setelah tahun ajaran telah ada.</p>
                </div>
            </div>
        </div>
    @endif
@endsection
