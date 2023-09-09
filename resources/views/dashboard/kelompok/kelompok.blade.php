@extends('dashboard.layouts.main')
@push('js')
@endpush
@section('container')
    <div class="col-md-12">
        @error('tahun_id')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-octagon me-1"></i>
                Gagal, sebelum tambah kelompok pastikan sudah menambah tahun ajaran terlebih dahulu!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="card">


            <div class="card-body">
                <h5 class="card-title mb-0 pb-2">Kelompok</h5>
                <a class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#add-kelompok">
                    Tambah Kelompok <i class="ri-add-box-fill"></i>
                </a>
                @if ($kelompok->count())
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col"></th>
                                <th scope="col">Kelompok</th>
                                <th scope="col">Guru Wali</th>
                                <th scope="col">Tahun Ajaran</th>
                                <th scope="col">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelompok as $item)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $item->nama_kelompok }}</td>
                                    <td>
                                        @if ($item->guru_id != null)
                                            {{ ucwords(strtolower($item->guru->nama_guru)) }}
                                        @else
                                            Guru Wali
                                        @endif
                                    </td>
                                    <td>{{ $item->tahun_id != null ? $item->tahun->tahun_ajaran : '' }}</td>
                                    <td>
                                        <a href="/administrator/kelompok/siswa/{{ $item->id }}"
                                            class="btn btn-primary btn-sm edit-kelompok">
                                            <i class="ri-eye-line"></i> Siswa
                                        </a>
                                        <a class="btn btn-warning btn-sm edit-kelompok" data-bs-toggle="modal"
                                            data-bs-target="#edit-kelompok" data-id="{{ $item->id }}">
                                            <i class="ri-edit-2-line"></i> Edit
                                        </a>
                                        <form action="/administrator/kelompok/{{ $item->id }}" method="post"
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
                @else
                    <div class="alert alert-info alert-dismissible fade show text-center my-5" role="alert">
                        <i class="bi bi-info-circle me-1"></i>
                        <h4 class="alert-heading">Belum ada kelompok yang terdaftar, silahkan tambahkan kelompok!</h4>
                    </div>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="add-kelompok" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Tambah Kelompok</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/administrator/kelompok" class="row g-3 needs-validation" novalidate
                                    method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="row mb-2">
                                            <label for="inputKelompok" class="col-sm-4 col-form-label">
                                                Nama Kelompok</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama_kelompok"
                                                    class="form-control @error('nama_kelompok') is-invalid @enderror"
                                                    id="inputKelompok" placeholder="Nama Kelompok" required
                                                    value="{{ old('nama_kelompok') }}">
                                                <input type="hidden" name="tahun_id"
                                                    value="{{ $tahun->count() ? $tahun->last()->id : '' }}">
                                            </div>
                                        </div>
                                        {{-- <div class="row mb-2">
                                            <label for="inputTahun" class="col-sm-4 col-form-label">
                                                Tahun Ajaran</label>
                                            <div class="col-sm-8">
                                                <select name="tahun_id" id="inputTahun"
                                                    class="form-select @error('tahun_id') is-invalid @enderror" required>
                                                    <option value="" selected>Pilih Tahun Ajaran</option>
                                                    @foreach ($tahun as $th)
                                                        @if (old('tahun_id') == $th->id)
                                                            <option value="{{ $th->id }}" selected>
                                                                {{ $th->tahun_ajaran }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $th->id }}">{{ $th->tahun_ajaran }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                        <div class="row mb-2">
                                            <label for="inputGuru" class="col-sm-4 col-form-label">
                                                Guru Wali</label>
                                            <div class="col-sm-8">
                                                <select name="guru_id" id="inputGuru"
                                                    class="form-select @error('guru_id') is-invalid @enderror" required>
                                                    <option value="" selected>Pilih Guru Wali</option>
                                                    @foreach ($guru as $g)
                                                        @if (old('guru_id') == $g->id)
                                                            <option value="{{ $g->id }}" selected>
                                                                {{ ucwords(strtolower($g->nama_guru)) }}
                                                            </option>
                                                        @else
                                                            <option value="{{ $g->id }}">
                                                                {{ ucwords(strtolower($g->nama_guru)) }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('guru_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-primary" type="submit">
                                            <i class="ri-checkbox-circle-fill"></i> Tambahkan Kelompok
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="edit-kelompok" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="/administrator/kelompok/edit" class="row g-3 needs-validation" novalidate
                                method="post">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title">Ubah Kelompok</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <input type="hidden" name="id" id="id_kelompok">
                                            <label for="inputKelompok" class="col-sm-4 col-form-label">
                                                Nama Kelompok</label>
                                            <div class="col-sm-8">
                                                <input type="text" name="nama_kelompok"
                                                    class="form-control @error('nama_kelompok') is-invalid @enderror"
                                                    id="inputKelompokEdit" required>
                                            </div>
                                        </div>
                                        @error('nama_kelompok')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="row">
                                            <label for="inputGuruEdit" class="col-sm-4 col-form-label">
                                                Guru Wali</label>
                                            <div class="col-sm-8">
                                                <select name="guru_id" id="inputGuruEdit"
                                                    class="form-select @error('guru_id') is-invalid @enderror" required>
                                                    <option value="" selected>Pilih Guru Wali</option>
                                                    @foreach ($guru as $g)
                                                        @if (old('guru_id') == $g->id)
                                                            <option value="{{ $g->id }}" selected>
                                                                {{ $g->nama_guru }}</option>
                                                        @else
                                                            <option value="{{ $g->id }}">{{ $g->nama_guru }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        @error('nama_kelompok')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                        <i class="ri-indeterminate-circle-fill"></i> Batal
                                    </button>
                                    <button class="btn btn-primary" type="submit">
                                        <i class="ri-file-edit-fill"></i> Ubah Kelompok
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
            </div>
        </div>
    </div>
@endsection
