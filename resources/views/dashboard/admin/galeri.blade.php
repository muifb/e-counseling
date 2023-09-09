@extends('dashboard.layouts.main')

@push('css')
    <link href="/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="/assets/css/galeri.css" rel="stylesheet">
@endpush

@push('js')
    <script src="/assets/vendor/aos/aos.js"></script>
    <script src="/assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/assets/js/porfolio.js"></script>
    <script>
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
    <section id="portfolio" class="portfolio">
        <div class="section-title">
            <h2>Foto dan Video Perkembangan Siswa</h2>
        </div>

        <ul id="portfolio-flters" class="d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <li data-filter="*" class="filter-active">All</li>
            <li data-filter=".filter-image">Foto</li>
            <li data-filter=".filter-video">Video</li>
        </ul>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="100">
            @php
                $files = Storage::allFiles('files-perkembangan');
            @endphp
            @foreach ($files as $item)
                @php
                    $mimeType = Storage::mimeType($item);
                    // $file_extension = substr(strrchr($item, '.'), 1);
                @endphp
                @if (
                    $mimeType == 'video/mp4' ||
                        $mimeType == 'video/mp4v' ||
                        $mimeType == 'video/mpg4' ||
                        $mimeType == 'video/avi' ||
                        $mimeType == 'video/movie' ||
                        $mimeType == 'video/mov')
                    <div class="col-lg-4 col-md-6 portfolio-item filter-video">
                        <div class="portfolio-img">
                            <video src="{{ asset('storage/' . $item) }}" type="video/mp4" loop
                                class="hover-to-play img-fluid" controls>
                            </video>
                        </div>
                    </div>
                @else
                    <div class="col-lg-4 col-md-6 portfolio-item filter-image">
                        <div class="portfolio-img"><img src="{{ asset('storage/' . $item) }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    </section>
@endsection
