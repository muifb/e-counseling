@extends('dashboard.layouts.main')

@push('css')
    <style>
        .btn-sm {
            --bs-btn-padding-y: 0.05rem;
        }
    </style>
@endpush

@section('container')
    <!-- Left side columns -->
    @error('*')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <!-- End Left side columns -->
    @if ($keljadwal->count())
        <div class="col-md-12">
            <div class="card">

                <div class="card-body">
                    <h5 class="card-title">Jadwal Kelompok</h5>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nama Kelompok</th>
                                <th>Guru Wali</th>
                                <th>Guru Pendamping</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($keljadwal as $kel)
                                @php
                                    $jadwal = $data->where('kelompok_id', $kel->id);
                                @endphp
                                <tr>
                                    <td>Kelompok | {{ $kel->nama_kelompok }}</td>
                                    <td>
                                        @if ($kel->guru_id != null)
                                            {{ ucwords(strtolower($kel->guru->nama_guru)) }}
                                        @else
                                            Guru Wali
                                        @endif
                                    </td>
                                    <td>
                                        @if ($jadwal->count())
                                            @if ($jadwal->first()->guru_id != null)
                                                {{ ucwords(strtolower($jadwal->first()->guru->nama_guru)) }}
                                            @else
                                                Guru Pendamping
                                            @endif
                                        @else
                                            Belum ada guru pendamping
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn btn-success btn-sm"
                                            href="/administrator/schedule/create-jadwal/{{ $kel->id }}">
                                            Tambah Jadwal <i class="ri-add-box-fill"></i>
                                        </a>
                                        <a href="/administrator/schedule/{{ $kel->id }}" class="btn btn-info btn-sm">
                                            Lihat <i class="ri-eye-fill"></i>
                                        </a>
                                        <a href="/dashboard/schedule/send/{{ $kel->id }}"
                                            class="btn btn-warning btn-sm">Kirim <i class="ri-send-plane-2-fill"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif
@endsection
