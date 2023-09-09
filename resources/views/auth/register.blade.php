@extends('auth.layouts.main')

@section('containerSections')
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="card mb-3">

                        <div class="card-body">

                            <div class="pt-3 pb-2">
                                <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                <p class="text-center small">Enter your personal details to create account</p>
                            </div>


                            <form action="/register" class="row g-3 needs-validation" novalidate method="post">
                                @csrf
                                <div class="col-md-12">
                                    <input type="text" name="nama"
                                        class="form-control @error('nama') is-invalid @enderror" id="nama"
                                        placeholder="Full Name" required value="{{ old('nama') }}">
                                    <div class="invalid-feedback">Please, enter your name!</div>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12">
                                    <input type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        placeholder="Email" required value="{{ old('email') }}">
                                    <div class="invalid-feedback">Please, enter your invalid email!</div>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="username"
                                        class="form-control @error('username') is-invalid @enderror" id="username"
                                        placeholder="Username" required value="{{ old('username') }}">
                                    <div class="invalid-feedback">Please, enter username!</div>
                                    @error('username')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password"
                                        placeholder="Password" required value="{{ old('password') }}">
                                    <div class="invalid-feedback">Please, enter password!</div>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" name="alamat"
                                        class="form-control @error('alamat') is-invalid @enderror" id="alamat"
                                        placeholder="Address" required value="{{ old('alamat') }}">
                                    <div class="invalid-feedback">Please, enter your alamat!</div>
                                    @error('alamat')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <input type="text" name="telp"
                                        class="form-control @error('telp') is-invalid @enderror" id="telp"
                                        placeholder="No. Telphone" required value="{{ old('telp') }}">
                                    <div class="invalid-feedback">Please, enter No. Telphone!</div>
                                    @error('telp')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">Register</button>
                                </div>
                                <div class="col-12">
                                    <p class="small mb-0 text-center small">Already have an account? <a href="/login">Log
                                            in</a></p>
                                </div>
                                <div class="col-12 justify-content-center">
                                    <p class="small mb-0 text-center small">or <br><a href="/">Not Now</a></p>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
