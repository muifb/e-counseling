@extends('layouts.main')

@push('css')
    @livewireStyles
    <style>
        .stars {
            display: inline-block;
            align-items: center;
            gap: 25px;
        }

        .stars i {
            color: #e6e6e6;
            font-size: 27px;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .stars i.active {
            color: #ff9c1a;
        }

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

@section('sections')
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <ol class="pb-1">
                <li><a href="/">Home</a></li>
                <li>Perkembangan Anak</li>
            </ol>
            <h2 class="mb-0">Perkembangan Anak</h2>

        </div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page">
        <div class="container">
            <div class="col-md">
                <div class="card">
                    <div class="card-body">
                        <!-- Bordered Tabs -->
                        <ul class="nav nav-tabs nav-tabs-bordered" style="--bs-breadcrumb-divider: '>>';">

                            <li class="breadcrumb">
                                <span class="breadcrumb-item"><a href="#">Data Perkembangan</a></span>
                                <span class="breadcrumb-item active">Detail Perkembangan ({{ $siswa->nama }} -
                                    {{ $siswa->no_induk }})</span>
                            </li>

                        </ul>
                        <div class="tab-content">

                            <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                <div class="m-3 d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        @if ($siswa->photo)
                                            <div class="rounded-circle" style="max-height: 75px; overflow:hidden;">
                                                <img src="{{ asset('storage/' . $siswa->photo) }}" alt="Profile"
                                                    width="75px">
                                            </div>
                                        @else
                                            <div class="rounded-circle" style="max-height: 75px; overflow:hidden;">
                                                <img src="/img/profile.jpg" alt="Profile" width="75px">
                                            </div>
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h5 class="card-title my-0">{{ $siswa->nama }}</h5>
                                        <div class="breadcrumb my-0 py-0">
                                            <span class="breadcrumb-item active">Nis : {{ $siswa->no_induk }}</span>
                                        </div>
                                        <div class="breadcrumb my-0 py-0">
                                            <span class="breadcrumb-item active">Kelompok :
                                                @if (!$siswa->kelompok_id)
                                                    Belum ada kelompok.
                                                @else
                                                    {{ $siswa->kelompok->nama_kelompok }}
                                                @endif
                                            </span>
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
                                            <div class="mb-2">
                                                <small class="card-text text-secondary fst-italic">
                                                    {{ $item->created_at->diffForHumans() }}
                                                </small>
                                            </div>
                                            <article class="card-text text-secondary mb-3">
                                                {!! $item->keterangan !!}
                                            </article>
                                            <!-- <img src="..." class="object-fit-none border rounded" alt="..."> -->
                                            <div class="row">
                                                @foreach ($item->detailPerkembangan as $image)
                                                    @if ($image->video)
                                                        <div class="col-md-3 p-2">
                                                            <video src="{{ asset('storage/' . $image->video) }}"
                                                                type="video/mp4" loop class="hover-to-play w-100" controls>
                                                            </video>
                                                        </div>
                                                    @else
                                                        <div class="col-md-3 p-2 portfolio-item">
                                                            <div class="portfolio-img">
                                                                <img src="{{ asset('storage/' . $image->image) }}"
                                                                    alt="Profile" class="img-fluid">
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
                                            <hr>

                                            @livewire('perkembangans.comment', ['id' => $item->id, 'siswa_id' => $siswa->id])

                                        </div>
                                    </div>
                                @endforeach
                                <div class="d-flex justify-content-end mt-3">
                                    {{ $data->links() }}
                                </div>
                            </div>

                        </div>
                        <!-- End Bordered Tabs -->


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
