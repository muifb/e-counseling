@extends('dashboard.layouts.main')

@push('css')
    <style>
        .table> :not(caption)>*>* {
            padding: .4rem .4rem
        }
    </style>
@endpush

@section('container')
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title pb-0">Kelompok Pembelajaran {{ $kelompok->nama_kelompok }}</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Nis</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $item)
                            <tr>
                                <td>{{ ucwords(strtolower($item->nama)) }}</td>
                                <td>{{ $item->no_induk }}</td>
                                <td>
                                    <a href="/dashboard/learnings/{{ $item->id }}" class="btn btn-info btn-sm">
                                        <i class="ri-eye-line"></i> Konseling</a>
                                    <a href="/dashboard/learnings/see-report/{{ $item->id }}"
                                        class="btn btn-orange btn-sm">
                                        <i class="ri-eye-line"></i> Lihat Rapor</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/dashboard/evaluasi-pembelajaran/kelompok/{{ $kelompok->tahun_id }}"
                class="btn btn-secondary me-5 mb-2">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
