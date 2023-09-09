@extends('dashboard.layouts.main')

@section('container')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-0 pb-2">Daftar Semua Guru</h5>
                <a href="/administrator/teachers/create" class="btn btn-primary btn-sm">
                    Tambahkan Guru <i class="ri-add-box-fill"></i>
                </a>

                @if ($data->count())
                    <div class="student">
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">NIDN</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Options</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ ucwords(strtolower($d->nama_guru)) }}</td>
                                        <td>{{ $d->nuptk }}</td>
                                        <td>{{ $d->devisi }}</td>
                                        <td>
                                            <a href="/administrator/teachers/{{ $d->id }}"
                                                class="btn btn-info btn-sm">Lihat
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm"
                                                href="/administrator/teachers/{{ $d->id }}/edit">Ubah
                                                <i class="ri-edit-2-line"></i>
                                            </a>
                                            <form action="/administrator/teachers/{{ $d->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    Hapus
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </button>
                                            </form>
                                            <form action="/administrator/users/reset-password/{{ $d->user_id }}"
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
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $d->nama_guru }} <br>
                                            <span class="text-body-secondary">{{ $d->nuptk }}</span>
                                        </td>
                                        <td>
                                            <a href="/administrator/teachers/{{ $d->id }}"
                                                class="btn btn-info btn-sm">Lihat
                                                <i class="ri-eye-line"></i>
                                            </a>
                                            <a class="btn btn-warning btn-sm"
                                                href="/administrator/teachers/{{ $d->id }}/edit">Ubah
                                                <i class="ri-edit-2-line"></i>
                                            </a>
                                            <form action="/administrator/teachers/{{ $d->id }}" method="post"
                                                class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    Hapus
                                                    <i class="ri-delete-bin-5-line"></i>
                                                </button>
                                            </form>
                                            <form action="/administrator/users/reset-password/{{ $d->user_id }}"
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
                        <h4 class="alert-heading">Belum ada Guru yang terdaftar, silahkan tambahkan guru!</h4>
                    </div>
                @endif
            </div>
        </div>

    </div>
@endsection
