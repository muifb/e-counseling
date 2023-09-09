{{-- @dd($data[0]->siswa) --}}
@extends('dashboard.layouts.main')

@push('css')
    @livewireStyles
    <style>
        .portfolio-item .portfolio-img {
            overflow: hidden;
        }

        .portfolio-item .portfolio-img img {
            transition: all 0.6s;
        }

        .portfolio-item:hover .portfolio-img img {
            transform: scale(1.15);
        }
    </style>
@endpush

@push('js')
    @livewireScripts

    <script>
        // Livewire.on('comment_store', commentId => {
        //     var viewScroll = document.getElementById('comment-' + commentId);
        //     viewScroll.scrollIntoView({
        //         behavior: 'smooth'
        //     }, true);
        // })

        const clip = document.querySelectorAll(".hover-to-play");
        for (let i = 0; i < clip.length; i++) {
            clip[i].addEventListener("mouseenter", function(e) {
                clip[i].muted = true;
                clip[i].play();
            });
            clip[i].addEventListener("mouseout", function(e) {
                clip[i].muted = true;
                clip[i].pause();
            });
        }
    </script>
@endpush

@section('container')
    <div class="col-md">
        <div class="card">
            <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered" style="--bs-breadcrumb-divider: '>>';">

                    <li class="breadcrumb">
                        @can('akses', 'guru')
                            <span class="breadcrumb-item"><a href="/dashboard/learnings">Siswa</a></span>
                        @elsecan('akses', 'kepsek')
                            <span class="breadcrumb-item"><a
                                    href="/dashboard/evaluasi-pembelajaran/kelompok/siswas/{{ $siswa->kelompok_id }}">Siswa</a></span>
                        @endcan
                        <span class="breadcrumb-item active">Detail Perkembangan ({{ $siswa->nama }} -
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
                            <div class="col-md-8">
                                <div class="row align-items-center">
                                    <div class="card-body">
                                        <h5 class="card-title mb-0 pt-1 pb-2">{{ $siswa->nama }}</h5>
                                        <div class="breadcrumb m-0 p-0">
                                            <span class="breadcrumb-item">Nis : {{ $siswa->no_induk }}</span>
                                        </div>
                                        <div class="breadcrumb m-0 p-0">
                                            <span class="breadcrumb-item">Kelompok :
                                                {{ $siswa->kelompok->nama_kelompok }}</span>
                                        </div>
                                        {{-- <div class="breadcrumb m-0 p-0">
                                            <span class="breadcrumb-item">22 Juni 2023</span>
                                        </div> --}}
                                        @can('akses', 'guru')
                                            <div class="breadcrumb">
                                                <a class="breadcrumb-item"
                                                    href="/dashboard/learnings/add-detail/{{ $siswa->id }}">
                                                    <i class="ri-arrow-left-double-line"></i>
                                                    Kembali ke tambah detail
                                                </a>
                                            </div>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>

                        @foreach ($data as $item)
                            <div class="card">
                                <div class="card-body">
                                    {{-- <h5 class="card-title">Learning Evaluation</h5> --}}
                                    <h5 class="card-title pb-0 mb-0">
                                        Evaluasi Pembelajaran Tema -
                                        {{ $item->tema_id != null ? $item->tema->nama_tema : '' }}
                                    </h5>
                                    <small class="fw-semibold fst-italic">Pembelajaran pada tanggal :
                                        {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('j F, Y') }}</small>
                                    <div class="">
                                        <small class="card-text text-secondary fst-italic">
                                            Uploaded : {{ $item->created_at->diffForHumans() }}
                                        </small>
                                    </div>
                                    <article class="card-text text-secondary my-3">
                                        {!! $item->keterangan !!}
                                    </article>
                                    <!-- <img src="..." class="object-fit-none border rounded" alt="..."> -->
                                    <div class="row">
                                        @foreach ($item->detailPerkembangan as $image)
                                            @if ($image->video)
                                                <div class="col-md-3 p-2">
                                                    <video src="{{ asset('storage/' . $image->video) }}" type="video/mp4"
                                                        loop class="hover-to-play w-100" controls>
                                                    </video>
                                                </div>
                                            @else
                                                <div class="col-md-3 p-2 portfolio-item">
                                                    <div class="portfolio-img">
                                                        <img src="{{ asset('storage/' . $image->image) }}"
                                                            alt="Gambar Perkembangan" class="img-fluid">
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                    <div class="mt-3">
                                        <small class="fw-semibold fst-italic">Rate :
                                        </small>
                                        {{-- @dd($item->rating->star_rated) --}}
                                        @if ($item->rating['star_rated'] == 5)
                                            <div class="stars ms-2">
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                            </div>
                                        @elseif ($item->rating['star_rated'] == 4)
                                            <div class="stars ms-2">
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star"></i>
                                            </div>
                                        @elseif ($item->rating['star_rated'] == 3)
                                            <div class="stars ms-2">
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            </div>
                                        @elseif ($item->rating['star_rated'] == 2)
                                            <div class="stars ms-2">
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            </div>
                                        @elseif ($item->rating['star_rated'] == 1)
                                            <div class="stars ms-2">
                                                <i class="bx bxs-star active"></i>
                                                <i class="bx bxs-star "></i>
                                                <i class="bx bxs-star "></i>
                                                <i class="bx bxs-star "></i>
                                                <i class="bx bxs-star "></i>
                                            </div>
                                        @else
                                            <div class="stars ms-2">
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star "></i>
                                                <i class="bx bxs-star "></i>
                                                <i class="bx bxs-star "></i>
                                                <i class="bx bxs-star "></i>
                                            </div>
                                        @endif
                                    </div>

                                    {{-- @if ($item->guru_id == Auth::user()->guru->id)
                                        <div class="mt-3">
                                            <a type="button" class="btn btn-light btn-sm"
                                                href="/dashboard/learnings/{{ $item->id }}/edit">
                                                Edit
                                            </a>
                                            <a type="button" class="btn btn-light btn-sm">
                                                Hapus
                                            </a>
                                        </div>
                                    @endif --}}

                                    <hr>

                                    @livewire('perkembangans.comment', ['id' => $item->id, 'siswa_id' => $siswa->id])

                                </div>
                            </div>
                        @endforeach
                        <div class="d-flex justify-content-end">
                            {{ $data->links() }}
                        </div>
                    </div>

                </div>
                <!-- End Bordered Tabs -->


            </div>
        </div>
        <div class="d-flex justify-content-end me-5 mb-3">
            @can('akses', 'guru')
                <a href="/dashboard/learnings" class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line"></i>
                    Kembali
                </a>
            @elsecan('akses', 'kepsek')
                <a href="/dashboard/evaluasi-pembelajaran/kelompok/siswas/{{ $siswa->kelompok_id }}"
                    class="btn btn-secondary">
                    <i class="ri-arrow-go-back-line"></i>
                    Kembali
                </a>
            @endcan
        </div>
    </div>
@endsection
