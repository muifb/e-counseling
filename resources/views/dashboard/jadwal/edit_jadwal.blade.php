@extends('dashboard.layouts.main')

@push('css')
    {{--  --}}
@endpush

@section('container')
    <!-- Left side columns -->
    <div class="col-md-12">
        @error('*')
            <div class="alert alert-danger alert-dismissible fade show my-1" role="alert">
                <i class="bi bi-x-circle"></i>
                {{ $message }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @enderror
        <div class="card info-card customers-card">
            <div class="card-body">
                <h5 class="card-title mb-0 pb-0">Form Ubah Jadwal</h5>
                <h5 class="card-title mb-1 pb-1">Kelompok <span>| {{ $jadwal->kelompok->nama_kelompok }}</span></h5>
                <form action="/administrator/schedule/{{ $jadwal->id }}" class="row g-3 needs-validation" novalidate
                    method="post">
                    @method('put')
                    @csrf
                    <div class="mb-3">
                        <div class="row mb-3">
                            <div class="col-lg-2 label fs-6 mb-2">Guru Wali</div>
                            <div class="col-lg-10 fs-6 text-secodary mb-2">
                                {{ ucwords(strtolower($jadwal->kelompok->guru->nama_guru)) }}
                            </div>
                            <div class="col-lg-2 label fs-6">Guru Pendamping</div>
                            <div class="col-lg-4 fs-6 text-secodary">
                                <input type="hidden" name="kelompok_id"
                                    value="{{ old('kelompok_id', $jadwal->kelompok_id) }}">
                                <select name="guru_id" id="guru_id"
                                    class="form-select form-select-sm @error('guru_id') is-invalid @enderror" required>
                                    <option value="" selected>Pilih Guru Pendamping</option>
                                    @foreach ($guru as $g)
                                        @if (old('guru_id', $jadwal->guru_id) == $g->id)
                                            <option value="{{ $g->id }}" selected>
                                                {{ ucwords(strtolower($g->nama_guru)) }}
                                            </option>
                                        @else
                                            <option value="{{ $g->id }}">
                                                {{ ucwords(strtolower($g->nama_guru)) }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <table class="table table-bordered">
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
                                    <th class="align-middle">Sabtu</th>
                                    <td>
                                        <div class="col-sm-12">
                                            <select name="sabtu" id="sabtu"
                                                class="form-select form-select-sm @error('sabtu') is-invalid @enderror"
                                                required>
                                                <option value="" selected>Pilih Tema Sabtu</option>
                                                @foreach ($tema as $t)
                                                    @if (old('sabtu', $jadwal->sabtu) == $t->nama_tema)
                                                        <option value="{{ $t->nama_tema }}" selected>
                                                            {{ $t->nama_tema }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $t->nama_tema }}">{{ $t->nama_tema }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input type="text" name="sub_sabtu" id="subSabtu"
                                                class="form-control form-control-sm @error('sub_sabtu') is-invalid @enderror"
                                                value="{{ old('sub_sabtu', $jadwal->sub_sabtu) }}"
                                                placeholder="Sub Teme Sabtu" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <div class="col-sm-12">
                                                <input class="form-control form-control-sm" name="ket_sabtu" id="ketSabtu"
                                                    value="{{ old('ket_sabtu', $jadwal->ket_sabtu) }}">
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle">Ahad</th>
                                    <td>
                                        <div class="col-sm-12">
                                            <select name="minggu" id="minggu"
                                                class="form-select form-select-sm @error('minggu') is-invalid @enderror"
                                                required>
                                                <option value="" selected>Pilih Tema Ahad</option>
                                                @foreach ($tema as $t)
                                                    @if (old('minggu', $jadwal->minggu) == $t->nama_tema)
                                                        <option value="{{ $t->nama_tema }}" selected>
                                                            {{ $t->nama_tema }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $t->nama_tema }}">{{ $t->nama_tema }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input type="text" name="sub_minggu" id="subMinggu"
                                                class="form-control form-control-sm @error('sub_minggu') is-invalid @enderror"
                                                value="{{ old('sub_minggu', $jadwal->sub_minggu) }}"
                                                placeholder="Sub Teme Ahad" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" name="ket_minggu" id="ketMinggu"
                                                value="{{ old('ket_minggu', $jadwal->ket_minggu) }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle">Senin</th>
                                    <td>
                                        <div class="col-sm-12">
                                            <select name="senin" id="senin"
                                                class="form-select form-select-sm @error('senin') is-invalid @enderror"
                                                required>
                                                <option value="" selected>Pilih Tema Senin</option>
                                                @foreach ($tema as $t)
                                                    @if (old('senin', $jadwal->senin) == $t->nama_tema)
                                                        <option value="{{ $t->nama_tema }}" selected>
                                                            {{ $t->nama_tema }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $t->nama_tema }}">{{ $t->nama_tema }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input type="text" name="sub_senin" id="subSenin"
                                                class="form-control form-control-sm @error('sub_senin') is-invalid @enderror"
                                                value="{{ old('sub_senin', $jadwal->sub_senin) }}"
                                                placeholder="Sub Tema Senin" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input name="ket_senin" id="ketSenin" class="form-control form-control-sm"
                                                value="{{ old('ket_senin', $jadwal->ket_senin) }}">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle">Selasa</th>
                                    <td>
                                        <div class="col-sm-12">
                                            <select name="selasa" id="selasa"
                                                class="form-select form-select-sm @error('selasa') is-invalid @enderror"
                                                required>
                                                <option value="" selected>Pilih Tema Selasa</option>
                                                @foreach ($tema as $t)
                                                    @if (old('selasa', $jadwal->selasa) == $t->nama_tema)
                                                        <option value="{{ $t->nama_tema }}" selected>
                                                            {{ $t->nama_tema }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $t->nama_tema }}">{{ $t->nama_tema }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input type="text" name="sub_selasa" id="subSabtu"
                                                class="form-control form-control-sm @error('sub_selasa') is-invalid @enderror"
                                                value="{{ old('sub_selasa', $jadwal->sub_selasa) }}"
                                                placeholder="Sub Tema Selasa" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" name="ket_selasa"
                                                value="{{ old('ket_selasa', $jadwal->ket_selasa) }}" id="ketSelasa">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle">Rabu</th>
                                    <td>
                                        <div class="col-sm-12">
                                            <select name="rabu" id="rabu"
                                                class="form-select form-select-sm @error('rabu') is-invalid @enderror"
                                                required>
                                                <option value="" selected>Pilih Tema Rabu</option>
                                                @foreach ($tema as $t)
                                                    @if (old('rabu', $jadwal->rabu) == $t->nama_tema)
                                                        <option value="{{ $t->nama_tema }}" selected>
                                                            {{ $t->nama_tema }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $t->nama_tema }}">{{ $t->nama_tema }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input type="text" name="sub_rabu" id="subRabu"
                                                class="form-control form-control-sm @error('sub_rabu') is-invalid @enderror"
                                                value="{{ old('sub_rabu', $jadwal->sub_rabu) }}"
                                                placeholder="Sub Tema Rabu" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" name="ket_rabu"
                                                value="{{ old('ket_rabu', $jadwal->ket_rabu) }}" id="ketRabu">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="align-middle">Kamis</th>
                                    <td>
                                        <div class="col-sm-12">
                                            <select name="kamis" id="kamis"
                                                class="form-select form-select-sm @error('kamis') is-invalid @enderror"
                                                required>
                                                <option value="" selected>Pilih Tema Kamis</option>
                                                @foreach ($tema as $t)
                                                    @if (old('kamis', $jadwal->kamis) == $t->nama_tema)
                                                        <option value="{{ $t->nama_tema }}" selected>
                                                            {{ $t->nama_tema }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $t->nama_tema }}">{{ $t->nama_tema }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input type="text" name="sub_kamis" id="subKamis"
                                                class="form-control form-control-sm @error('sub_kamis') is-invalid @enderror"
                                                value="{{ old('sub_kamis', $jadwal->sub_kamis) }}"
                                                placeholder="Sub Tema Kamis" required>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="col-sm-12">
                                            <input class="form-control form-control-sm" name="ket_kamis"
                                                value="{{ old('ket_kamis', $jadwal->ket_kamis) }}" id="ketKamis">
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="row mt-3">
                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">
                                    <i class="ri-checkbox-circle-fill"></i> Buat Jadwal
                                </button>
                                <a href="/administrator/schedule/{{ $jadwal->kelompok_id }}" type="reset"
                                    class="btn btn-danger">
                                    <i class="ri-indeterminate-circle-fill"></i> Batal
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-end me-5 mb-2">
            <a href="/administrator/schedule/{{ $jadwal->kelompok_id }}" class="btn btn-secondary">
                <i class="ri-arrow-go-back-line"></i>
                Kembali
            </a>
        </div>
    </div>
@endsection
