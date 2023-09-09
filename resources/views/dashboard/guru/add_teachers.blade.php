@extends('dashboard.layouts.main')

@push('css')
@endpush

@push('js')
    <script>
        function previewImage() {
            const image = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    </script>
@endpush

@section('container')
    <div class="col-md">
        <div class="row">
            <div class="col-md-7">
                <div class="card info-card customers-card">

                    <div class="card-body">
                        <h5 class="card-title">Form Tambah Guru</h5>

                        <!-- Multi Columns Form -->
                        <form action="/administrator/teachers" class="row g-3 needs-validation" novalidate method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <label for="inputNama" class="form-label">Nama</label>
                                <input type="text" name="nama_guru"
                                    class="form-control @error('nama_guru') is-invalid @enderror" id="inputNama"
                                    value="{{ old('nama_guru') }}" required autofocus>
                            </div>
                            <div class="col-md-7">
                                <label for="inputNis" class="form-label">NUPTK</label>
                                <input type="text" name="nuptk"
                                    class="form-control @error('nuptk') is-invalid @enderror" value="{{ old('nuptk') }}"
                                    id="inputNis" required>
                            </div>
                            <div class="col-md-5">
                                <label for="inputKelas" class="form-label">Devisi</label>
                                <select name="devisi" id="inputKelas" class="form-select">
                                    @if (old('devisi'))
                                        <option selected>{{ old('devisi') }}</option>
                                    @endif
                                    <option>Guru</option>
                                    <option>Tatausaha</option>
                                    <option>Kepala Sekolah</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="inputTanggal" class="form-label">Tanggal Lahir</label>
                                <input class="flatpickr form-control input active @error('tgl_lahir') is-invalid @enderror"
                                    placeholder="Select Date.." tabindex="0" type="text" name="tgl_lahir"
                                    id="inputTanggal" readonly="readonly" required value="{{ old('tgl_lahir') }}">
                                {{-- <input type="text" name="tgl_lahir"
                                        class="form-control @error('tgl_lahir') is-invalid @enderror"
                                        value="{{ old('tgl_lahir') }}" id="inputTanggal" required> --}}
                            </div>
                            <div class="col-md-6">
                                <label for="inputJk" class="form-label">Jenis Kelamin</label>
                                <select name="jk_guru" id="inputJk" class="form-select">
                                    @if (old('jk_guru'))
                                        <option selected>{{ old('jk_guru') }}</option>
                                    @endif
                                    <option>Laki-Laki</option>
                                    <option>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputPhone" class="form-label">Nomor Telepon</label>
                                <input type="text" name="no_telp"
                                    class="form-control @error('no_telp') is-invalid @enderror" value="{{ old('no_telp') }}"
                                    id="inputPhone" required>
                            </div>
                            <div class="col-12">
                                <label for="inputAlamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}"
                                    id="inputAlamat" required>
                            </div>
                            <div class="col-12">
                                <label for="inputTempat" class="form-label">Pendidikan</label>
                                <input type="text" name="pendidikan"
                                    class="form-control @error('pendidikan') is-invalid @enderror"
                                    value="{{ old('pendidikan') }}" id="inputTempat" required>
                            </div>
                            <div class="col-12">
                                <label for="image" class="form-label">Masukkan Foto Guru</label>
                                <label class="btn border rounded mb-1 col-sm-2 d-block" for="photo">
                                    <img class="ri-image-add-line img-preview img-fluid rounded" style="font-size: 55px;"
                                        alt="" src="">
                                </label>
                                <input class="form-control" type="file" id="photo" style="display: none;"
                                    name="photo" multiple onchange="previewImage()">
                                @error('photo')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                                {{-- <input class="form-control @error('photo') is-invalid @enderror" type="file"
                                        id="photo" name="photo"> --}}
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ri-checkbox-circle-fill"></i> Simpan
                                </button>
                                <a href="/administrator/students" type="reset" class="btn btn-danger">
                                    <i class="ri-indeterminate-circle-fill"></i> Batal
                                </a>
                            </div>
                        </form>
                        <!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>

            <div class="col-md-5">

                <!-- Recent Activity -->
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            {{-- <li class="dropdown-header text-start"></li> --}}
                            <li><a class="dropdown-item" href="/administrator/teachers">See Details</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Guru Berhasil Ditambahkan</h5>
                        <div class="breadcrumb m-0 p-0">
                            <a class="breadcrumb-item" href="/administrator/teachers">
                                Lihat Semua daftar guru
                                <i class="ri-arrow-right-double-line"></i>
                            </a>
                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable-add">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Nama</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $d->nama_guru }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="/administrator/teachers/{{ $d->id }}/edit">
                                                <i class="ri-edit-2-line"></i>
                                            </a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
                <!-- End Recent Activity -->

            </div>
        </div>
        <div class="d-flex justify-content-end me-5 mb-2">
            <a href="/administrator/teachers" class="btn btn-secondary">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
