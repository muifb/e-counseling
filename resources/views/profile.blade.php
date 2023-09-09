@extends('layouts.main')

@push('css')
    <style>
        .save-image {
            display: none;
        }
    </style>
@endpush

@push('js')
    <script>
        function previewImage() {
            const image = document.querySelector('#photo');
            const imgPreview = document.querySelector('.img-preview');
            const saveImage = document.querySelector('.save-image');
            const uploadImage = document.querySelector('.upload-image');

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

            // uploadImage.style.display = 'none';
            saveImage.style.display = 'inline';
        }
    </script>
@endpush

@section('sections')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol class="pb-1">
                <li><a href="/">Home</a></li>
                <li>Profile</li>
            </ol>
            <h2 class="mb-0">Profile</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('danger'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('danger') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @error('photo')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Ukuran Photo tidak boleh lebih dari 1 Mb
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                {{-- <div class="invalid-feedback"></div> --}}
            @enderror

            <div class="row gy-4">

                <div class="col-md-4 ">
                    <div class="portfolio-info rounded-4 d-flex flex-column align-items-center">
                        @if (auth()->user()->photo)
                            <div class="rounded-circle" style="max-height: 200px; overflow:hidden;">
                                <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile" width="200px"
                                    class="mb-3">
                            </div>
                        @else
                            <div class="rounded-circle" style="max-height: 200px; overflow:hidden;">
                                <img src="/img/profile.jpg" alt="Profile" width="200px" class="mb-3">
                            </div>
                        @endif
                        <form action="/wali-profile/upload/{{ auth()->user()->id }}" class="row g-3 needs-validation"
                            novalidate method="post" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="text-center pt-2">
                                <input type="hidden" name="oldImage" value="{{ auth()->user()->photo }}">
                                <label class="btn btn-success btn-sm upload-image" title="Upload new image" for="photo">
                                    <i class="bi bi-upload"></i>
                                </label>
                                <input type="file" id="photo" style="display:none;visibility:none;" name="photo"
                                    onchange="previewImage()">
                                <button type="submit" class="btn btn-primary btn-sm save-image">Save Change</button>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-md-8">
                    <div class="portfolio-info">
                        <h3>Profile information</h3>
                        <ul>
                            <li><strong>Nama</strong>: {{ $data->nama_ortu }}</li>
                            <li><strong>Wali dari ananda</strong>: {{ $data->nama }}</li>
                            <li><strong>Alamat</strong>: {{ $data->alamat }}</li>
                            <li><strong>Nomor Telphone</strong>: {{ $data->no_telp }}</li>
                            {{-- <li><strong>Project URL</strong>: <a href="#">www.example.com</a></li> --}}

                        </ul>
                    </div>
                    <div class="portfolio-description">
                        <div class="card p-3">
                            <h2>Change Password</h2>

                            <!-- Change Password Form -->
                            <form action="/wali-profile/{{ auth()->user()->id }}" class="row g-3 needs-validation my-2"
                                novalidate method="post">
                                @method('put')
                                @csrf

                                <div class="row mb-3">
                                    <label for="password" class="col-md-5 col-lg-4 col-form-label">Current
                                        Password</label>
                                    <div class="col-md-7 col-lg-8">
                                        <input name="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" id="password"
                                            required>
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="newPassword" class="col-md-5 col-lg-4 col-form-label">New Password</label>
                                    <div class="col-md-7 col-lg-8">
                                        <input name="newPassword" type="password"
                                            class="form-control @error('newPassword') is-invalid @enderror" id="newPassword"
                                            required value="{{ old('newPassword') }}">
                                        @error('newPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="renewPassword" class="col-md-5 col-lg-4 col-form-label">Re-enter New
                                        Password</label>
                                    <div class="col-md-7 col-lg-8">
                                        <input name="renewPassword" type="password"
                                            class="form-control @error('renewPassword') is-invalid @enderror"
                                            id="renewPassword" required>
                                        @error('renewPassword')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                </div>
                            </form>
                            <!-- End Change Password Form -->
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
@endsection
