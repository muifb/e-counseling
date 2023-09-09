@extends('dashboard.layouts.main')

{{-- @push('css')
    <style>
        .btn-sm {
            --bs-btn-padding-y: 0.05rem;
        }
    </style>
@endpush --}}

@section('container')
    <div class="col-md">
        <div class="row">

            <!-- List group with Advanced Contents -->
            {{-- @foreach ($reports as $kel)
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="list-group">
                                <h5 class="card-title">Permintaan Rapor Kelompok {{ $kel->nama_kelompok }}</h5>
                                @if ($kel->report->count())
                                    <form action="/dashboard/learnings/accept" class="d-inline needs-validation" novalidate
                                        method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-8 d-flex justify-content-start mb-3">
                                                <span class="fs-6 fw-bolder me-3">
                                                    {{ count($kel->report) }} dari {{ count($kel->Siswa) }} Siswa
                                                </span>
                                            </div>
                                            @if (count($kel->report) === count($kel->Siswa))
                                                <div class="col-md-4 d-flex justify-content-end mb-3">
                                                    <button type="submit" class="btn btn-primary btn-sm" php>Accept
                                                        All</button>
                                                </div>
                                            @else
                                                <div class="col-md-4 d-flex justify-content-end mb-3">
                                                    <button class="btn btn-primary btn-sm" disabled>Accept
                                                        All</button>
                                                </div>
                                            @endif
                                        </div>
                                        @foreach ($kel->report as $itm)
                                            <input type="hidden" name="id[]" value="{{ $itm->id }}">
                                            <a href="#" class="list-group-item list-group-item-action"
                                                aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <span class="mb-1">{{ ucwords(strtolower($itm->siswa->nama)) }}
                                                    </span>
                                                    <small
                                                        class="text-secondary">{{ $itm->created_at->diffForHumans() }}</small>
                                                </div>
                                            </a>
                                        @endforeach
                                    </form>
                                @else
                                    <p class="card-text text-muted">Tidak ada permintaan rapor!</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach --}}
            <!-- End List group Advanced Content -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title pb-1">Permintaan Rapor</h5>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Kelompok</th>
                                    <th>Guru Wali</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $kel)
                                    <tr>
                                        <td>Kelompok | {{ $kel->nama_kelompok }}</td>
                                        <td>{{ ucwords(strtolower($kel->guru->nama_guru)) }}</td>
                                        <td>{{ count($kel->report) }} dari {{ count($kel->Siswa) }}</td>
                                        <td>
                                            <a href="/dashboard/request-reports/detail-reports/{{ $kel->id }}"
                                                class="btn btn-indigo btn-sm">Proses</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
