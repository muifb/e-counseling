@extends('dashboard.layouts.main')

{{-- @push('css')
    <style>
        .btn-sm {
            --bs-btn-padding-y: 0.05rem;
        }
    </style>
@endpush --}}

@section('container')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pb-1">Permintaan Rapor Kelompok | <span>{{ $kelompok->nama_kelompok }}</span></h5>
                @if ($kelompok->report->count())
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nis</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kelompok->report as $rapor)
                                <tr>
                                    <th>{{ $loop->iteration }}</th>
                                    <td>{{ $rapor->siswa->no_induk }}</td>
                                    <td>{{ ucwords(strtolower($rapor->siswa->nama)) }}</td>
                                    <td>
                                        <a href="/dashboard/request-reports/detail-report/{{ $rapor->id }}"
                                            class="btn btn-indigo btn-sm">Detail</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="row">
                        <form action="/dashboard/learnings/accept-all" class="d-inline needs-validation" novalidate
                            method="post">
                            @csrf

                            @foreach ($kelompok->report as $itm)
                                <input type="hidden" name="id[]" value="{{ $itm->id }}">
                            @endforeach
                            @if (count($kelompok->report) === count($kelompok->siswa))
                                <div class="d-flex justify-content-end mb-3">
                                    <button type="submit" class="btn btn-primary btn-sm" php>Accept
                                        All</button>
                                </div>
                            @else
                                <div class="d-flex justify-content-end mb-3">
                                    <button class="btn btn-primary btn-sm" disabled>Accept
                                        All</button>
                                </div>
                            @endif
                        </form>
                    </div>
                @else
                    <div class="alert alert-info alert-dismissible fade show text-center m-3" role="alert">
                        <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                        <h4 class="alert-heading">Belum ada Permintaan Rapor!.</h4>
                    </div>
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/dashboard/request-reports" class="btn btn-secondary me-5 mb-2">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
