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
                        <h5 class="card-title">Form Added Student</h5>

                        <!-- Multi Columns Form -->
                        <form action="/administrator/students" class="row g-3 needs-validation" novalidate method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-9">
                                <label for="inputNama" class="form-label">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control @error('nama') is-invalid @enderror" id="inputNama"
                                    value="{{ old('nama') }}" required autofocus>
                            </div>
                            <div class="col-md-3">
                                <label for="inputStatus" class="form-label">Status</label>
                                <select name="status" id="inputStatus" class="form-select">
                                    @foreach ($status as $st)
                                        @if (old('status') == $st['sts'])
                                            <option value="{{ $st['sts'] }}" selected>{{ $st['sts'] }}</option>
                                        @else
                                            <option value="{{ $st['sts'] }}">{{ $st['sts'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-7">
                                <label for="inputNis" class="form-label">Nis</label>
                                <input type="text" name="no_induk"
                                    class="form-control @error('no_induk') is-invalid @enderror"
                                    value="{{ old('no_induk') }}" id="inputNis" required>
                            </div>
                            {{-- <div class="col-md-3">
                                        <label for="inputKelas" class="form-label">Kelas</label>
                                        <select name="kelompok_id" id="inputKelas"
                                            class="form-select @error('kelompok_id') is-invalid @enderror">
                                            @foreach ($kelompok as $item)
                                                @if (old('kelompok_id') == $item->id)
                                                    <option value="{{ $item->id }}" selected>{{ $item->nama_kelompok }}</option>
                                                @else
                                                    <option value="{{ $item->id }}">{{ $item->nama_kelompok }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('kelompok_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}
                            <div class="col-md-5">
                                <label for="inputTahun" class="form-label">Tahun Masuk</label>
                                <select name="tahun_id" id="inputTahun"
                                    class="form-select @error('tahun_id') is-invalid @enderror">
                                    @foreach ($tahun as $th)
                                        @if (old('tahun_id') == $th->id)
                                            <option value="{{ $th->id }}" selected>
                                                {{ $th->tahun_ajaran }}
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
                            <div class="col-md-4">
                                <label for="inputTempat" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir"
                                    class="form-control @error('tempat_lahir') is-invalid @enderror"
                                    value="{{ old('tempat_lahir') }}" id="inputTempat" required>
                            </div>
                            <div class="col-md-5">
                                <label for="inputTanggal" class="form-label">Tanggal Lahir</label>
                                <input class="flatpickr form-control input active @error('tgl_lahir') is-invalid @enderror"
                                    placeholder="Select Date.." tabindex="0" type="text" name="tgl_lahir"
                                    id="inputTanggal" readonly="readonly" required value="{{ old('tgl_lahir') }}">
                            </div>
                            <div class="col-md-3">
                                <label for="inputJk" class="form-label">Jenis Kelamin</label>
                                <select name="jk_siswa" id="inputJk"
                                    class="form-select @error('jk_siswa') is-invalid @enderror">
                                    @foreach ($jekel as $jk)
                                        @if (old('jk_siswa') == $jk['jk'])
                                            <option value="{{ $jk['jk'] }}" selected>{{ $jk['jk'] }}</option>
                                        @else
                                            <option value="{{ $jk['jk'] }}">{{ $jk['jk'] }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="inputAlamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat"
                                    class="form-control @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}"
                                    id="inputAlamat" required>
                            </div>
                            <div class="col-12">
                                <label for="inputOrtu" class="form-label">Nama Orang Tua</label>
                                <input type="text" name="nama_ortu"
                                    class="form-control @error('nama_ortu') is-invalid @enderror"
                                    value="{{ old('nama_ortu') }}" id="inputOrtu" required>
                            </div>
                            <div class="col-12">
                                <label for="inputPhone" class="form-label">Nomor Telepon</label>
                                <input type="text" name="no_telp"
                                    class="form-control @error('no_telp') is-invalid @enderror"
                                    value="{{ old('no_telp') }}" id="inputPhone" required>
                            </div>
                            <div class="col-12">
                                <label for="image" class="form-label">Tambah Foto</label>
                                <label class="btn border rounded mb-1 col-sm-2 d-block" for="photo">
                                    <img class="ri-image-add-line img-preview img-fluid rounded" style="font-size: 55px;"
                                        alt="" src="">
                                </label>
                                <input class="form-control" type="file" id="photo" style="display: none;"
                                    name="photo" multiple onchange="previewImage()">
                                @error('photo')
                                    <p class="text-danger">
                                        {{ $message }}
                                    </p>
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
                <div class="card">
                    <div class="filter">
                        <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            {{-- <li class="dropdown-header text-start"></li> --}}
                            <li><a class="dropdown-item" href="/administrator/students">See All</a></li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Siswa Berhasil Ditambahkan</h5>
                        <div class="breadcrumb m-0 p-0">
                            <a class="breadcrumb-item" href="/administrator/students">
                                Lihat Semua daftar siswa
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
                                {{-- @foreach ($data->where('status', 'aktif') as $d) --}}
                                @foreach ($data as $d)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $d->nama }}</td>
                                        <td>
                                            <a class="btn btn-warning btn-sm"
                                                href="/administrator/students/{{ $d->id }}/edit">
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
            <a href="/administrator/students" class="btn btn-secondary">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
