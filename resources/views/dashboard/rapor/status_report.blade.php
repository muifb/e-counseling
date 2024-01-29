@extends('dashboard.layouts.main')

@section('container')
    <div class="col-md">
        <div class="card">
            <div class="card-body pt-3">
                <ul class="nav nav-tabs nav-tabs-bordered" style="--bs-breadcrumb-divider: '>>';">

                    <li class="breadcrumb">
                        <span class="breadcrumb-item"><a href="/dashboard/learnings">Siswa</a></span>
                        <span class="breadcrumb-item active">Tambah Report ({{ $siswa->nama }} -
                            {{ $siswa->no_induk }})</span>
                    </li>

                </ul>
                <div class="tab-content pt-3">
                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                        <div class="row g-0">
                            <div class="col-md-2 ms-3 mb-3 ps-3">
                                @if ($siswa->photo)
                                    <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Profile" width="100"
                                        height="100" class="img-preview rounded-circle">
                                @else
                                    <img src="/img/profile.jpg" alt="Profile" width="100" height="100"
                                        class=" rounded-circle">
                                @endif
                            </div>
                            <div class="col-md">
                                <div class="row">
                                    <div class="breadcrumb my-0 py-0 ps-4">
                                        <h5 class="card-title mb-0 pt-1 pb-2">{{ $siswa->nama }}</h5>
                                    </div>
                                    <div class="col-md">
                                        <div class="row">
                                            <div class="card-body">
                                                <div class="row breadcrumb m-0 p-0">
                                                    <label for="no_induk" class="col-sm-4 col-form-label">Nomor
                                                        Induk</label>
                                                    <div class="col-sm">
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="no_induk" id="no_induk" value="{{ $siswa->no_induk }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                                <div class="row breadcrumb m-0 p-0">
                                                    <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal
                                                        Lahir</label>
                                                    <div class="col-sm">
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="tgl_lahir" id="tgl_lahir"
                                                            value="{{ \Carbon\Carbon::parse($siswa->tgl_lahir)->translatedFormat('j F, Y') }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md">
                                        <div class="row align-items-center">
                                            <div class="card-body">
                                                <div class="row breadcrumb m-0 p-0">
                                                    <label for="kelompok" class="col-sm-4 col-form-label">Kelompok</label>
                                                    <div class="col-sm">
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="kelompok" id="kelompok"
                                                            value="{{ $siswa->kelompok->nama_kelompok }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="row breadcrumb m-0 p-0">
                                                    <label for="semester" class="col-sm-4 col-form-label">Semester</label>
                                                    <div class="col-sm">
                                                        <input class="form-control form-control-sm" type="text"
                                                            name="semester" id="semester" value="{{ $semester->semester }}"
                                                            disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        @if ($status == 'menunggu')
                            <div class="alert alert-info alert-dismissible fade show my-3 text-center" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                                <h4 class="alert-heading">Pemberitahuan</h4>
                                <p class="fs-6 mb-1">Rapor Semester <strong>{{ $semester->semester }}</strong> Menunggu
                                    persetujuan <strong>Kepala Sekolah!</strong>.
                                </p>
                                <span>Silahkan kembali lagi setelah disetujui.</span>
                                <hr>
                                <a href="/dashboard/learnings/report/edit/{{ $report->id }}"
                                    class="btn badge bg-warning p-2">
                                    Ubah Rapor
                                </a>
                                <a href="/dashboard/learnings" class="btn badge bg-secondary p-2">kembali</a>
                            </div>
                        @elseif($status == 'ditolak')
                            <div class="alert alert-danger alert-dismissible fade show my-3 text-center" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                                <h4 class="alert-heading">Rapor Ditolak</h4>
                                <h5 class="alert-heading fs-6">Saran kepala sekolah : {{ $report->saran }}</h5>
                                <hr>
                                <a href="/dashboard/learnings/report/edit/{{ $report->id }}"
                                    class="btn badge bg-warning p-2">Perbaiki Rapor</a>
                                <a href="/dashboard/learnings" class="btn badge bg-secondary p-2">kembali</a>
                            </div>
                        @elseif($status == 'diterima')
                            <div class="alert alert-info alert-dismissible fade show my-3 text-center" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                                <h4 class="alert-heading">Pemberitahuan</h4>
                                <p class="fs-6 mb-1">Rapor Semester <strong>{{ $semester->semester }}</strong>
                                    sudah ditambahkan.
                                </p>
                                <span>Silahkan kembali lagi semester depan.</span>
                                <hr>
                                <a href="/dashboard/learnings" class="btn badge bg-secondary p-2">kembali</a>
                            </div>
                        @elseif($status == 'info')
                            <div class="alert alert-info alert-dismissible fade show my-3 text-center" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                                <h4 class="alert-heading">Pemberitahuan</h4>
                                <p class="fs-6 mb-1">Belum ada tema pada semester
                                    <strong>{{ $semester->semester }}</strong>.
                                </p>
                                <span>Tidak dapat kirim rapor.</span>
                                <hr>
                                <a href="/dashboard/learnings" class="btn badge bg-secondary p-2">kembali</a>
                            </div>
                        @elseif($status == 'peringatan')
                            <div class="alert alert-info alert-dismissible fade show my-3 text-center" role="alert">
                                <h4 class="alert-heading"><i class="bi bi-info-circle me-1"></i></h4>
                                <h4 class="alert-heading">Pemberitahuan</h4>
                                <p class="fs-6 mb-1">Tema <strong>{{ $tema }}</strong> Belum Memenuhi Pertemuan
                                    atau kurang dari 3 pertemuan.
                                </p>
                                <span>Tidak dapat kirim rapor, silahkan penuhi minimal 3 kali pertemuan.!</span>
                                <hr>
                                <a href="/dashboard/learnings" class="btn badge bg-secondary p-2">kembali</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
