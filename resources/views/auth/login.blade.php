@extends('auth.layouts.main')

@push('css')
    <style>
        .logo img {
            max-height: 66px;
            margin-right: 6px;
        }
    </style>
@endpush

@section('containerSections')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    @if (session()->has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    @if (session()->has('failed'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle me-1"></i>
                            {{ session('failed') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="pt-3 pb-2">
                                <div class="d-flex justify-content-center">
                                    <a href="/" class="logo d-flex align-items-center w-auto">
                                        <img src="/img/logo.png" alt="">
                                    </a>
                                </div>
                                <h5 class="card-title text-center pb-0 fs-4">Login Sistem E-Counseling</h5>
                                <p class="text-center">Bimbingan dan Konseling Perkembangan Anak</p>
                            </div>

                            <form action="/login" class="row g-3 needs-validation p-2" novalidate method="post">
                                @csrf
                                <div class="col-12">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username"
                                        class="form-control @error('*') is-invalid @enderror" id="username" required
                                        autofocus value="{{ old('username') }}">
                                    <div class="invalid-feedback">
                                        @error('*')
                                            username atau password salah, <br>
                                        @enderror
                                        Silakan masukkan username Anda!.
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('*') is-invalid @enderror" id="password" required>
                                    <div class="invalid-feedback">Silakan masukkan password Anda!.</div>
                                </div>

                                <div class="col-12">
                                    <button class="col-lg-5 btn btn-primary w-100" type="submit">Login</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
