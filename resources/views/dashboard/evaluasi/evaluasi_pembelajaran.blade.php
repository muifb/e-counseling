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
                <h5 class="card-title pb-0">Evaluasi Pembelajaran</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Angkatan</th>
                            <th>Jumlah Kelompok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tahun as $item)
                            <tr>
                                <td>{{ $item->tahun_ajaran }}</td>
                                <td>{{ count($item->kelompok) }} Kelompok</td>
                                <td>
                                    @if (!count($item->kelompok))
                                        <a href="/dashboard/evaluasi-pembelajaran/kelompok/{{ $item->id }}" type="button"
                                            class="btn btn-primary btn-sm disabled" disabled>Detail</a>
                                    @else
                                        <a href="/dashboard/evaluasi-pembelajaran/kelompok/{{ $item->id }}" type="button"
                                            class="btn btn-primary btn-sm" disabled>Detail</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
