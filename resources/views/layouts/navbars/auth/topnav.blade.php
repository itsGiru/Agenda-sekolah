<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl
        {{ str_contains(Request::url(), 'virtual-reality') == true ? ' mt-3 mx-3 bg-primary' : '' }}"
    id="navbarBlur" data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $title }}</li>
            </ol>
            <h6 class="font-weight-bolder text-white mb-0">{{ $title }}</h6>
        </nav>
        <ul class="navbar-nav justify-content-end">

            <li class="nav-item d-flex align-items-center ms-3" style="margin-right: 20px">
                <!-- Tambahkan class ms-3 untuk memberikan margin kiri -->
                <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                    @csrf
                    <a href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="nav-link text-white font-weight-bold px-0">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span class="d-sm-inline d-none">Log out</span>
                    </a>
                </form>
            </li>


            <li class="nav-item d-flex align-items-center">
                <a href="{{ route('profile') }}" class="nav-link text-white font-weight-bold px-0">
                    <img src="{{ auth()->user()->getProfileImageURL() }}" alt="Profile Image"
                        class="me-sm-1 rounded-circle profile-image" style="width: 32px; height: 32px;">
                    <span class="d-sm-inline d-none">{{ auth()->user()->name ?? 'Undefined' }}</span>
                </a>
            </li>

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    </div>
</nav>
<!-- End Navbar -->
