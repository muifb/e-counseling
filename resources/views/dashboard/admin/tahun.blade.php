@extends('dashboard.layouts.main')

@section('container')
    <div class="col-md-7">
        <div class="card">

            <div class="card-body">
                <h5 class="card-title">Add Tahun Ajaran</h5>
                @error('tahun_ajaran')
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-octagon me-1"></i>
                        Tahun Ajaran {{ old('tahun_ajaran') }} sudah ada didaftar!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @enderror
                <form action="/administrator/tahun-ajaran" class="row g-3 needs-validation" novalidate method="post">
                    @csrf
                    <div class="col-md-12">
                        <div class="row">
                            <label for="inputTahun" class="col-sm-4 col-form-label">
                                Tahun Ajaran</label>
                            <div class="col-sm-4">
                                <input type="text" name="tahun_satu"
                                    class="form-control @error('tahun_satu') is-invalid @enderror" id="inputTahun"
                                    placeholder="2021" required value="{{ old('tahun_satu') }}">
                            </div>
                            @error('tahun_satu')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="col-sm-4">
                                <input type="text" name="tahun_dua"
                                    class="form-control @error('tahun_dua') is-invalid @enderror" id="inputTahun"
                                    placeholder="2022" required value="{{ old('tahun_dua') }}">
                            </div>
                            @error('tahun_dua')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="text-end">
                        <button class="btn btn-primary" type="submit">Add Tahun Ajaran</button>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <div class="col-md-5">
        <div class="card">


            <div class="card-body">
                <h5 class="card-title">Tahun Ajaran</h5>

                <table class="table datatable-tema">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tahun Ajaran</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tahun as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->tahun_ajaran }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
