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

        const stars = document.querySelectorAll(".stars i");
        const star1 = document.querySelector("#star1");
        const star2 = document.querySelector("#star2");
        const star3 = document.querySelector("#star3");
        const star4 = document.querySelector("#star4");
        const star5 = document.querySelector("#star5");
        const starRated = document.querySelector("#star_rated");

        stars.forEach((star, index1) => {
            star.addEventListener("click", () => {
                stars.forEach((star, index2) => {
                    index1 >= index2 ?
                        star.classList.add("active") :
                        star.classList.remove("active");
                });
            });
        });
        star1.addEventListener("click", () => {
            starRated.value = 1;
        });
        star2.addEventListener("click", () => {
            starRated.value = 2;
        });
        star3.addEventListener("click", () => {
            starRated.value = 3;
        });
        star4.addEventListener("click", () => {
            starRated.value = 4;
        });
        star5.addEventListener("click", () => {
            starRated.value = 5;
        });
    </script>
@endpush

@section('container')
    <div class="col-md">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" style="--bs-breadcrumb-divider: '>>';">

                    <li class="breadcrumb">
                        <span class="breadcrumb-item"><a href="/dashboard/learnings">Siswa</a></span>
                        <span class="breadcrumb-item active">Tambah Detail Perkembangan ({{ $data->nama }} -
                            {{ $data->no_induk }})</span>
                    </li>

                </ul>
                <div class="pt-3">

                    <div class="mb-4">
                        <div class="row g-0">
                            <div class="col-md-2 ms-3 mb-3 ps-3">
                                @if ($data->photo)
                                    <img src="{{ asset('storage/' . $data->photo) }}" alt="Profile" width="100"
                                        height="100" class="rounded-circle">
                                @else
                                    <img src="/img/profile.jpg" alt="Profile" width="100" height="100"
                                        class=" rounded-circle">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <div class="row align-items-center">
                                    <div class="card-body">
                                        <h5 class="card-title mb-0 pt-1 pb-2">{{ $data->nama }}</h5>
                                        <div class="breadcrumb m-0 p-0">
                                            <span class="breadcrumb-item">Nis : {{ $data->no_induk }}</span>
                                        </div>
                                        <div class="breadcrumb m-0 p-0">
                                            <span class="breadcrumb-item">Kelompok :
                                                {{ $data->kelompok->nama_kelompok }}</span>
                                        </div>
                                        <div class="breadcrumb m-0 p-0">
                                            <a class="breadcrumb-item" href="/dashboard/learnings/{{ $data->id }}">
                                                Lihat Details
                                                <i class="ri-arrow-right-double-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <form action="/dashboard/learnings" class="row g-3 needs-validation" novalidate method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-1">
                            <label for="inputTanggal" class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="siswa_id" value="{{ $data->id }}">
                                <input name="tanggal" class="flatpickr form-control input active"
                                    placeholder="Select Date.." tabindex="0" type="text" id="inputTanggal"
                                    readonly="readonly" required value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <p class="text-danger">Tanggal tidak boleh kosong!.</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="tema_id" class="col-sm-2 col-form-label">Tema</label>
                            <div class="col-sm-10">
                                <select name="tema_id" id="tema_id" class="form-select" required>
                                    @foreach ($tema as $item)
                                        @if (old('tema_id') == $item->id)
                                            <option value="{{ $item->id }}" selected>{{ $item->nama_tema }}
                                            </option>
                                        @else
                                            <option value="{{ $item->id }}">{{ $item->nama_tema }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('tema_id')
                                    <p class="text-danger">Tema tidak boleh kosong!.</p>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="keterangan" class="col-sm-2 col-form-label">Postingan</label>
                            <div class="col-sm-10">
                                <input id="keterangan" type="hidden" name="keterangan" value="{{ old('keterangan') }}">
                                <trix-editor input="keterangan"></trix-editor>
                                @error('keterangan')
                                    <p class="text-danger">
                                        Postingan harus diisi minimal 5 karakter!.
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="row my-2">
                            <label for="star_rated" class="col-sm-2 col-form-label">Bintang</label>
                            <div class="col-sm-10">
                                <input type="hidden" name="star_rated" id="star_rated">
                                <div class="stars ms-2">
                                    <i class="bx bxs-star" id="star1"></i>
                                    <i class="bx bxs-star" id="star2"></i>
                                    <i class="bx bxs-star" id="star3"></i>
                                    <i class="bx bxs-star" id="star4"></i>
                                    <i class="bx bxs-star" id="star5"></i>
                                </div>
                                @error('star_rated')
                                    <div class="text-danger">
                                        Bintang tidak boleh kosong
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="photo*" class="col-sm-2 col-form-label">Tambahkan Foto/Video</label>
                            <div class="col-sm-10">
                                <div class="row ps-3 rounded" id="imagePreview">
                                    @for ($i = 1; $i <= 4; $i++)
                                        <label class="btn col-sm-1 mb-1 photo{{ $i }}"
                                            for="photo{{ $i }}">
                                            <i class="bi bi-plus-square fs-1 img-preview{{ $i }}"></i>
                                        </label>
                                        <input class="form-control" type="file" id="photo{{ $i }}"
                                            style="display: none;" name="photo[]" multiple
                                            onchange="previewImage{{ $i }}()">
                                    @endfor
                                </div>
                                @error('photo*')
                                    <p class="text-danger">
                                        {{-- {{ $message }} --}}
                                        Foto harus berupa gambar (jpg, jpeg, png, gif, svg, atau webp)!. dan tidak boleh lebih
                                        dari 2MB
                                        <br>
                                        Video harus berupa mp4, mp4v, mpg4, avi, movie, mov!. dan tidak boleh lebih dari 2 MB
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="row my-3">
                            <div class="col-sm-2">&nbsp;</div>
                            <div class="col-sm-10">
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
        <div class="d-flex justify-content-end me-5 mb-2">
            <a href="/dashboard/learnings" class="btn btn-secondary">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
