@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Jurusan</p>
                                    <h5 class="font-weight-bolder">
                                        {{ $jumlahJurusan }}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-default shadow-primary text-center rounded-circle">
                                    <i class="ni ni-briefcase-24 text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Kelas</p>
                                    <h5 class="font-weight-bolder">
                                        {{$jumlahKelas}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-success shadow-success text-center rounded-circle">
                                    <i class="ni ni-building text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Guru</p>
                                    <h5 class="font-weight-bolder">
                                        {{$jumlahGuru}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-primary shadow-primary text-center rounded-circle">
                                    <i class="ni ni-badge text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                <div class="card">
                    <div class="card-body p-3">
                        <div class="row">
                            <div class="col-8">
                                <div class="numbers">
                                    <p class="text-sm mb-0 text-uppercase font-weight-bold">Mata Pelajaran</p>
                                    <h5 class="font-weight-bolder">
                                        {{$jumlahMapel}}
                                    </h5>
                                </div>
                            </div>
                            <div class="col-4 text-end">
                                <div class="icon icon-shape bg-danger shadow-danger text-center rounded-circle">
                                    <i class="ni ni-book-bookmark text-lg opacity-10" aria-hidden="true"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-lg-7 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="card-header pb-0 pt-3 bg-transparent">
                            <h4 class="text-capitalize">Selamat Datang ,
                                <br>{{ auth()->user()->name ?? 'Undefined' }} !
                            </h4>
                            <h4 class="text-sm mb-0">
                                        @if(Auth::user()->role === "1")
                                            <h5>(Admin)</h5>
                                        @elseif(Auth::user()->role === "2")
                                            Ketua Murid
                                            @php
                                                $kelas = App\Models\Kelas::find(Auth::user()->id_kelas);
                                                if ($kelas) {
                                                    echo $kelas->tingkat, " ", $kelas->kelas;
                                                }
                                            @endphp
                                        @elseif(Auth::user()->role === "3")
                                            Wali Kelas
                                            @php
                                            $kelas = App\Models\Kelas::find(Auth::user()->id_kelas);
                                            if ($kelas) {
                                                echo $kelas->tingkat, " ", $kelas->kelas;
                                            }
                                            @endphp
                                        @elseif(Auth::user()->role === "4")
                                            Kepala Kompetensi
                                            @php
                                            $kelas = App\Models\Kelas::find(Auth::user()->id_jurusan);
                                            if ($kelas) {
                                                echo  "Jurusan ", $kelas->jurusan->jurusan;
                                            }
                                        @endphp

                                        @else
                                            (Peran Tidak Dikenal)
                                        @endif</b>
                            </h4>
                        </div>
                        
                        <h6 class="text-capitalize"></h6>
                        <p class="text-sm mb-0">
                            <span class="font-weight-bold"></span>
                        </p>
                    </div>
                    <div class="card-body p-3">
                        <div class="chart">
                            <canvas id="chart-doughnut" class="chart-canvas" height="300"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="card card-carousel overflow-hidden h-100 p-0">
                    <div id="carouselExampleCaptions" class="carousel slide h-100" data-bs-ride="carousel">
                        <div class="carousel-inner border-radius-lg h-100">
                            <div class="carousel-item h-100 active" style="background-image: url('https://telegra.ph/file/f307b0308f5fcb01db24c.jpg'); background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="text-center border-radius-md mb-3">
                                    </div>
                                    <h5 class="text-white mb-1">Selamat Datang di Agenda Harian SMKN 2 Purwakarta, {{ auth()->user()->name ?? 'Undefined' }} !</h5>
                                    <p>Selamat Menjalani Aktivitas Anda ^_^</p>
                                </div>
                            </div>
                            <div class="carousel-item h-100" style="background-image: url('https://telegra.ph/file/4661cf1cdc99d48f41992.jpg');background-size: cover;">
                                <div class="carousel-caption d-none d-md-block bottom-0 text-start start-0 ms-5">
                                    <div class="icon icon-shape icon-sm bg-white text-center border-radius-md mb-3">
                                        <i class="ni ni-book-bookmark text-dark" aria-hidden="true"></i>
                                    </div>
                                    <h4 class="text-white mb-1">TENTANG</h4>
                                    <p>Agenda Harian SMKN 2 Purwakarta dibuat dan dikembangkan oleh Tim SMKN 2 Purwakarta yang beranggotakan 3 orang Siswa pada saat melaksanakan Praktik Kerja Lapangan di PT. Inovindo Digital Media.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                        <button class="carousel-control-next w-5 me-3" type="button"
                            data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden"></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
    @if (Auth::user()->role == 6)
    <div class="overlayblock">
        <div>
            <p>Akun anda masih dalam peninjauan oleh admin</p>
            <form role="form" method="post" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="nav-link text-white font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none">Log out</span>
                </a>
            </form>
        </div>        
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
          var overlay = document.querySelector(".overlayblock");
          overlay.style.display = "flex";
        });
    </script>           
    @endif
@endsection

@push('js')
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="./assets/js/plugins/chartjs.min.js"></script>
    <script>

        const Guru = {{ $jumlahGuru }};
        const Mapel = {{ $jumlahMapel }};
        const Kelas = {{ $jumlahKelas }};
        const Jurusan = {{ $jumlahJurusan }};



        var ctx1 = document.getElementById("chart-doughnut").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(251, 99, 64, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(251, 99, 64, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(251, 99, 64, 0)');
        new Chart(ctx1, {
            type: "doughnut",
            data: {
                labels: ['Jurusan', 'Kelas', 'Mata Pelajaran', 'Guru'],
                datasets: [{
                    label: ['Jurusan', 'Kelas',  'Mata Pelajaran', 'Guru'],
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#00000f",
                    backgroundColor: ['rgb(66, 188, 245)', 'rgb(49, 238, 49)', 'rgb(235, 5, 5)', 'rgb(255, 192, 203)'],
                    borderWidth: 1,
                    fill: true,
                    data: [Jurusan, Kelas, Mapel ,Guru],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: true,
                    }
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    </script>
@endpush
