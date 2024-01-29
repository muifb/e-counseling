<!-- ======= Header ======= -->
<header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">
        <!-- Uncomment below if you prefer to use an image logo -->
        <a href="index.html" class="logo me-auto border p-1"><img src="/img/logo.png" alt=""></a>
        <div class="row ms-2 me-auto">
            <h1 class="logo"><a href="#">Conselling</a></h1>
            <div class="logo-span">
                <span>RA Al-Maskuri</span>
            </div>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link" href="/">Home</a></li>
                <li>
                    <a class="nav-link {{ Request::is('learning*') ? 'active' : '' }}" href="/learning">Perkembangan</a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('hasil-belajar*') ? 'active' : '' }}" href="/hasil-belajar">
                        Hasil Belajar
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('jadwal*') ? 'active' : '' }}" href="/jadwal">
                        Jadwal
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ Request::is('daftar-siswa*') ? 'active' : '' }}" href="/daftar-siswa">Detail
                        Siswa
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="getstarted">
                        <span>
                            {{ auth()->user()->nama }}
                        </span>
                        <i class="bi bi-chevron-down"></i>
                    </a>
                    <ul>
                        <button type="submit" class="dropdown-item" onclick="window.location.href='/wali-profile'">
                            <i class="bi bi-person"></i> My Profile
                        </button>
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="ri-logout-box-r-line"></i> Logout
                            </button>
                        </form>
                    </ul>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
