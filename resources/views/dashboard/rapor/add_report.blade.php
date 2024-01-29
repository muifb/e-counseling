@extends('dashboard.layouts.main')

@push('css')
    <!--  Trix Editor -->
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <script type="text/javascript" src="/js/trix.umd.min.js"></script>
@endpush

@push('js')
    <script src="/assets/js/upload.js"></script>
    <script>
        document.addEventListener("trix-file-accept", function(event) {
            event.preventDefault();
        });
    </script>
@endpush
@section('container')
    <div class="col-md">
        @error('semester')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-x-circle"></i>
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" style="--bs-breadcrumb-divider: '>>';">

                    <li class="breadcrumb">
                        <span class="breadcrumb-item"><a href="/dashboard/learnings">Siswa</a></span>
                        <span class="breadcrumb-item active">Tambah Report ({{ $data->nama }} -
                            {{ $data->no_induk }})</span>
                    </li>

                </ul>
                <div class="tab-content pt-3">
                    <form action="/dashboard/learnings/report" class="row g-3 needs-validation" novalidate method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="tab-pane fade show active profile-overview mb-4" id="profile-overview">
                            <div class="row g-0">
                                <div class="col-md-2 ms-3 mb-3 ps-3">
                                    @if ($data->photo)
                                        <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile" width="100"
                                            height="100" class="img-preview rounded-circle">
                                    @else
                                        <img src="/img/profile.jpg" alt="Profile" width="100" height="100"
                                            class=" rounded-circle">
                                    @endif
                                </div>
                                <div class="col-md">
                                    <div class="row">
                                        <div class="breadcrumb my-0 py-0 ps-4">
                                            <h5 class="card-title mb-0 pt-1 pb-2">{{ $data->nama }}</h5>
                                        </div>
                                        <div class="col-md">
                                            <div class="row">
                                                <div class="card-body">
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="no_induk" class="col-sm-4 col-form-label">Nomor
                                                            Induk</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="no_induk" value="{{ $data->no_induk }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal
                                                            Lahir</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="tgl_lahir"
                                                                value="{{ \Carbon\Carbon::parse($data->tgl_lahir)->format('j F, Y') }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md">
                                            <div class="row align-items-center">
                                                <div class="card-body">
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="kelompok"
                                                            class="col-sm-4 col-form-label">Kelompok</label>
                                                        <div class="col-sm">
                                                            <input type="hidden" name="kelompok_id"
                                                                value="{{ $data->kelompok->id }}">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="kelompok" value="{{ $data->kelompok->nama_kelompok }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="semester"
                                                            class="col-sm-4 col-form-label">Semester</label>
                                                        <div class="col-sm">
                                                            <input type="hidden" name="semester"
                                                                value="{{ $semester->first()->semester }}">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="semester" id="semester"
                                                                value="{{ $semester->first()->semester }}" disabled>
                                                            {{-- <select name="semester" id="semester"
                                                                    class="form-select @error('semester') is-invalid @enderror">
                                                                    @if (old('semester'))
                                                                        <option value="{{ old('semester') }}" selected>
                                                                            {{ old('semester') }}</option>
                                                                    @endif
                                                                    <option
                                                                        value="Ganjil {{ $tahun->last()->tahun_ajaran }}">
                                                                        Ganjil {{ $tahun->last()->tahun_ajaran }}</option>
                                                                    <option
                                                                        value="Genap {{ $tahun->last()->tahun_ajaran }}">
                                                                        Genap {{ $tahun->last()->tahun_ajaran }}</option>
                                                                </select> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="breadcrumb m-0 p-0">
                                            <a class="breadcrumb-item"
                                                href="/dashboard/learnings/see-report/{{ $data->id }}">
                                                Lihat Report
                                                <i class="ri-arrow-right-double-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="nilai_agama" class="col-sm-3 col-form-label">
                                    <span>Perkembangan Nilai</span><br>
                                    <span>Agama dan Moral</span>
                                </label>
                                <div class="col-sm-9">
                                    <input name="siswa_id" type="hidden" value="{{ old('siswa_id', $data->id) }}">
                                    <input id="nilai_agama" type="hidden" name="nilai_agama"
                                        value="{{ old('nilai_agama') }}">
                                    <trix-editor input="nilai_agama">
                                        <div>Alhamdulillah, ananda <strong>{{ $data->nama }} </strong>anak yang
                                            membanggakan, terlihat
                                            dari banyaknya capaian perkembangan pada semester ini tercapai
                                            <strong>sesuai
                                                harapan dan baik</strong>. Beberapa perkembangan yang dicapai
                                            {{ $data->nama }} yang
                                            cukup baik antara :<br>
                                        </div>
                                        <ol>
                                            <li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa dirinya,
                                                keluarga, lingkungan dan binatang adalah ciptaan Allah.</li>
                                            <li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab
                                                salam
                                                dengan baik.</li>
                                            <li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li>
                                            <li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li>
                                            <li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan sesudah
                                                makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.
                                            </li>
                                            <li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang tua,
                                                cinta tanah air, kebersihan.</li>
                                        </ol>
                                    </trix-editor>
                                    @error('nilai_agama')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="photoAgama*" class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                                <div class="col-sm-9">
                                    <div class="row ps-3 rounded" id="imagePreview">
                                        <label class="btn col-sm-1 mb-1 photo-agama1" for="photoAgama1">
                                            <i class="bi bi-plus-square fs-1 img-preview-agama1"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoAgama1"
                                            style="display: none;" name="photo_agama[]" multiple
                                            onchange="previewImageAgama1()">
                                        <label class="btn col-sm-1 mb-1 photo-agama2" for="photoAgama2">
                                            <i class="bi bi-plus-square fs-1 img-preview-agama2"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoAgama2"
                                            style="display: none;" name="photo_agama[]" multiple
                                            onchange="previewImageAgama2()">
                                        <label class="btn col-sm-1 mb-1 photo-agama3" for="photoAgama3">
                                            <i class="bi bi-plus-square fs-1 img-preview-agama3"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoAgama3"
                                            style="display: none;" name="photo_agama[]" multiple
                                            onchange="previewImageAgama3()">
                                        <label class="btn col-sm-1 mb-1 photo-agama4" for="photoAgama4">
                                            <i class="bi bi-plus-square fs-1 img-preview-agama4"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoAgama4"
                                            style="display: none;" name="photo_agama[]" multiple
                                            onchange="previewImageAgama4()">
                                    </div>
                                    @error('photo_agama*')
                                        <p class="text-danger">
                                            {{-- {{ $message }} --}}
                                            Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak boleh
                                            lebih
                                            dari 2MB
                                            <br>
                                            Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih dari
                                            2
                                            MB
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="motorik" class="col-sm-3 col-form-label">
                                    <span>Perkembangan Fisik</span><br>
                                    <span>dan Motorik</span>
                                </label>
                                <div class="col-sm-9">
                                    <input id="motorik" type="hidden" name="motorik" value="{{ old('motorik') }}">
                                    <trix-editor input="motorik">
                                        <div>Dalam capaian perkembangan motorik ananda <strong>{{ $data->nama }}
                                            </strong>pada
                                            semester ini yang <strong>sesuai harapan dan baik</strong> adalah :<br>
                                        </div>
                                        <ol>
                                            <li>Menggunakan anggota tubuhnya untuk pengembangan motorik kasar dan
                                                halus.</li>
                                            <li>Dapat bergerak lincah dan luwes dalam setiap kegiatan seperti,
                                                merangkak,
                                                melompat, memanjat, berlari, menangkap bola, melempar bola dan jalan
                                                ditempat.</li>
                                            <li>Mampu menirukan gerakan binatang.</li>
                                            <li>Melakukan gerakan-gerakan menggunakan jari-jari tangannya seperti,
                                                menempel,
                                                mewarnai, menggunting ,menebali huruf, dan melengkapi huruf.</li>
                                        </ol>
                                    </trix-editor>
                                    @error('motorik')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="photoMotorik*" class="col-sm-3 col-form-label">Tambahkan
                                    Foto/Video</label>
                                <div class="col-sm-9">
                                    <div class="row ps-3 rounded" id="imagePreview">
                                        <label class="btn col-sm-1 mb-1 photo-motorik1" for="photoMotorik1">
                                            <i class="bi bi-plus-square fs-1 img-preview-motorik1"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoMotorik1"
                                            style="display: none;" name="photo_motorik[]" multiple
                                            onchange="previewImageMotorik1()">
                                        <label class="btn col-sm-1 mb-1 photo-motorik2" for="photoMotorik2">
                                            <i class="bi bi-plus-square fs-1 img-preview-motorik2"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoMotorik2"
                                            style="display: none;" name="photo_motorik[]" multiple
                                            onchange="previewImageMotorik2()">
                                        <label class="btn col-sm-1 mb-1 photo-motorik3" for="photoMotorik3">
                                            <i class="bi bi-plus-square fs-1 img-preview-motorik3"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoMotorik3"
                                            style="display: none;" name="photo_motorik[]" multiple
                                            onchange="previewImageMotorik3()">
                                        <label class="btn col-sm-1 mb-1 photo-motorik4" for="photoMotorik4">
                                            <i class="bi bi-plus-square fs-1 img-preview-motorik4"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoMotorik4"
                                            style="display: none;" name="photo_motorik[]" multiple
                                            onchange="previewImageMotorik4()">
                                    </div>
                                    @error('photo_motorik*')
                                        <p class="text-danger">
                                            {{-- {{ $message }} --}}
                                            Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak boleh
                                            lebih
                                            dari 2MB
                                            <br>
                                            Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih dari
                                            2
                                            MB
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="kognitif" class="col-sm-3 col-form-label">
                                    <span>Perkembangan Kognitif</span>
                                </label>
                                <div class="col-sm-9">
                                    <input id="kognitif" type="hidden" name="kognitif" value="{{ old('kognitif') }}">
                                    <trix-editor input="kognitif">
                                        <div>Capaian perkembangan kognitif <strong>{{ $data->nama }} </strong>pada
                                            semester ini yang
                                            <strong>sesuai harapan dan baik</strong> adalah :<br>
                                        </div>
                                        <ol>
                                            <li>Mengenal nama-nama hari dan bulan dengan runtut.</li>
                                            <li>Mengenal bilangan angka 1- 50.</li>
                                            <li>Mengenal konsep besar-kecil dan macam-macam geometri.</li>
                                            <li>Mampu menirukan garis vertikal, horizontal, lengkung kanan, lengkung
                                                kiri,
                                                miring kanan, miring kiri.</li>
                                            <li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran, fungsi,
                                                dan
                                                berbagai ciri-ciri yang ada di benda itu.</li>
                                            <li>Mampu menghubungkan gambar dengan lambang bilangannya.</li>
                                        </ol>
                                    </trix-editor>
                                    @error('kognitif')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="photoKognitif*" class="col-sm-3 col-form-label">Tambahkan
                                    Foto/Video</label>
                                <div class="col-sm-9">
                                    <div class="row ps-3 rounded" id="imagePreview">
                                        <label class="btn col-sm-1 mb-1 photo-kognitif1" for="photoKognitif1">
                                            <i class="bi bi-plus-square fs-1 img-preview-kognitif1"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoKognitif1"
                                            style="display: none;" name="photo_kognitif[]" multiple
                                            onchange="previewImageKognitif1()">
                                        <label class="btn col-sm-1 mb-1 photo-kognitif2" for="photoKognitif2">
                                            <i class="bi bi-plus-square fs-1 img-preview-kognitif2"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoKognitif2"
                                            style="display: none;" name="photo_kognitif[]" multiple
                                            onchange="previewImageKognitif2()">
                                        <label class="btn col-sm-1 mb-1 photo-kognitif3" for="photoKognitif3">
                                            <i class="bi bi-plus-square fs-1 img-preview-kognitif3"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoKognitif3"
                                            style="display: none;" name="photo_kognitif[]" multiple
                                            onchange="previewImageKognitif3()">
                                        <label class="btn col-sm-1 mb-1 photo-kognitif4" for="photoKognitif4">
                                            <i class="bi bi-plus-square fs-1 img-preview-kognitif4"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoKognitif4"
                                            style="display: none;" name="photo_kognitif[]" multiple
                                            onchange="previewImageKognitif4()">
                                    </div>
                                    @error('photo_kognitif*')
                                        <p class="text-danger">
                                            {{-- {{ $message }} --}}
                                            Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak boleh
                                            lebih
                                            dari 2MB
                                            <br>
                                            Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih dari
                                            2
                                            MB
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="sosial" class="col-sm-3 col-form-label">
                                    <span>Perkembangan Sosial Emosional</span>
                                </label>
                                <div class="col-sm-9">
                                    <input id="sosial" type="hidden" name="sosial" value="{{ old('sosial') }}">
                                    <trix-editor input="sosial">
                                        <div>Ananda <strong>{{ $data->nama }} </strong>mampu mengenal emosi diri
                                            sendiri.<br>
                                        </div>
                                        <ol>
                                            <li>Mampu membedakan barang diri sendiri dan milik orang lain.</li>
                                            <li>Mampu mengerjakan tugas yang diberikan.</li>
                                            <li>Membereskan peralatan sekolah sendiri.</li>
                                            <li>Mampu mengungkapkan perasaan sedih atau bahagia.</li>
                                        </ol>
                                    </trix-editor>
                                    @error('sosial')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="photoSosial*" class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                                <div class="col-sm-9">
                                    <div class="row ps-3 rounded" id="imagePreview">
                                        <label class="btn col-sm-1 mb-1 photo-sosial1" for="photoSosial1">
                                            <i class="bi bi-plus-square fs-1 img-preview-sosial1"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSosial1"
                                            style="display: none;" name="photo_sosial[]" multiple
                                            onchange="previewImageSosial1()">
                                        <label class="btn col-sm-1 mb-1 photo-sosial2" for="photoSosial2">
                                            <i class="bi bi-plus-square fs-1 img-preview-sosial2"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSosial2"
                                            style="display: none;" name="photo_sosial[]" multiple
                                            onchange="previewImageSosial2()">
                                        <label class="btn col-sm-1 mb-1 photo-sosial3" for="photoSosial3">
                                            <i class="bi bi-plus-square fs-1 img-preview-sosial3"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSosial3"
                                            style="display: none;" name="photo_sosial[]" multiple
                                            onchange="previewImageSosial3()">
                                        <label class="btn col-sm-1 mb-1 photo-sosial4" for="photoSosial4">
                                            <i class="bi bi-plus-square fs-1 img-preview-sosial4"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSosial4"
                                            style="display: none;" name="photo_sosial[]" multiple
                                            onchange="previewImageSosial4()">
                                    </div>
                                    @error('photo_sosial*')
                                        <p class="text-danger">
                                            {{-- {{ $message }} --}}
                                            Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak boleh
                                            lebih
                                            dari 2MB
                                            <br>
                                            Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih dari
                                            2
                                            MB
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="bahasa" class="col-sm-3 col-form-label">
                                    <span>Perkembangan Bahasa</span>
                                </label>
                                <div class="col-sm-9">
                                    <input id="bahasa" type="hidden" name="bahasa" value="{{ old('bahasa') }}">
                                    <trix-editor input="bahasa">
                                        <div>Capaian perkembangan bahasa ananda <strong>{{ $data->nama }}
                                            </strong>pada
                                            semester ini
                                            yang <strong>sesuai harapan dan baik</strong> adalah :<br>
                                        </div>
                                        <ol>
                                            <li>Dapat menirukan kalimat sederhana.</li>
                                            <li>Mengenal huruf A-Z.</li>
                                            <li>Dapat menyebutkan warna dan angka.</li>
                                            <li>Menyayikan beberapa lagu anak dengan baik.</li>
                                            <li>Mengenal keaksaraan dengan menuliskan nama panggilan dirinya.</li>
                                            <li>Mengenal tulisan huruf hijaiyyah.</li>
                                            <li>Membaca gambar sederhana dengan bahasa sederhana.</li>
                                        </ol>
                                    </trix-editor>
                                    @error('bahasa')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="photoBahasa*" class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                                <div class="col-sm-9">
                                    <div class="row ps-3 rounded" id="imagePreview">
                                        <label class="btn col-sm-1 mb-1 photo-bahasa1" for="photoBahasa1">
                                            <i class="bi bi-plus-square fs-1 img-preview-bahasa1"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoBahasa1"
                                            style="display: none;" name="photo_bahasa[]" multiple
                                            onchange="previewImageBahasa1()">
                                        <label class="btn col-sm-1 mb-1 photo-bahasa2" for="photoBahasa2">
                                            <i class="bi bi-plus-square fs-1 img-preview-bahasa2"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoBahasa2"
                                            style="display: none;" name="photo_bahasa[]" multiple
                                            onchange="previewImageBahasa2()">
                                        <label class="btn col-sm-1 mb-1 photo-bahasa3" for="photoBahasa3">
                                            <i class="bi bi-plus-square fs-1 img-preview-bahasa3"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoBahasa3"
                                            style="display: none;" name="photo_bahasa[]" multiple
                                            onchange="previewImageBahasa3()">
                                        <label class="btn col-sm-1 mb-1 photo-bahasa4" for="photoBahasa4">
                                            <i class="bi bi-plus-square fs-1 img-preview-bahasa4"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoBahasa4"
                                            style="display: none;" name="photo_bahasa[]" multiple
                                            onchange="previewImageBahasa4()">
                                    </div>
                                    @error('photo_bahasa*')
                                        <p class="text-danger">
                                            {{-- {{ $message }} --}}
                                            Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak boleh
                                            lebih
                                            dari 2MB
                                            <br>
                                            Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih dari
                                            2
                                            MB
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="seni" class="col-sm-3 col-form-label">
                                    <span>Perkembangan Seni</span>
                                </label>
                                <div class="col-sm-9">
                                    <input id="seni" type="hidden" name="seni" value="{{ old('seni') }}">
                                    <trix-editor input="seni">
                                        <div>Ananda <strong>{{ $data->nama }} </strong>cukup mampu menunjukkan karya
                                            dan
                                            aktivitas seni
                                            dengan menggunakan berbagai media. Dalam perkembangan seni yang
                                            <strong>sesuai
                                                harapan dan cukup baik</strong> adalah :<br>
                                        </div>
                                        <ol>
                                            <li>Ia senang menggambar berbagai bentuk dengan sempurna.</li>
                                            <li>Senang mewarnai gambar tanpa keluar garis.</li>
                                            <li>Mampu membuat bentuk kepala dari kertas lipat dengan sempurna.</li>
                                            <li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.</li>
                                            <li>Mampu menghias dinding rumah dengan daun pisang kering.</li>
                                            <li>Mampu membuat kolase ikan bandeng menggunakan kertas lipat untuk
                                                membentuk
                                                sisik ikan.</li>
                                        </ol>
                                    </trix-editor>
                                    @error('seni')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label for="photoSeni*" class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                                <div class="col-sm-9">
                                    <div class="row ps-3 rounded" id="imagePreview">
                                        <label class="btn col-sm-1 mb-1 photo-seni1" for="photoSeni1">
                                            <i class="bi bi-plus-square fs-1 img-preview-seni1"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSeni1"
                                            style="display: none;" name="photo_seni[]" multiple
                                            onchange="previewImageSeni1()">
                                        <label class="btn col-sm-1 mb-1 photo-seni2" for="photoSeni2">
                                            <i class="bi bi-plus-square fs-1 img-preview-seni2"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSeni2"
                                            style="display: none;" name="photo_seni[]" multiple
                                            onchange="previewImageSeni2()">
                                        <label class="btn col-sm-1 mb-1 photo-seni3" for="photoSeni3">
                                            <i class="bi bi-plus-square fs-1 img-preview-seni3"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSeni3"
                                            style="display: none;" name="photo_seni[]" multiple
                                            onchange="previewImageSeni3()">
                                        <label class="btn col-sm-1 mb-1 photo-seni4" for="photoSeni4">
                                            <i class="bi bi-plus-square fs-1 img-preview-seni4"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSeni4"
                                            style="display: none;" name="photo_seni[]" multiple
                                            onchange="previewImageSeni4()">
                                    </div>
                                    @error('photo_seni*')
                                        <p class="text-danger">
                                            {{-- {{ $message }} --}}
                                            Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak boleh
                                            lebih
                                            dari 2MB
                                            <br>
                                            Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih dari
                                            2
                                            MB
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row my-3">
                            <label for="" class="col-sm-3 col-form-label"></label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ri-checkbox-circle-fill"></i> Simpan
                                </button>
                                <a href="/dashboard/learnings" type="reset" class="btn btn-danger">
                                    <i class="ri-indeterminate-circle-fill"></i> Batal
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="d-flex justify-content-end me-5 mb-2">
            <a href="/dashboard/learnings" class="btn btn-secondary">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
