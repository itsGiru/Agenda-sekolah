<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 "
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="{{ route('home') }}"
            target="_blank">
            <img src="{{ asset('img/sekolah.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold"> Agenda SMEKDA</span>
        </a>
    </div>
    
    {{-- Admin sidebar --}}
    @if (Auth::user()->role == 1 || Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'home' ? 'active' : '' }}" href="{{ route('home') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Akun</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}" href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-circle-08 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Profil</span>
                </a>
            </li>
    @endif
    @if (Auth::user()->role == 1)
        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Manajemen</h6>
        </li>
            <li class="nav-item">
                <a class="nav-link
                {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}
                {{ Route::currentRouteName() == 'users.add-user' ? 'active' : '' }}
                {{ Route::currentRouteName() == 'users.edit' ? 'active' : '' }}
                {{ Route::currentRouteName() == 'addUser.perform' ? 'active' : '' }}"
                href="{{ route('users.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-user-plus text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">User</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'jurusan.index' ? 'active' : '' }}" href="{{ route('jurusan.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-briefcase-24 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Jurusan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'kelas.index' ? 'active' : '' }}" href="{{ route('kelas.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-building text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kelas</span>
                </a>
            </li>
    @endif
    @if (Auth::user()->role == 1 || Auth::user()->role == 3)
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">List</h6>
            </li>
    @endif
    @if (Auth::user()->role == 1)
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'list-walas.index' ? 'active' : '' }}" href="{{ route('list-walas.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Wali Kelas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'list-km.index' ? 'active' : '' }}" href="{{ route('list-km.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Ketua Murid</span>
                </a>
        @endif
        @if (Auth::user()->role == 1 || Auth::user()->role == 3)
                <li class="nav-item">
                    <a class="nav-link
                    {{ Route::currentRouteName() == 'list-guru.index' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'list-guru.add_guru' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'list-guru.store_guru' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'list-guru.edit_guru' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'list-guru.delete' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'list-guru.edit_mapel' ? 'active' : '' }}
                    {{ Route::currentRouteName() == 'list-guru.update_mapel' ? 'active' : '' }}
                    "href="{{ route('list-guru.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-badge text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Guru</span>
                    </a>
                </li>
            </li>
            <li class="nav-item">
                <a class="nav-link
                {{ Route::currentRouteName() == 'list-siswa.index' ? 'active' : '' }}
                {{ Route::currentRouteName() == 'list-siswa.add_siswa' ? 'active' : '' }}
                {{ Route::currentRouteName() == 'list-siswa.edit_siswa' ? 'active' : '' }} 
                {{ Route::currentRouteName() == 'list-siswa.update_siswa' ? 'active' : '' }}
                {{ Route::currentRouteName() == 'siswa.detail' ? 'active' : '' }}"
                href="{{ route('list-siswa.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-users text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Siswa</span>
                </a>
            </li>
        @if (Auth::user()->role == 1)
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'mapel.index' ? 'active' : '' }}" href="{{ route('mapel.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-book-bookmark text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Mata Pelajaran</span>
                </a>
            </li>
            @endif
            @endif
            @if (Auth::user()->role == 2 || Auth::user()->role == 3)
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Jadwal</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'jadwal.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'jadwal.create' ? 'active' : '' }}" href="{{ route('jadwal.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-calendar text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">List Jadwal</span>
                </a>
            </li>
            @endif
        @if (Auth::user()->role == 2 || Auth::user()->role == 3 || Auth::user()->role == 4)
            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laporan</h6>
            </li>
        @endif
            @if (Auth::user()->role == 2 )
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'absen_guru.index' ? 'active' : '' }}" href="{{ route('absen_guru.index') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-check-square text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kehadiran Guru</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'absen_siswa.index' ? 'active' : '' }}" href="{{ route('absen_siswa.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-check-square text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Kehadiran Siswa</span>
                </a>
            </li>
            @endif
            @if (Auth::user()->role == 2 || Auth::user()->role == 3)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'harian.index' ? 'active' : '' }}" href="{{ route('harian.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-calendar-check text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">List Laporan Harian</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'bulanan.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'bulanan.show' ? 'active' : '' }}" href="{{ route('bulanan.index') }}">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa fa-book text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">List Laporan Bulanan</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->role == 4)
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'harian.kakom' ? 'active' : '' }}" href="{{ route('harian.kakom') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-calendar-check text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">List Laporan Harian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'bulanan.index' ? 'active' : '' }} {{ Route::currentRouteName() == 'bulanan.kakom' ? 'active' : '' }}" href="{{ route('bulanan.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa fa-book text-dark text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">List Laporan Bulanan</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</aside>
