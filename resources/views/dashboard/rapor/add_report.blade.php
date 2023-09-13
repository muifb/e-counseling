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
        @if ($report)
            @if ($report->status == 'menunggu')
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-info alert-dismissible fade show my-3 text-center" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                                <h4 class="alert-heading">Pemberitahuan</h4>
                                <p>Menunggu persetujuan <strong>Kepala Sekolah!</strong>.
                                </p>
                                <hr>
                                <p class="mb-0">Silahkan kembali lagi setelah disetujui. Atau
                                    <a href="/dashboard/learnings/report/edit/{{ $report->id }}"
                                        class="btn badge bg-warning">Ubah Rapor</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($report->status == 'ditolak')
                <div class="col-md">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-danger alert-dismissible fade show my-3 text-center" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                                <h4 class="alert-heading">Rapor Ditolak</h4>
                                <h5 class="alert-heading">Saran kepala sekolah : {{ $report->saran }}</h5>
                                <a href="/dashboard/learnings/report/edit/{{ $report->id }}"
                                    class="btn btn-warning btn-sm">Perbaiki Rapor</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
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
                            <form action="/dashboard/learnings/report" class="row g-3 needs-validation" novalidate
                                method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="tab-pane fade show active profile-overview mb-4" id="profile-overview">
                                    <div class="row g-0">
                                        <div class="col-md-2 ms-3 mb-3 ps-3">
                                            @if ($data->photo)
                                                <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile"
                                                    width="100" height="100" class="img-preview rounded-circle">
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
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="no_induk"
                                                                        value="{{ $data->no_induk }}" disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row breadcrumb m-0 p-0">
                                                                <label for="tgl_lahir"
                                                                    class="col-sm-4 col-form-label">Tanggal
                                                                    Lahir</label>
                                                                <div class="col-sm">
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="tgl_lahir"
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
                                                                    <input class="form-control form-control-sm"
                                                                        type="text" name="kelompok"
                                                                        value="{{ $data->kelompok->nama_kelompok }}"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                            <div class="row breadcrumb m-0 p-0">
                                                                <label for="semester"
                                                                    class="col-sm-4 col-form-label">Semester</label>
                                                                <div class="col-sm">
                                                                    {{-- <input class="form-control form-control-sm" type="text"
                                                        name="semester" value="Semester Genap - 2022/2023" disabled> --}}
                                                                    <select name="semester" id="semester"
                                                                        class="form-select @error('semester') is-invalid @enderror">
                                                                        @if (old('semester'))
                                                                            <option value="{{ old('semester') }}"
                                                                                selected>
                                                                                {{ old('semester') }}</option>
                                                                        @endif
                                                                        <option
                                                                            value="Ganjil {{ $tahun->last()->tahun_ajaran }}">
                                                                            Ganjil {{ $tahun->last()->tahun_ajaran }}
                                                                        </option>
                                                                        <option
                                                                            value="Genap {{ $tahun->last()->tahun_ajaran }}">
                                                                            Genap {{ $tahun->last()->tahun_ajaran }}
                                                                        </option>
                                                                    </select>
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
                                        <label class="col-sm-3 col-form-label">
                                            <span>Perkembangan Nilai</span><br>
                                            <span>Agama dan Moral</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input name="siswa_id" type="hidden"
                                                value="{{ old('siswa_id', $data->id) }}">
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
                                                    <li>Mengenal Allah sebagai pencipta nampak saat ia mengatakan bahwa
                                                        dirinya,
                                                        keluarga, lingkungan dan binatang adalah ciptaan Allah.</li>
                                                    <li>Sikap santun selalu mengucapkan salam dengan tersenyum dan menjawab
                                                        salam
                                                        dengan baik.</li>
                                                    <li>Mampu melafalkan surah Al-Fatihah, An-Nas, Al-Falaq, Al-Ikhlas.</li>
                                                    <li>Mampu mengucapkan kalimat thoyyibah dan kalimat tarji’.</li>
                                                    <li>Khusuk dalam mengikuti doa-doa harian seperti doa mau makan dan
                                                        sesudah
                                                        makan, doa mau tidur dan bangun tidur, doa masuk dan keluar rumah.
                                                    </li>
                                                    <li>Khusuk dalam mengikuti hadits-hadits seperti berbakti kepada orang
                                                        tua,
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
                                        <label class="col-sm-3 col-form-label">Tambahkan
                                            Foto/Video</label>
                                        <div class="col-sm-9">
                                            <div class="row ps-3 rounded" id="imagePreview">
                                                @for ($i = 1; $i <= 4; $i++)
                                                    <label class="btn col-sm-1 mb-1 photo-agama{{ $i }}"
                                                        for="photoAgama{{ $i }}">
                                                        <i
                                                            class="bi bi-plus-square fs-1 img-preview-agama{{ $i }}"></i>
                                                    </label>
                                                    <input class="form-control" type="file"
                                                        id="photoAgama{{ $i }}" style="display: none;"
                                                        name="photo_agama[]" multiple
                                                        onchange="previewImageAgama({{ $i }})">
                                                @endfor
                                            </div>
                                            @error('photo_agama*')
                                                <p class="text-danger">
                                                    Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak
                                                    boleh
                                                    lebih
                                                    dari 2MB
                                                    <br>
                                                    Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih
                                                    dari
                                                    2
                                                    MB
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            <span>Perkembangan Fisik</span><br>
                                            <span>dan Motorik</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input id="motorik" type="hidden" name="motorik"
                                                value="{{ old('motorik') }}">
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
                                        <label class="col-sm-3 col-form-label">Tambahkan
                                            Foto/Video</label>
                                        <div class="col-sm-9">
                                            <div class="row ps-3 rounded" id="imagePreview">
                                                @for ($iMotorik = 1; $iMotorik <= 4; $iMotorik++)
                                                    <label class="btn col-sm-1 mb-1 photo-motorik{{ $iMotorik }}"
                                                        for="photoMotorik{{ $iMotorik }}">
                                                        <i
                                                            class="bi bi-plus-square fs-1 img-preview-motorik{{ $iMotorik }}"></i>
                                                    </label>
                                                    <input class="form-control" type="file"
                                                        id="photoMotorik{{ $iMotorik }}" style="display: none;"
                                                        name="photo_motorik[]" multiple
                                                        onchange="previewImageMotorik({{ $iMotorik }})">
                                                @endfor
                                            </div>
                                            @error('photo_motorik*')
                                                <p class="text-danger">
                                                    Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak
                                                    boleh
                                                    lebih
                                                    dari 2MB
                                                    <br>
                                                    Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih
                                                    dari
                                                    2
                                                    MB
                                                </p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-2">
                                    <div class="row mb-1">
                                        <label class="col-sm-3 col-form-label">
                                            <span>Perkembangan Kognitif</span>
                                        </label>
                                        <div class="col-sm-9">
                                            <input id="kognitif" type="hidden" name="kognitif"
                                                value="{{ old('kognitif') }}">
                                            <trix-editor input="kognitif">
                                                <div>Capaian perkembangan kognitif <strong>{{ $data->nama }}
                                                    </strong>pada
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
                                                    <li>Mengenal benda-benda di sekitarnya dari warna, bentuk, ukuran,
                                                        fungsi,
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
                                        <label class="col-sm-3 col-form-label">Tambahkan
                                            Foto/Video</label>
                                        <div class="col-sm-9">
                                            @for ($iKognitif = 1; $iKognitif <= 4; $iKognitif++)
                                                <label class="btn col-sm-1 mb-1 photo-kognitif{{ $iKognitif }}"
                                                    for="photoKognitif{{ $iKognitif }}">
                                                    <i
                                                        class="bi bi-plus-square fs-1 img-preview-kognitif{{ $iKognitif }}"></i>
                                                </label>
                                                <input class="form-control" type="file"
                                                    id="photoKognitif{{ $iKognitif }}" style="display: none;"
                                                    name="photo_kognitif[]" multiple
                                                    onchange="previewImageKognitif({{ $iKognitif }})">
                                            @endfor
                                        </div>
                                        @error('photo_kognitif*')
                                            <p class="text-danger">
                                                {{-- {{ $message }} --}}
                                                Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak
                                                boleh
                                                lebih
                                                dari 2MB
                                                <br>
                                                Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih
                                                dari
                                                2
                                                MB
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label">
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
                                <label class="col-sm-3 col-form-label">Tambahkan
                                    Foto/Video</label>
                                <div class="col-sm-9">
                                    @for ($iSosial = 1; $iSosial <= 4; $iSosial++)
                                        <label class="btn col-sm-1 mb-1 photo-sosial{{ $iSosial }}"
                                            for="photoSosial{{ $iSosial }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-sosial{{ $iSosial }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSosial{{ $iSosial }}"
                                            style="display: none;" name="photo_sosial[]" multiple
                                            onchange="previewImageSosial({{ $iSosial }})">
                                    @endfor
                                </div>
                                @error('photo_sosial*')
                                    <p class="text-danger">
                                        {{-- {{ $message }} --}}
                                        Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak
                                        boleh
                                        lebih
                                        dari 2MB
                                        <br>
                                        Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih
                                        dari
                                        2
                                        MB
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="row mb-1">
                            <label class="col-sm-3 col-form-label">
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
                            <label class="col-sm-3 col-form-label">Tambahkan
                                Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($iBahasa = 1; $iBahasa <= 4; $iBahasa++)
                                        <label class="btn col-sm-1 mb-1 photo-bahasa{{ $iBahasa }}"
                                            for="photoBahasa{{ $iBahasa }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-bahasa{{ $iBahasa }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoBahasa{{ $iBahasa }}"
                                            style="display: none;" name="photo_bahasa[]" multiple
                                            onchange="previewImageBahasa({{ $iBahasa }})">
                                    @endfor
                                </div>
                                @error('photo_bahasa*')
                                    <p class="text-danger">
                                        {{-- {{ $message }} --}}
                                        Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak
                                        boleh
                                        lebih
                                        dari 2MB
                                        <br>
                                        Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih
                                        dari
                                        2
                                        MB
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="row mb-1">
                            <label class="col-sm-3 col-form-label">
                                <span>Perkembangan Seni</span>
                            </label>
                            <div class="col-sm-9">
                                <input id="seni" type="hidden" name="seni" value="{{ old('seni') }}">
                                <trix-editor input="seni">
                                    <div>Ananda <strong>{{ $data->nama }} </strong>cukup mampu menunjukkan
                                        karya
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
                                        <li>Mampu membuat boneka profesi dari sendok plastik dengan sempurna.
                                        </li>
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
                            <label class="col-sm-3 col-form-label">Tambahkan
                                Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($iSeni = 1; $iSeni <= 4; $iSeni++)
                                        <label class="btn col-sm-1 mb-1 photo-seni{{ $iSeni }}"
                                            for="photoSeni{{ $iSeni }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-seni{{ $iSeni }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSeni{{ $iSeni }}"
                                            style="display: none;" name="photo_seni[]" multiple
                                            onchange="previewImageSeni({{ $iSeni }})">
                                    @endfor
                                </div>
                                @error('photo_seni*')
                                    <p class="text-danger">
                                        {{-- {{ $message }} --}}
                                        Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak
                                        boleh
                                        lebih
                                        dari 2MB
                                        <br>
                                        Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih
                                        dari
                                        2
                                        MB
                                    </p>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <label class="col-sm-3 col-form-label"></label>
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
                <!-- End Bordered Tabs -->


    </div>
    </div>
    @endif
@else
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
                                                    <label class="col-sm-4 col-form-label">Nomor
                                                        Induk</label>
                                                    <div class="col-sm">
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="no_induk" value="{{ $data->no_induk }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row breadcrumb m-0 p-0">
                                                    <label class="col-sm-4 col-form-label">Tanggal
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
                                                    <label class="col-sm-4 col-form-label">Kelompok</label>
                                                    <div class="col-sm">
                                                        <input type="hidden" name="kelompok_id"
                                                            value="{{ $data->kelompok->id }}">
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="kelompok" value="{{ $data->kelompok->nama_kelompok }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="row breadcrumb m-0 p-0">
                                                    <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                                                    <div class="col-sm">
                                                        {{-- <input class="form-control form-control-sm" type="text"
                                                    name="semester" value="Semester Genap - 2022/2023" disabled> --}}
                                                        <select name="semester" id="semester"
                                                            class="form-select @error('semester') is-invalid @enderror">
                                                            @if (old('semester'))
                                                                <option value="{{ old('semester') }}" selected>
                                                                    {{ old('semester') }}</option>
                                                            @endif
                                                            <option value="Ganjil {{ $tahun->last()->tahun_ajaran }}">
                                                                Ganjil {{ $tahun->last()->tahun_ajaran }}</option>
                                                            <option value="Genap {{ $tahun->last()->tahun_ajaran }}">
                                                                Genap {{ $tahun->last()->tahun_ajaran }}</option>
                                                        </select>
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
                            <label class="col-sm-3 col-form-label">
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
                            <label class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <label class="btn col-sm-1 mb-1 photo-agama{{ $i }}"
                                            for="photoAgama{{ $i }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-agama{{ $i }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoAgama{{ $i }}"
                                            style="display: none;" name="photo_agama[]" multiple
                                            onchange="previewImageAgama({{ $i }})">
                                    @endfor
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
                            <label class="col-sm-3 col-form-label">
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
                            <label class="col-sm-3 col-form-label">Tambahkan
                                Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($iMotorik = 1; $iMotorik <= 4; $iMotorik++)
                                        <label class="btn col-sm-1 mb-1 photo-motorik{{ $iMotorik }}"
                                            for="photoMotorik{{ $iMotorik }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-motorik{{ $iMotorik }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoMotorik{{ $iMotorik }}"
                                            style="display: none;" name="photo_motorik[]" multiple
                                            onchange="previewImageMotorik({{ $iMotorik }})">
                                    @endfor
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
                            <label class="col-sm-3 col-form-label">
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
                            <label class="col-sm-3 col-form-label">Tambahkan
                                Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($iKognitif = 1; $iKognitif <= 4; $iKognitif++)
                                        <label class="btn col-sm-1 mb-1 photo-kognitif{{ $iKognitif }}"
                                            for="photoKognitif{{ $iKognitif }}">
                                            <i
                                                class="bi bi-plus-square fs-1 img-preview-kognitif{{ $iKognitif }}"></i>
                                        </label>
                                        <input class="form-control" type="file"
                                            id="photoKognitif{{ $iKognitif }}" style="display: none;"
                                            name="photo_kognitif[]" multiple
                                            onchange="previewImageKognitif({{ $iKognitif }})">
                                    @endfor
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
                            <label class="col-sm-3 col-form-label">
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
                            <label class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($iSosial = 1; $iSosial <= 4; $iSosial++)
                                        <label class="btn col-sm-1 mb-1 photo-sosial{{ $iSosial }}"
                                            for="photoSosial{{ $iSosial }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-sosial{{ $iSosial }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSosial{{ $iSosial }}"
                                            style="display: none;" name="photo_sosial[]" multiple
                                            onchange="previewImageSosial({{ $iSosial }})">
                                    @endfor
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
                            <label class="col-sm-3 col-form-label">
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
                            <label class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($iBahasa = 1; $iBahasa <= 4; $iBahasa++)
                                        <label class="btn col-sm-1 mb-1 photo-bahasa{{ $iBahasa }}"
                                            for="photoBahasa{{ $iBahasa }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-bahasa{{ $iBahasa }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoBahasa{{ $iBahasa }}"
                                            style="display: none;" name="photo_bahasa[]" multiple
                                            onchange="previewImageBahasa({{ $iBahasa }})">
                                    @endfor
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
                            <label class="col-sm-3 col-form-label">
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
                            <label class="col-sm-3 col-form-label">Tambahkan Foto/Video</label>
                            <div class="col-sm-9">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($iSeni = 1; $iSeni <= 4; $iSeni++)
                                        <label class="btn col-sm-1 mb-1 photo-seni{{ $iSeni }}"
                                            for="photoSeni{{ $iSeni }}">
                                            <i class="bi bi-plus-square fs-1 img-preview-seni{{ $iSeni }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photoSeni{{ $iSeni }}"
                                            style="display: none;" name="photo_seni[]" multiple
                                            onchange="previewImageSeni({{ $iSeni }})">
                                    @endfor
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
                        <label class="col-sm-3 col-form-label"></label>
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
            <!-- End Bordered Tabs -->


        </div>
    </div>
    @endif
    <div class="d-flex justify-content-end me-5 mb-2">
        <a href="/dashboard/learnings" class="btn btn-secondary">
            <i class="ri-arrow-go-back-line"></i>
            Kembali
        </a>
    </div>
    </div>
@endsection
