@extends('dashboard.layouts.main')
@push('js')
@endpush
@section('container')
    <div class="col-md-6">
        @error('semester')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                {{-- Gagal, sebelum tambah kelompok pastikan sudah menambah tahun ajaran terlebih dahulu! --}}
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="card">


            <div class="card-body">
                <h5 class="card-title mb-0 pb-2">Semester</h5>
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add-kelompok">
                    Tambah Semester <i class="ri-add-box-fill"></i>
                </a>
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($semester as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->semester }}</td>
                                <td>
                                    <form action="/administrator/semester/{{ $item->id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="ri-delete-bin-5-line"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="add-kelompok" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Semester</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                @if ($tahun->count())
                                    <form action="/administrator/semester" class="row g-3 needs-validation" novalidate
                                        method="post">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="inputSemester" class="form-label">Semester</label>
                                            <select name="sms" id="inputSemester"
                                                class="form-select @error('sms') is-invalid @enderror" required>
                                                <option value="Gasal">Gasal</option>
                                                <option value="Genap">Genap</option>
                                            </select>
                                            @error('sms')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="inputTahun" class="form-label">Tahun Akademik</label>
                                            <input type="text" name="tahun"
                                                class="form-control @error('tahun') is-invalid @enderror" id="inputTahun"
                                                placeholder="Nama Kelompok" required
                                                value="{{ $tahun->last()->tahun_ajaran }}" readonly>
                                            {{-- <select name="tahun" id="inputTahun"
                                                class="form-select @error('tahun') is-invalid @enderror" required>
                                                <option value="{{ $tahun->last()->tahun_ajaran }}" selected>
                                                    {{ $tahun->last()->tahun_ajaran }}</option>
                                                @foreach ($tahun as $th)
                                                    @if (old('tahun') == $th->tahun_ajaran)
                                                        <option value="{{ $th->tahun_ajaran }}" selected>
                                                            {{ $th->tahun_ajaran }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $th->tahun_ajaran }}">
                                                            {{ $th->tahun_ajaran }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select> --}}
                                            @error('tahun')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-primary" type="submit">
                                                <i class="ri-checkbox-circle-fill"></i> Tambahkan Semester
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <div class="alert alert-info alert-dismissible fade show text-center my-5"
                                        role="alert">
                                        <i class="bi bi-info-circle me-1"></i>
                                        <h4 class="alert-heading">Sebelum menambahkan semester, silahkan menambahkan tahun
                                            ajaran terlebih dulu!
                                        </h4>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
            </div>
        </div>
    </div>
@endsection
