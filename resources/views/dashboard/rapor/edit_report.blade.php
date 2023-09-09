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
                        <span class="breadcrumb-item active">Ubah Rapor ({{ $report->siswa->nama }} -
                            {{ $report->siswa->no_induk }})</span>
                    </li>

                </ul>
                <div class="tab-content pt-3">
                    <form action="/dashboard/learnings/report/{{ $report->id }}" class="row g-3 needs-validation"
                        novalidate method="post" enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="tab-pane fade show active profile-overview mb-4" id="profile-overview">
                            <div class="row g-0">
                                <div class="col-md-2 ms-3 mb-3 ps-3">
                                    @if ($report->siswa->photo)
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
                                            <h5 class="card-title mb-0 pt-1 pb-2">{{ $report->siswa->nama }}</h5>
                                        </div>
                                        <div class="col-md">
                                            <div class="row">
                                                <div class="card-body">
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label class="col-sm-4 col-form-label">Nomor
                                                            Induk</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="no_induk" value="{{ $report->siswa->no_induk }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label class="col-sm-4 col-form-label">Tanggal
                                                            Lahir</label>
                                                        <div class="col-sm">
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="tgl_lahir"
                                                                value="{{ \Carbon\Carbon::parse($report->siswa->tgl_lahir)->translatedFormat('j F, Y') }}"
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
                                                            {{-- <input type="hidden" name="kelompok_id" value=""> --}}
                                                            <input class="form-control form-control-sm" type="text"
                                                                name="kelompok"
                                                                value="{{ $report->siswa->kelompok->nama_kelompok }}"
                                                                disabled>
                                                        </div>
                                                    </div>
                                                    <div class="row breadcrumb m-0 p-0">
                                                        <label for="semester"
                                                            class="col-sm-4 col-form-label">Semester</label>
                                                        <div class="col-sm">
                                                            <select name="semester" id="semester"
                                                                class="form-select @error('semester') is-invalid @enderror">
                                                                @if (old('semester', $report->semester))
                                                                    <option value="{{ old('semester', $report->semester) }}"
                                                                        selected>
                                                                        {{ old('semester', $report->semester) }}
                                                                    </option>
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
                                    </div>
                                </div>
                            </div>

                        </div>
                        @php
                            $imageAgama = [];
                            $videoAgama = [];
                            $imageMotorik = [];
                            $videoMotorik = [];
                            $imageKognitif = [];
                            $videoKognitif = [];
                            $imageSosial = [];
                            $videoSosial = [];
                            $imageBahasa = [];
                            $videoBahasa = [];
                            $imageSeni = [];
                            $videoSeni = [];
                            foreach ($report->detailReport as $files) {
                                if (substr($files->file_fotovideo, 14, 15) == 'video/nilai-aga') {
                                    $videoAgama[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'image/nilai-aga') {
                                    $imageAgama[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'video/nilai-mot') {
                                    $videoMotorik[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'image/nilai-mot') {
                                    $imageMotorik[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'video/nilai-kog') {
                                    $videoKognitif[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'image/nilai-kog') {
                                    $imageKognitif[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'video/nilai-sos') {
                                    $videoSosial[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'image/nilai-sos') {
                                    $imageSosial[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'video/nilai-bah') {
                                    $videoBahasa[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'image/nilai-bah') {
                                    $imageBahasa[] = $files->file_fotovideo;
                                } elseif (substr($files->file_fotovideo, 14, 15) == 'video/nilai-sen') {
                                    $videoSeni[] = $files->file_fotovideo;
                                } else {
                                    $imageSeni[] = $files->file_fotovideo;
                                }
                            }
                        @endphp
                        <div class="mb-2">
                            <div class="row mb-1">
                                <label class="col-sm-3 col-form-label">
                                    <span>Perkembangan Nilai</span><br>
                                    <span>Agama dan Moral</span>
                                </label>
                                <div class="col-sm-9">
                                    <input name="siswa_id" type="hidden" value="{{ old('siswa_id', $report->siswa_id) }}">
                                    <input id="nilai_agama" type="hidden" name="nilai_agama"
                                        value="{{ old('nilai_agama', $report->nilai_agama) }}">
                                    <trix-editor input="nilai_agama">

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
                                        @if (count($videoAgama) || count($imageAgama))
                                            @if (count($videoAgama))
                                                @foreach ($videoAgama as $files)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="ratio ratio-16x9">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset('storage/' . $files) }}"
                                                                    type="video/mp4" />
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (count($imageAgama))
                                                @foreach ($imageAgama as $file)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $file) }}" alt="Profile"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        @php
                                            $jumlahFiles = 4;
                                            $jmlData = count($videoAgama) + count($imageAgama);
                                            $jmlInput = $jumlahFiles - $jmlData;
                                        @endphp
                                        {{-- {{ $jmlInput }} --}}
                                        @for ($i = 1; $i <= $jmlInput; $i++)
                                            {{-- {{ $i }} --}}
                                            <label class="btn col-sm-1 mb-1 photo-agama{{ $i }}"
                                                for="photoAgama{{ $i }}">
                                                <i
                                                    class="bi bi-plus-square fs-1 img-preview-agama{{ $i }}"></i>
                                            </label>
                                            <input class="form-control" type="file"
                                                id="photoAgama{{ $i }}" style="display: none;"
                                                name="photo_agama[]" multiple
                                                onchange="previewImageAgama{{ $i }}()">
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
                                        value="{{ old('motorik', $report->motorik) }}">
                                    <trix-editor input="motorik">

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
                                        @if (count($videoMotorik) || count($imageMotorik))
                                            @if (count($videoMotorik))
                                                @foreach ($videoMotorik as $files)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="ratio ratio-16x9">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset('storage/' . $files) }}"
                                                                    type="video/mp4" />
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (count($imageMotorik))
                                                @foreach ($imageMotorik as $files)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $files) }}" alt="Profile"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        @php
                                            $jumlahFlMotorik = 4;
                                            $jmlDtMotorik = count($videoMotorik) + count($imageMotorik);
                                            $jmlInpMotorik = $jumlahFlMotorik - $jmlDtMotorik;
                                        @endphp
                                        @for ($iMotorik = 1; $iMotorik <= $jmlInpMotorik; $iMotorik++)
                                            <label class="btn col-sm-1 mb-1 photo-motorik{{ $iMotorik }}"
                                                for="photoMotorik{{ $iMotorik }}">
                                                <i
                                                    class="bi bi-plus-square fs-1 img-preview-motorik{{ $iMotorik }}"></i>
                                            </label>
                                            <input class="form-control" type="file"
                                                id="photoMotorik{{ $iMotorik }}" style="display: none;"
                                                name="photo_motorik[]" multiple
                                                onchange="previewImageMotorik{{ $iMotorik }}()">
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
                                    <input id="kognitif" type="hidden" name="kognitif"
                                        value="{{ old('kognitif', $report->kognitif) }}">
                                    <trix-editor input="kognitif">

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
                                        @if (count($videoKognitif) || count($imageKognitif))
                                            @if (count($videoKognitif))
                                                @foreach ($videoKognitif as $files)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="ratio ratio-16x9">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset('storage/' . $files) }}"
                                                                    type="video/mp4" />
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (count($imageKognitif))
                                                @foreach ($imageKognitif as $item)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $item) }}" alt="Profile"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        @php
                                            $jumlahFlKognitif = 4;
                                            $jmlDtKognitif = count($videoKognitif) + count($imageKognitif);
                                            $jmlInpKognitif = $jumlahFlKognitif - $jmlDtKognitif;
                                        @endphp
                                        @for ($iKognitif = 1; $iKognitif <= $jmlInpKognitif; $iKognitif++)
                                            <label class="btn col-sm-1 mb-1 photo-kognitif{{ $iKognitif }}"
                                                for="photoKognitif{{ $iKognitif }}">
                                                <i
                                                    class="bi bi-plus-square fs-1 img-preview-kognitif{{ $iKognitif }}"></i>
                                            </label>
                                            <input class="form-control" type="file"
                                                id="photoKognitif{{ $iKognitif }}" style="display: none;"
                                                name="photo_kognitif[]" multiple
                                                onchange="previewImageKognitif{{ $iKognitif }}()">
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
                                    <input id="sosial" type="hidden" name="sosial"
                                        value="{{ old('sosial', $report->sosial) }}">
                                    <trix-editor input="sosial">

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
                                        @if (count($videoSosial) || count($imageSosial))
                                            @if (count($videoSosial))
                                                @foreach ($videoSosial as $files)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="ratio ratio-16x9">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset('storage/' . $files) }}"
                                                                    type="video/mp4" />
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (count($imageSosial))
                                                @foreach ($imageSosial as $item)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $item) }}" alt="Profile"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        @php
                                            $jumlahFlSosial = 4;
                                            $jmlDtSosial = count($videoSosial) + count($imageSosial);
                                            $jmlInpSosial = $jumlahFlSosial - $jmlDtSosial;
                                        @endphp
                                        @for ($iSosial = 1; $iSosial <= $jmlInpSosial; $iSosial++)
                                            <label class="btn col-sm-1 mb-1 photo-sosial{{ $iSosial }}"
                                                for="photoSosial{{ $iSosial }}">
                                                <i
                                                    class="bi bi-plus-square fs-1 img-preview-sosial{{ $iSosial }}"></i>
                                            </label>
                                            <input class="form-control" type="file"
                                                id="photoSosial{{ $iSosial }}" style="display: none;"
                                                name="photo_sosial[]" multiple
                                                onchange="previewImageSosial{{ $iSosial }}()">
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
                                    <input id="bahasa" type="hidden" name="bahasa"
                                        value="{{ old('bahasa', $report->bahasa) }}">
                                    <trix-editor input="bahasa">

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
                                        @if (count($videoBahasa) || count($imageBahasa))
                                            @if (count($videoBahasa))
                                                @foreach ($videoBahasa as $files)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="ratio ratio-16x9">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset('storage/' . $files) }}"
                                                                    type="video/mp4" />
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (count($imageBahasa))
                                                @foreach ($imageBahasa as $item)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2 portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $item) }}" alt="Profile"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        @php
                                            $jumlahFlBahasa = 4;
                                            $jmlDtBahasa = count($videoBahasa) + count($imageBahasa);
                                            $jmlInpBahasa = $jumlahFlBahasa - $jmlDtBahasa;
                                        @endphp
                                        @for ($iBahasa = 1; $iBahasa <= $jmlInpBahasa; $iBahasa++)
                                            <label class="btn col-sm-1 mb-1 photo-bahasa{{ $iBahasa }}"
                                                for="photoBahasa{{ $iBahasa }}">
                                                <i
                                                    class="bi bi-plus-square fs-1 img-preview-bahasa{{ $iBahasa }}"></i>
                                            </label>
                                            <input class="form-control" type="file"
                                                id="photoBahasa{{ $iBahasa }}" style="display: none;"
                                                name="photo_bahasa[]" multiple
                                                onchange="previewImageBahasa{{ $iBahasa }}()">
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
                                    <input id="seni" type="hidden" name="seni"
                                        value="{{ old('seni', $report->seni) }}">
                                    <trix-editor input="seni">

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
                                        @if (count($videoSeni) || count($imageSeni))
                                            @if (count($videoSeni))
                                                @foreach ($videoSeni as $files)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2">
                                                        <div class="ratio ratio-16x9">
                                                            <video class="img-fluid" controls>
                                                                <source src="{{ asset('storage/' . $files) }}"
                                                                    type="video/mp4" />
                                                            </video>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @if (count($imageSeni))
                                                @foreach ($imageSeni as $item)
                                                    <div class="ms-1 mb-1 col-md-3 border rounded p-2  portfolio-item">
                                                        <div class="portfolio-img">
                                                            <img src="{{ asset('storage/' . $item) }}" alt="Profile"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endif
                                        @php
                                            $jumlahFlSeni = 4;
                                            $jmlDtSeni = count($videoSeni) + count($imageSeni);
                                            $jmlInpSeni = $jumlahFlSeni - $jmlDtSeni;
                                        @endphp
                                        @for ($iSeni = 1; $iSeni <= $jmlInpSeni; $iSeni++)
                                            <label class="btn col-sm-1 mb-1 photo-seni{{ $iSeni }}"
                                                for="photoSeni{{ $iSeni }}">
                                                <i class="bi bi-plus-square fs-1 img-preview-seni{{ $iSeni }}"></i>
                                            </label>
                                            <input class="form-control" type="file" id="photoSeni{{ $iSeni }}"
                                                style="display: none;" name="photo_seni[]" multiple
                                                onchange="previewImageSeni{{ $iSeni }}()">
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
                            <label class="col-sm-3 col-form-label">&nbsp;</label>
                            <div class="col-sm-9">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ri-checkbox-circle-fill"></i> Ubah
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
