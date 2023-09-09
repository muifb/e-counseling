@extends('dashboard.layouts.main')

@push('css')
    @livewireStyles
@endpush

@push('js')
    @livewireScripts

    <script>
        // function previewImage() {
        //     const image = document.querySelector('#photo');
        //     const imgPreview = document.querySelector('.img-preview');

        //     const oFReader = new FileReader();
        //     oFReader.readAsDataURL(image.files[0]);

        //     oFReader.onload = function(oFREvent) {
        //         imgPreview.src = oFREvent.target.result;
        //     }
        // }
    </script>
@endpush

@section('container')
    <div class="col-md-4">

        <div class="card">
            <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                @if (auth()->user()->photo)
                    <div class="rounded-circle" style="max-height: 200px; overflow:hidden;">
                        <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile" width="200px" class="mb-3">
                    </div>
                @else
                    <div class="rounded-circle" style="max-height: 200px; overflow:hidden;">
                        <img src="/img/profile.jpg" alt="Profile" width="200px" class="mb-3">
                    </div>
                @endif
                <h5 class="text-center">{{ ucwords(strtolower(auth()->user()->nama)) }}</h5>
            </div>
        </div>

    </div>

    <div class="col-md-8">

        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                    <li class="nav-item">
                        <button class="nav-link active" data-bs-toggle="tab"
                            data-bs-target="#profile-overview">Overview</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                    </li>

                    <li class="nav-item">
                        <button class="nav-link " data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                            Password</button>
                    </li>

                </ul>
                <div class="tab-content pt-2">

                    <div class="tab-pane fade show active profile-overview " id="profile-overview">
                        {{-- <h5 class="card-title">About</h5>
                        <p class="small fst-italic">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa dignissimos adipisci itaque
                            maiores at dicta accusantium vel nulla labore. Ducimus!
                        </p> --}}

                        <h5 class="card-title">Profile Details</h5>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label ">Full Name</div>
                            <div class="col-lg-9 col-md-8 text-secondary">
                                @if (auth()->user()->role == 'wali')
                                    {{ $data->nama_ortu }}
                                @else
                                    {{ $data->nama_guru }}
                                @endif
                            </div>
                        </div>

                        @cannot('akses', 'wali')
                            <div class="row">
                                <div class="col-lg-3 col-md-4 label">NIDN</div>
                                <div class="col-lg-9 col-md-8 text-secondary">{{ $data->nuptk }}</div>
                            </div>
                        @endcannot

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Devisi</div>
                            <div class="col-lg-9 col-md-8 text-secodary">{{ $data->devisi }}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Country</div>
                            <div class="col-lg-9 col-md-8 text-secondary">IDN</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Address</div>
                            <div class="col-lg-9 col-md-8 text-secondary">{{ $data->alamat }}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Phone</div>
                            <div class="col-lg-9 col-md-8 text-secondary">{{ $data->no_telp }}</div>
                        </div>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 label">Email</div>
                            <div class="col-lg-9 col-md-8 text-secondary">-</div>
                        </div>

                    </div>

                    <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                        @livewire('profile-edit', ['id' => auth()->user()->id])

                    </div>

                    <div class="tab-pane fade pt-3" id="profile-change-password">
                        @livewire('change-password', ['id' => auth()->user()->id])

                    </div>

                </div>
                <!-- End Bordered Tabs -->

            </div>
        </div>

    </div>
@endsection
