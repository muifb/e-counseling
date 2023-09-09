@extends('dashboard.layouts.main')

@section('container')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Kenaikan/Perpindahan Kelas</h5>

                    <!-- Table with stripped rows -->
                    <div class="row mb-3">
                        {{-- <legend class="col-form-label col-sm-2 pt-0">Checkboxes</legend> --}}
                        @foreach ($kelompok as $kel)
                            <div class="col-md-6 mb-3">
                                <legend class="col-form-label mb-2">Kelompok {{ $kel->nama_kelompok }}</legend>
                                @if ($siswa->where('kelompok_id', $kel->id)->count())
                                    @foreach ($siswa->where('kelompok_id', $kel->id) as $item)
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck{{ $item->id }}"
                                                checked>
                                            <label class="form-check-label" for="gridCheck{{ $item->id }}">
                                                {{ $item->nama }}
                                            </label>
                                        </div>
                                    @endforeach
                                @else
                                    <p class="card-text text-muted">No Students List!</p>
                                @endif
                            </div>
                        @endforeach
                    </div>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
@endsection
