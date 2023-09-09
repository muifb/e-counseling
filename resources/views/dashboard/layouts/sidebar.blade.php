@include('dashboard.layouts.header')

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-heading">Menu</li>

        <li class="nav-item">
            <a class="nav-link {{ Request::is('dashboard') ? 'active' : 'collapsed' }}" href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>
        {{-- @can('akses', 'administrator')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/galeri') ? 'active' : 'collapsed' }}" href="/dashboard/galeri">
                    <i class="bi bi-images"></i>
                    <span>Galery</span>
                </a>
            </li>
        @endcan --}}
        <!-- End Dashboard Nav -->

        @cannot('admin')
            <li class="nav-heading">
                Menu {{ Auth::user()->role == 'kepsek' ? 'Kepala Sekolah' : 'Guru' }}
            </li>
            @can('akses', 'kepsek')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/request-reports') ? 'active' : 'collapsed' }}"
                        href="/dashboard/request-reports">
                        <i class="bi bi-exclamation-diamond"></i>
                        <span>Permintaan Rapor</span>
                        @if (App\Models\Report::where('status', 'menunggu')->count())
                            <span class="badge bg-danger badge-numb">
                                {{ count(App\Models\Report::where('status', 'menunggu')->get()) }}
                            </span>
                        @endif
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/evaluasi-pembelajaran*') ? 'active' : 'collapsed' }}"
                        href="/dashboard/evaluasi-pembelajaran">
                        <i class="bi bi-receipt-cutoff"></i>
                        <span>Evaluasi Pembelajaran</span>
                    </a>
                </li>
            @elsecan('akses', 'guru')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/learnings*') ? 'active' : 'collapsed' }}"
                        href="/dashboard/learnings">
                        <i class="bi bi-receipt-cutoff"></i>
                        <span>Evaluasi Pembelajaran</span>
                    </a>
                </li>
            @endcan
        @endcannot

        @can('admin')
            @cannot('akses', 'administrator')
                <li class="nav-heading mt-3">Menu Tatausaha</li>
            @endcannot
            {{-- <li class="nav-item">
                <a class="nav-link {{ Request::is('administrator/tahun-ajaran') ? 'active' : 'collapsed' }}"
                    href="/administrator/tahun-ajaran">
                    <i class="bi bi-calendar2-event"></i><span>Tahun Ajaran</span>
                </a>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Request::is('administrator/teachers*') ? 'active' : 'collapsed' }}"
                    href="/administrator/teachers">
                    <i class="bi bi-person-workspace"></i><span>Guru</span>
                </a>
            </li>
            @cannot('akses', 'administrator')
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('administrator/students*') ? 'active' : 'collapsed' }}"
                        href="/administrator/students">
                        <i class="bi bi-people"></i><span>Siswa</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('administrator/kelompok*') ? 'active' : 'collapsed' }}"
                        href="/administrator/kelompok">
                        <i class="bi bi-x-diamond"></i><span>Kelompok</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('administrator/tema') ? 'active' : 'collapsed' }}"
                        href="/administrator/tema">
                        <i class="bi bi-columns-gap"></i><span>Tema</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('administrator/schedule*') ? 'active' : 'collapsed' }}"
                        href="/administrator/schedule/create">
                        <i class="bi bi-clipboard2-pulse"></i><span>Jadwal</span>
                    </a>
                </li>
            @endcannot
            <!-- End Forms Nav -->
        @endcan

        <li class="nav-heading mt-3">Account</li>

        @cannot('akses', 'administrator')
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/profile') ? 'active' : 'collapsed' }}"
                    href="/dashboard/profile">
                    <i class="bi bi-person"></i>
                    <span>Profil</span>
                </a>
            </li>
        @endcannot
        <!-- End Profile Page Nav -->

        <li class="nav-item">
            <form action="/logout" method="post">
                @csrf
                <div class="d-grid">
                    <button type="submit" class="nav-link collapsed" style="border: none; outline: none;">
                        <i class="bi bi-box-arrow-right"></i> <a>Keluar</a>
                    </button>
                </div>
            </form>
        </li>
        <!-- End Contact Page Nav -->

    </ul>

</aside>
<!-- End Sidebar-->
