@extends('dashboard.layouts.main')

@section('container')
    @error('*')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="bi bi-x-circle"></i>
            Failed.!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @enderror
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-0 pb-2">Tema</h5>
            <button class="btn btn-primary btn-sm edit-tema" data-bs-toggle="modal" data-bs-target="#add-tema">
                <i class="ri-file-add-fill"></i>
                Tambahkan Tema
            </button>

            {{-- <div class="d-flex justify-content-end mb-2">
            </div> --}}
            @if ($tema->count())
                <table class="table datatable-tema-all">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Tema</th>
                            <th scope="col">Sentra</th>
                            <th scope="col">Semester</th>
                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tema as $tm)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $tm->nama_tema }}</td>
                                <td>{{ $tm->sentra }}</td>
                                <td>{{ $tm->semester }} - {{ $tm->tahun_id != null ? $tm->tahun->tahun_ajaran : '' }}</td>
                                <td>
                                    <button class="btn btn-warning btn-sm edit-tema" data-bs-toggle="modal"
                                        data-bs-target="#edit-tema" data-id="{{ $tm->id }}"><i
                                            class="ri-edit-2-line"></i></button>
                                    <form action="/administrator/tema/{{ $tm->id }}" method="post" class="d-inline">
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
                    <h4 class="alert-heading">Belum ada tema yang terdaftar, silahkan tambahkan tema!</h4>
                </div>
            @endif
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add-tema" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Tema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($tahun->count())
                        <form action="/administrator/tema" class="row g-3 needs-validation" novalidate method="post">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputTema" class="form-label">Tema</label>
                                <input type="text" name="nama_tema"
                                    class="form-control @error('nama_tema') is-invalid @enderror" id="inputTema"
                                    value="{{ old('nama_tema') }}" required autofocus>
                            </div>
                            <div class="col-md-12">
                                <label for="inputSentra" class="form-label">Sentra</label>
                                <input type="text" name="sentra"
                                    class="form-control @error('sentra') is-invalid @enderror" value="{{ old('sentra') }}"
                                    id="inputSentra" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputSemester" class="form-label">Semester</label>
                                <select name="semester" id="inputSemester"
                                    class="form-select @error('semester') is-invalid @enderror">
                                    @foreach ($semester as $item)
                                        <option>{{ $item['semester'] }}</option>
                                    @endforeach
                                </select>
                                @error('semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputTahun" class="form-label">Tahun Akademik</label>
                                <select name="tahun_id" id="inputTahun"
                                    class="form-select @error('tahun_id') is-invalid @enderror">
                                    @foreach ($tahun as $itm)
                                        <option value="{{ $itm->id }}">{{ $itm->tahun_ajaran }}</option>
                                    @endforeach
                                </select>
                                @error('tahun_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    <i class="ri-indeterminate-circle-fill"></i> Batal
                                </button>
                                <button class="btn btn-primary" type="submit">
                                    <i class="ri-checkbox-circle-fill"></i> Tambahkan Tema
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info alert-dismissible fade show text-center my-5" role="alert">
                            <i class="bi bi-info-circle me-1"></i>
                            <h4 class="alert-heading">Sebelum menambahkan tema, silahkan menambahkan tahun ajaran terlebih
                                dulu!</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="edit-tema" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Tema</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($tahun->count())
                        <form action="/administrator/tema/edit" class="row g-3 needs-validation" novalidate
                            method="post">
                            @csrf
                            <input type="hidden" class="form-control" name="id" id="id">
                            <div class="col-md-12">
                                <label for="inputTemaEdit" class="form-label">Tema</label>
                                <input type="text" name="nama_tema"
                                    class="form-control @error('nama_tema') is-invalid @enderror" id="inputTemaEdit"
                                    value="{{ old('nama_tema') }}" required autofocus>
                            </div>
                            <div class="col-md-12">
                                <label for="inputSentraEdit" class="form-label">Sentra</label>
                                <input type="text" name="sentra"
                                    class="form-control @error('sentra') is-invalid @enderror"
                                    value="{{ old('sentra') }}" id="inputSentraEdit" required>
                            </div>
                            <div class="col-md-6">
                                <label for="inputSemesterEdit" class="form-label">Semester</label>
                                <select name="semester" id="inputSemesterEdit"
                                    class="form-select @error('semester') is-invalid @enderror">
                                    @foreach ($semester as $item)
                                        <option value="{{ $item['semester'] }}">{{ $item['semester'] }}</option>
                                    @endforeach
                                </select>
                                @error('semester')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="inputTahunEdit" class="form-label">Tahun Akademik</label>
                                <select name="tahun_id" id="inputTahunEdit"
                                    class="form-select @error('tahun_id') is-invalid @enderror">
                                    @foreach ($tahun as $th)
                                        @if (old('tahun_id') == $th->id)
                                            <option value="{{ $th->id }}" selected>{{ $th->tahun_ajaran }}
                                            </option>
                                        @else
                                            <option value="{{ $th->id }}">{{ $th->tahun_ajaran }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('tahun_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="text-end">
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
                                    <i class="ri-indeterminate-circle-fill"></i> Batal
                                </button>
                                <button class="btn btn-primary" type="submit">
                                    <i class="ri-file-edit-fill"></i> Ubah Tema
                                </button>
                            </div>
                        </form>
                    @else
                        <div class="alert alert-info alert-dismissible fade show text-center my-5" role="alert">
                            <i class="bi bi-info-circle me-1"></i>
                            <h4 class="alert-heading">Sebelum edit tema, silahkan menambahkan tahun ajaran terlebih dulu!
                            </h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--End Modal-->
    </div>
@endsection
