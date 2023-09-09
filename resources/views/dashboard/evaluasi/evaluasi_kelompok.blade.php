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
                <h5 class="card-title pb-0">Kelompok Pembelajaran Tahun {{ $tahun->tahun_ajaran }}</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Kelompok</th>
                            <th>Jumlah Siswa</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelompok as $item)
                            <tr>
                                <td>{{ $item->nama_kelompok }}</td>
                                <td>{{ count($item->siswa) }} siswa</td>
                                <td>
                                    @if (!count($item->siswa))
                                        <a href="/dashboard/evaluasi-pembelajaran/kelompok/siswas/{{ $item->id }}"
                                            class="btn btn-primary btn-sm disabled">Detail</a>
                                    @else
                                        <a href="/dashboard/evaluasi-pembelajaran/kelompok/siswas/{{ $item->id }}"
                                            class="btn btn-primary btn-sm">Detail</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="/dashboard/evaluasi-pembelajaran" class="btn btn-secondary me-5 mb-2">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
