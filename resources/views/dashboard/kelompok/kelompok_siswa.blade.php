@extends('dashboard.layouts.main')

@push('css')
    {{--  --}}
@endpush

@section('container')
    <div class="col-md-12">
        @error('siswa_id*')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-x-circle"></i>
                Gagal masukkan siswa, silahkan pilih siswa yang ada didaftar!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="card">
            <div class="card-body">
                <h5 class="card-title my-0 py-2">Kelompok Siswa</h5>

                <div class="row">
                    <div class="col-md-2 label">Kelompok</div>
                    <div class="col-md-10 text-secodary">: {{ $kelompok->nama_kelompok }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2 label">Tahun Ajaran</div>
                    <div class="col-md-10 text-secodary">: {{ $kelompok->tahun->tahun_ajaran }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2 label">Guru Wali</div>
                    <div class="col-md-10 text-secodary">: {{ $kelompok->guru->nama_guru }}</div>
                </div>
                <div class="row">
                    <div class="col-md-2 label">Jumlah Siswa</div>
                    <div class="col-md-10 text-secodary">: {{ $siswa->count() }} Murid</div>
                </div>
                @can('akses', 'tu')
                    <a class="btn btn-success mt-3" data-bs-toggle="modal" data-bs-target="#siswa-kelompok">
                        Masukkan Siswa
                    </a>
                    {{-- <form action="/administrator/kelompok/siswas/hapus/{{ $kelompok->id }}" class="d-inline" method="POST">
                    @method('put')
                    @csrf
                    <button type="submit" class="btn btn-danger mt-3"
                        onclick="return confirm('Are you sure?')">Hapus Daftar Siswa
                    </button>
                </form> --}}
                @endcan
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nis</th>
                            <th scope="col">Tahun Masuk</th>
                            @can('akses', 'tu')
                                <th scope="col">Aksi</th>
                            @endcan
                        </tr>
                    </thead>
                    <tbody>
                        @if ($siswa->count())
                            @foreach ($siswa as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->no_induk }}</td>
                                    <td>{{ $item->tahun->tahun_ajaran }}</td>
                                    @can('akses', 'tu')
                                        <td>
                                            <form action="/administrator/kelompok/siswa/hapus/{{ $item->id }}"
                                                class="d-inline" method="POST">
                                                @method('put')
                                                @csrf
                                                <input type="hidden" name="password" value="password">
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure?')">
                                                    <i class="ri-close-circle-line"></i>
                                                </button>
                                            </form>
                                        </td>
                                    @endcan
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" class="text-center fw-medium fst-italic text-secondary">
                                    Belum ada siswa dalam kelompok
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <!-- Modal -->
                <div class="modal fade" id="siswa-kelompok" tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Masukkan Siswa ke-Kelompok | {{ $kelompok->nama_kelompok }}</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="/administrator/kelompok/siswa" class="row g-3 needs-validation" novalidate
                                    method="post">
                                    @csrf
                                    <div class="col-md-12">
                                        <input type="hidden" name="kelompok_id" value="{{ $kelompok->id }}">
                                        @foreach ($masuk->groupBy('tahun_id') as $itm)
                                            @foreach ($itm as $isi)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="siswa_id[]"
                                                        value="{{ $isi->id }}" id="siswaKelompok">
                                                    <label class="form-check-label" for="siswaKelompok">
                                                        {{ $isi->no_induk }} - {{ $isi->nama }} -
                                                        {{ $isi->tahun->tahun_ajaran }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        @endforeach
                                    </div>
                                    <div class="text-end">
                                        <button class="btn btn-{{ $masuk->count() == null ? 'secondary' : 'primary' }}"
                                            {{ $masuk->count() == null ? 'disabled' : '' }}
                                            type="submit">Masukkan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Modal-->
            </div>
        </div>
        <div class="d-flex justify-content-end me-5 mb-2">
            @can('akses', 'tu')
                <a href="/administrator/kelompok" class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line"></i>
                    Kembali
                </a>
            @elsecan('akses', 'kepsek')
                <a href="/dashboard" class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line"></i>
                    Kembali
                </a>
            @elsecan('akses', 'guru')
                <a href="/dashboard" class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line"></i>
                    Kembali
                </a>
            @endcan
        </div>
    </div>
@endsection
