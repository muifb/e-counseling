@extends('dashboard.layouts.main')

@section('container')
    <div class="col-md-12">
        @if (Request::is('administrator/teachers/*/edit'))
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            @if ($data->photo)
                                <div class="rounded-circle mb-3" style="max-height: 200px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile" class="img-preview"
                                        width="200px">
                                </div>
                            @else
                                <div class="rounded-circle mb-3" style="max-height: 200px; overflow:hidden;">
                                    <img src="/img/profile.jpg" alt="Profile" class="img-preview" width="200px">
                                </div>
                            @endif
                            <label class="btn btn-primary btn-sm" title="Upload new image" for="photo">
                                <i class="bi bi-upload"></i>
                                <small class="text-center"> Upload </small>
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card info-card customers-card">

                        <div class="card-body">
                            <h5 class="card-title">Form Ubah Guru</h5>
                            <form action="/administrator/teachers/{{ $data->id }}" class="row g-3 needs-validation"
                                novalidate method="post" enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="col-md-12">
                                    <input type="hidden" name="oldImage" value="{{ $data->photo }}">
                                    <input type="file" id="photo" style="display:none;visibility:none;"
                                        name="photo" onchange="previewImage()">
                                    <label for="inputNama" class="form-label">Nama</label>
                                    <input type="text" name="nama_guru"
                                        class="form-control @error('nama_guru') is-invalid @enderror" id="inputNama"
                                        value="{{ old('nama_guru', $data->nama_guru) }}" required autofocus>
                                </div>
                                <div class="col-md-7">
                                    <label for="inputNis" class="form-label">NIDN</label>
                                    <input type="text" name="nuptk"
                                        class="form-control @error('nuptk') is-invalid @enderror"
                                        value="{{ old('nuptk', $data->nuptk) }}" id="inputNis" required>
                                </div>
                                <div class="col-md-5">
                                    <label for="inputKelas" class="form-label">Devisi</label>
                                    <select name="devisi" id="inputKelas" class="form-select">
                                        @if (old('devisi', $data->devisi))
                                            <option selected>{{ old('devisi', $data->devisi) }}</option>
                                        @endif
                                        <option>Guru</option>
                                        <option>Tatausaha</option>
                                        <option>Kepala Sekolah</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputTanggal" class="form-label">Tanggal Lahir</label>
                                    <input
                                        class="flatpickr form-control input active @error('tgl_lahir') is-invalid @enderror"
                                        placeholder="Select Date.." tabindex="0" type="text" name="tgl_lahir"
                                        id="inputTanggal" readonly="readonly" required
                                        value="{{ old('tgl_lahir', $data->tgl_lahir) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputJk" class="form-label">Jenis Kelamin</label>
                                    <select name="jk_guru" id="inputJk" class="form-select">
                                        @if (old('jk_guru', $data->jk_guru))
                                            <option selected>{{ old('jk_guru', $data->jk_guru) }}</option>
                                        @endif
                                        <option>Laki-Laki</option>
                                        <option>Perempuan</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputPhone" class="form-label">Nomor Telepon</label>
                                    <input type="text" name="no_telp"
                                        class="form-control @error('no_telp') is-invalid @enderror"
                                        value="{{ old('no_telp', $data->no_telp) }}" id="inputPhone" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputAlamat" class="form-label">Alamat</label>
                                    <input type="text" name="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror"
                                        value="{{ old('alamat', $data->alamat) }}" id="inputAlamat" required>
                                </div>
                                <div class="col-12">
                                    <label for="inputTempat" class="form-label">Pendidikan</label>
                                    <input type="text" name="pendidikan"
                                        class="form-control @error('pendidikan') is-invalid @enderror"
                                        value="{{ old('pendidikan', $data->pendidikan) }}" id="inputTempat" required>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="ri-file-edit-fill"></i> Ubah
                                    </button>
                                    <a href="/administrator/teachers" class="btn btn-danger">
                                        <i class="ri-indeterminate-circle-fill"></i> Batal
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row">
                <div class="col-md-4">

                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            @if ($data->photo)
                                <div class="rounded-circle mb-3" style="max-height: 200px; overflow:hidden;">
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile" width="200px">
                                </div>
                            @else
                                <div class="rounded-circle mb-3" style="max-height: 200px; overflow:hidden;">
                                    <img src="/img/profile.jpg" alt="Profile" width="200px">
                                </div>
                            @endif
                            <h2 class="text-center"></h2>
                        </div>
                    </div>

                </div>
                <div class="col-md-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Identitas Guru</h5>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label ">Nama Lengkap</div>
                                <div class="col-lg-9 col-md-8 text-secondary">
                                    {{ $data->nama_guru }}
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">NIDN</div>
                                <div class="col-lg-9 col-md-8 text-secondary">{{ $data->nuptk }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Jabatan</div>
                                <div class="col-lg-9 col-md-8 text-secondary">{{ $data->devisi }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Pendidian</div>
                                <div class="col-lg-9 col-md-8 text-secondary">{{ $data->pendidikan }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                <div class="col-lg-9 col-md-8 text-secondary">{{ $data->jk_guru }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Usia</div>
                                <div class="col-lg-9 col-md-8 text-secondary">
                                    {{ \Carbon\Carbon::parse($data->tgl_lahir)->age }} Tahun
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Nomor Telepon</div>
                                <div class="col-lg-9 col-md-8 text-secondary">{{ $data->no_telp }}</div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">Alamat</div>
                                <div class="col-lg-9 col-md-8 text-secondary">{{ $data->alamat }}</div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        @endif
        <div class="d-flex justify-content-end me-5 mb-3">
            <a href="/administrator/teachers" class="btn btn-secondary">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>

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
@endsection
