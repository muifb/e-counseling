@extends('dashboard.layouts.main')

@section('container')
    <div class="col-md-12">
        @if (Request::is('administrator/students/*/edit'))
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                            @if ($data->photo)
                                <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile"
                                    class="img-preview img-thumbnail rounded-circle col-md-7 mb-3">
                            @else
                                <img src="/img/profile.jpg" alt="Profile"
                                    class="img-preview img-thumbnail rounded-circle col-md-7 mb-3">
                            @endif
                            <label class="btn btn-primary btn-sm" title="Upload new image" for="photo">
                                <i class="bi bi-upload"></i>
                                <small class="text-center"> Upload </small>
                            </label>
                            @error('photo')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>

                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="card info-card customers-card">
                            <div class="card-body">
                                <h5 class="card-title">Form Ubah Data Siswa</h5>

                                <form action="/administrator/students/{{ $data->id }}" class="row g-3 needs-validation"
                                    novalidate method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <div class="col-md-9">
                                        <input type="hidden" name="oldImage" value="{{ $data->photo }}">
                                        <input type="file" id="photo" style="display:none;visibility:none;"
                                            name="photo" onchange="previewImage()">
                                        <label for="inputNama" class="form-label">Nama</label>
                                        <input type="text" name="nama"
                                            class="form-control @error('nama') is-invalid @enderror" id="inputNama"
                                            value="{{ old('nama', $data->nama) }}" required autofocus>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputStatus" class="form-label">Status</label>
                                        <select name="status" id="inputStatus" class="form-select">
                                            @foreach ($status as $st)
                                                @if (old('status', $data->status) == $st['sts'])
                                                    <option selected>{{ $st['sts'] }}</option>
                                                @else
                                                    <option>{{ $st['sts'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputNis" class="form-label">Nis</label>
                                        <input type="text" name="no_induk"
                                            class="form-control @error('no_induk') is-invalid @enderror"
                                            value="{{ old('no_induk', $data->no_induk) }}" id="inputNis" required>
                                        @error('no_induk')
                                            {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="inputKelas" class="form-label">Kelas</label>
                                        @if (!$data->kelompok_id)
                                            <input type="text" class="form-control" value="Belum Ada Kelas" disabled
                                                readonly>
                                        @else
                                            <select name="kelompok_id" id="inputKelas"
                                                class="form-select @error('kelompok_id') is-invalid @enderror">
                                                @foreach ($kelompok as $item)
                                                    @if (old('kelompok_id', $data->kelompok_id) == $item->id)
                                                        <option value="{{ $item->id }}" selected>
                                                            {{ $item->nama_kelompok }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $item->id }}">
                                                            {{ $item->nama_kelompok }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        @endif
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputTahun" class="form-label">Tahun Masuk</label>
                                        <select name="tahun_id" id="inputTahun"
                                            class="form-select @error('tahun_id') is-invalid @enderror">
                                            @foreach ($tahun as $th)
                                                @if (old('tahun_id', $data->tahun->id) == $th->id)
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
                                    <div class="col-md-4">
                                        <label for="inputTempat" class="form-label">Tempat Lahir</label>
                                        <input type="text" name="tempat_lahir"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            value="{{ old('tempat_lahir', $data->tempat_lahir) }}" id="inputTempat"
                                            required>
                                    </div>
                                    <div class="col-md-5">
                                        <label for="inputTanggal" class="form-label">Tanggal Lahir</label>
                                        <input
                                            class="flatpickr form-control input active @error('tgl_lahir') is-invalid @enderror"
                                            placeholder="Select Date.." tabindex="0" type="text" name="tgl_lahir"
                                            id="inputTanggal" readonly="readonly" required
                                            value="{{ old('tgl_lahir', $data->tgl_lahir) }}">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="inputJk" class="form-label">Jenis Kelamin</label>
                                        <select name="jk_siswa" id="inputJk"
                                            class="form-select @error('jk_siswa') is-invalid @enderror">
                                            @foreach ($jekel as $jk)
                                                @if (old('jk_siswa', $data->jk_siswa) == $jk['jk'])
                                                    <option selected>{{ $jk['jk'] }}</option>
                                                @else
                                                    <option>{{ $jk['jk'] }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAlamat" class="form-label">Alamat</label>
                                        <input type="text" name="alamat"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            value="{{ old('alamat', $data->alamat) }}" id="inputAlamat" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputOrtu" class="form-label">Nama Orang Tua</label>
                                        <input type="text" name="nama_ortu"
                                            class="form-control @error('nama_ortu') is-invalid @enderror"
                                            value="{{ old('nama_ortu', $data->nama_ortu) }}" id="inputOrtu" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputPhone" class="form-label">Nomor Telepon</label>
                                        <input type="text" name="no_telp"
                                            class="form-control @error('no_telp') is-invalid @enderror"
                                            value="{{ old('no_telp', $data->no_telp) }}" id="inputPhone" required>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="ri-file-edit-fill"></i> Ubah
                                        </button>
                                        <a href="/administrator/students" class="btn btn-danger">
                                            <i class="ri-indeterminate-circle-fill"></i> Batal
                                        </a>
                                    </div>
                                </form>
                            </div>
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
                                <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile"
                                    class="img-thumbnail rounded-circle col-md-7 mb-3">
                            @else
                                <img src="/img/profile.jpg" alt="Profile"
                                    class="img-thumbnail rounded-circle col-md-7 mb-3">
                            @endif
                            <h2 class="text-center"></h2>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content">
                                <h5 class="card-title">Siswa Detail</h5>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label ">Nama Siswa</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">
                                        {{ $data->nama }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">No. Induk</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">{{ $data->no_induk }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Kelompok</div>
                                    @if (!$data->kelompok_id)
                                        <div class="col-lg-9 col-md-8 text-secondary">Belum ada kelompok</div>
                                    @else
                                        <div class="col-lg-9 col-md-8 text-secondary">
                                            {{ $data->kelompok->nama_kelompok }}
                                        </div>
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tahun Masuk</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">{{ $data->tahun->tahun_ajaran }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tempat lahir</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">
                                        {{ $data->tempat_lahir }}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Tanggal lahir</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">
                                        {{ \Carbon\Carbon::parse($data->tgl_lahir)->translatedFormat('F j Y') }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Usia</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">
                                        {{ \Carbon\Carbon::parse($data->tgl_lahir)->age }} Tahun</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Status</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">{{ $data->status }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Jenis Kelamin</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">{{ $data->jk_siswa }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Alamat</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">{{ $data->alamat }}</div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-4 label">Nama Wali</div>
                                    <div class="col-lg-9 col-md-8 text-secondary">{{ $data->nama_ortu }}</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-end me-5 mb-2">
            <a href="/administrator/students" class="btn btn-secondary">
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
