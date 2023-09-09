@extends('dashboard.layouts.main')

@push('css')
@endpush

@section('container')
    <!-- Left side columns -->
    @error('*')
        <div class="text-danger">{{ $message }}</div>
    @enderror
    <div class="col-md-12">
        @if ($jadwal->count())
            <div class="card info-card customers-card mb-3">
                <div class="card-body">
                    <h5 class="card-title mb-0 pb-0">Kegiatan Inti Kelompok <span>|
                            {{ $kelompok->nama_kelompok }}</span></h5>
                    <h5 class="card-title mt-0 pt-0">Minggu ini</h5>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-2 label">Guru Wali</div>
                            <div class="col-lg-10 text-secodary">
                                @if ($kelompok->guru_id != null)
                                    {{ $kelompok->guru->nama_guru }}
                                @else
                                    Guru Wali
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 label">Pendamping</div>
                            <div class="col-lg-10 text-secondary">
                                @if ($jadwal->count())
                                    @if ($jadwal->first()->guru_id != null)
                                        {{ $jadwal->first()->guru->nama_guru }}
                                    @else
                                        Guru Pendamping
                                    @endif
                                @else
                                    Belum ada guru pendamping
                                @endif
                            </div>
                        </div>
                        <div class="mt-3">
                            @if ($jadwal->first()->count())
                                <form action="/administrator/schedule/{{ $jadwal->first()->id }}" method="post"
                                    class="d-inline">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Are you sure?')">
                                        <i class="ri-delete-bin-5-line"></i> Hapus Jadwal
                                    </button>
                                </form>
                                <a href="/administrator/schedule/edit/{{ $jadwal->first()->id }}"
                                    class="btn btn-warning btn-sm"><i class="ri-edit-2-fill"></i> Ubah Jadwal</a>
                            @endif
                        </div>
                    </div>
                    <table class="table table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>Hari</th>
                                <th>Tema</th>
                                <th>Sub Tema</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>Sabtu</td>
                                <td>{{ $jadwal->first()->sabtu }}</td>
                                <td>{{ $jadwal->first()->sub_sabtu }}</td>
                                <td>{{ $jadwal->first()->ket_sabtu }}</td>
                            </tr>
                            <tr>
                                <td>Minggu</td>
                                <td>{{ $jadwal->first()->minggu }}</td>
                                <td>{{ $jadwal->first()->sub_minggu }}</td>
                                <td>{{ $jadwal->first()->ket_minggu }}</td>
                            </tr>
                            <tr>
                                <td>Senin</td>
                                <td>{{ $jadwal->first()->senin }}</td>
                                <td>{{ $jadwal->first()->sub_senin }}</td>
                                <td>{{ $jadwal->first()->ket_senin }}</td>
                            </tr>
                            <tr>
                                <td>Selasa</td>
                                <td>{{ $jadwal->first()->selasa }}</td>
                                <td>{{ $jadwal->first()->sub_selasa }}</td>
                                <td>{{ $jadwal->first()->ket_selasa }}</td>
                            </tr>
                            <tr>
                                <td>Rabu</td>
                                <td>{{ $jadwal->first()->rabu }}</td>
                                <td>{{ $jadwal->first()->sub_rabu }}</td>
                                <td>{{ $jadwal->first()->ket_rabu }}</td>
                            </tr>
                            <tr>
                                <td>Kamis</td>
                                <td>{{ $jadwal->first()->kamis }}</td>
                                <td>{{ $jadwal->first()->sub_kamis }}</td>
                                <td>{{ $jadwal->first()->ket_kamis }}</td>
                            </tr>

                            <tr class="table-danger">
                                <td>Jumat</td>
                                <td colspan="3" class="text-center">Libur</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>


            @foreach ($jadwal->skip(1) as $item2)
                <div class="card info-card customers-card mb-3">
                    <div class="card-body">
                        <h5 class="card-title mb-0 pb-0">Kegiatan Inti Kelompok <span>|
                                {{ $kelompok->nama_kelompok }}</span></h5>
                        <h5 class="card- mt-0 pt-0">Minggu lalu</h5>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-lg-2 label">Guru Wali</div>
                                <div class="col-lg-10 text-secodary">
                                    @if ($kelompok->guru_id != null)
                                        {{ $kelompok->guru->nama_guru }}
                                    @else
                                        Guru Wali
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-2 label">Pendamping</div>
                                <div class="col-lg-10 text-secondary">
                                    @if ($jadwal->count())
                                        @if ($item2->guru_id != null)
                                            {{ $item2->guru->nama_guru }}
                                        @else
                                            Guru Pendamping
                                        @endif
                                    @else
                                        Belum ada guru pendamping
                                    @endif
                                </div>
                            </div>
                            <div class="mt-3">
                                @if ($item2->count())
                                    <form action="/administrator/schedule/{{ $item2->id }}" method="post"
                                        class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">
                                            <i class="ri-delete-bin-5-line"></i> Hapus Jadwal
                                        </button>
                                    </form>
                                    <a href="/administrator/schedule/edit/{{ $item2->id }}"
                                        class="btn btn-warning btn-sm"><i class="ri-edit-2-fill"></i> Ubah</a>
                                @endif
                            </div>
                        </div>
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Hari</th>
                                    <th>Tema</th>
                                    <th>Sub Tema</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td>Sabtu</td>
                                    <td>{{ $item2->sabtu }}</td>
                                    <td>{{ $item2->sub_sabtu }}</td>
                                    <td>{{ $item2->ket_sabtu }}</td>
                                </tr>
                                <tr>
                                    <td>Minggu</td>
                                    <td>{{ $item2->minggu }}</td>
                                    <td>{{ $item2->sub_minggu }}</td>
                                    <td>{{ $item2->ket_minggu }}</td>
                                </tr>
                                <tr>
                                    <td>Senin</td>
                                    <td>{{ $item2->senin }}</td>
                                    <td>{{ $item2->sub_senin }}</td>
                                    <td>{{ $item2->ket_senin }}</td>
                                </tr>
                                <tr>
                                    <td>Selasa</td>
                                    <td>{{ $item2->selasa }}</td>
                                    <td>{{ $item2->sub_selasa }}</td>
                                    <td>{{ $item2->ket_selasa }}</td>
                                </tr>
                                <tr>
                                    <td>Rabu</td>
                                    <td>{{ $item2->rabu }}</td>
                                    <td>{{ $item2->sub_rabu }}</td>
                                    <td>{{ $item2->ket_rabu }}</td>
                                </tr>
                                <tr>
                                    <td>Kamis</td>
                                    <td>{{ $item2->kamis }}</td>
                                    <td>{{ $item2->sub_kamis }}</td>
                                    <td>{{ $item2->ket_kamis }}</td>
                                </tr>

                                <tr class="table-danger">
                                    <td>Jumat</td>
                                    <td colspan="3" class="text-center">Libur</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        @else
            <div class="card info-card customers-card mb-3">
                <div class="card-body">
                    <div class="alert alert-info alert-dismissible fade show text-center my-5" role="alert">
                        <i class="bi bi-info-circle me-1"></i>
                        <h4 class="alert-heading">Belum ada Jadwal untuk ditampilkan, silahkan tambahkan jadwal!</h4>
                    </div>
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-end me-5 mb-2">
            <a href="/administrator/schedule/create" class="btn btn-secondary">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
