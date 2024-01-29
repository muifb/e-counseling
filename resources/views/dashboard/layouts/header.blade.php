<!-- ======= Header ======= -->
@push('css')
    {{--  --}}
@endpush
<header id="header" class="header fixed-top d-flex align-items-center no-print">

    <div class="d-flex align-items-center justify-content-between">
        <div class="border p-1">
            <img src="/img/logo.png" alt="Logo" style="max-height: 40px;">
        </div>
        <a href="/" class="logo d-flex align-items-center">
            {{-- <a class="border"> --}}
            {{-- </a> --}}
            <div class="row">
                <span class="d-none d-lg-block">Conselling</span>
                <small class="d-none d-lg-block mt-1">RA Al-Maskuri</small>
            </div>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->
    <br>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    @if (auth()->user()->photo)
                        <div style="max-height: 40px; overflow:hidden;" class="rounded-circle">
                            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile" width="40px">
                        </div>
                    @else
                        <div style="max-height: 40px; overflow:hidden;" class="rounded-circle">
                            <img src="/img/profile.jpg" alt="Profile" width="40px">
                        </div>
                    @endif
                    <span class="d-none d-md-block dropdown-toggle ps-2">
                        {{ auth()->user()->nama }}
                    </span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ auth()->user()->nama }}</h6>
                        <span>
                            @if (auth()->user()->role == 'guru')
                                Guru Pengajar
                            @elseif (auth()->user()->role == 'tu')
                                Tatausaha
                            @elseif (auth()->user()->role == 'kepsek')
                                Kepala Sekolah
                            @elseif (auth()->user()->role == 'wali')
                                Wali Murid
                            @else
                                Administrator
                            @endif
                        </span>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @cannot('akses', 'administrator')
                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="/dashboard/profile">
                                <i class="bi bi-person"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @endcannot

                    <li>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"></i> Keluar
                            </button>
                        </form>
                    </li>

                </ul><!-- End Profile Dropdown Items -->
            </li>
            <!-- End Profile Nav -->

        </ul>
    </nav>
    <!-- End Icons Navigation -->

</header>
<!-- End Header -->
