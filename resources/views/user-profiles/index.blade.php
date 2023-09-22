@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Your Profile'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ auth()->user()->getProfileImageURL() }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name ?? 'Lorem Ipsum' }}
                        </h5>
                    </div>
                </div>
                <div class="col-auto my-auto">
                    @if (auth()->user()->profile_image)
                        <form action="{{ route('delete-profile-image') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm mt-2">Hapus Foto Profil</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div>
                <div class="card">
                    <form role="form" method="POST" action="{{ route('profile.update') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profil</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Simpan</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Informasi Akun</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', auth()->user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat Email</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                @if (Auth::user()->role == 2 || 3 || 4)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jurusan">Jurusan</label>
                                        <select name="jurusan" class="form-control" id="jurusan">
                                            @foreach (\App\Models\User::JURUSAN as $jurusan => $value)
                                                <option value="{{ $jurusan }}"
                                                    {{ old('jurusan', auth()->user()->jurusan) == $jurusan ? 'selected' : '' }}>
                                                    {{ $jurusan }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                @if (Auth::user()->role == 2 || 3)
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kelas">Kelas</label>
                                        <select name="kelas" class="form-control" id="kelas">
                                            @foreach (\App\Models\User::KELAS as $kelas => $value)
                                                @if (
                                                    (auth()->user()->jurusan == 'Pilih Jurusan' && strpos($kelas, 'Pilih Jurusan Dahulu')) ||
                                                        (auth()->user()->jurusan == 'Rekayasa Perangkat Lunak' && strpos($kelas, 'RPL')) ||
                                                        (auth()->user()->jurusan == 'Tata Busana' && strpos($kelas, 'TB')))
                                                    <option value="{{ $kelas }}"
                                                        {{ old('kelas', auth()->user()->kelas) == $kelas ? 'selected' : '' }}>
                                                        {{ $kelas }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <form role="form" method="POST" action="{{ route('profile.update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Field lainnya -->
                                            <div class="form-group">
                                                <label for="profile_image" class="form-control-label">Foto Profil</label>
                                                <input type="file" name="profile_image" class="form-control">
                                            </div>
                                            <!-- Tombol Simpan dan lainnya -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <script>
                // Dapatkan elemen-elemen dropdown
                const jurusanDropdown = document.getElementById('jurusan');
                const kelasDropdown = document.getElementById('kelas');

                // Definisikan objek yang memetakan jurusan ke opsi kelas yang valid
                const kelasOptions = {
                    'Pilih Jurusan': [
                        'Pilih Jurusan Dahulu',
                    ],
                    'Rekayasa Perangkat Lunak': [
                        'XII RPL 1',
                        'XII RPL 2',
                    ],
                    'Tata Busana': [
                        'XII TB 1',
                        'XII TB 2',
                    ]
                    // Tambahkan jurusan dan kelas yang sesuai sesuai dengan kebutuhan Anda
                };

                // Fungsi untuk menghapus semua opsi dari dropdown kelas
                function clearKelasDropdown() {
                    while (kelasDropdown.options.length > 0) {
                        kelasDropdown.remove(0);
                    }
                }

                // Tangani perubahan pada dropdown jurusan
                jurusanDropdown.addEventListener('change', function() {
                    const selectedJurusan = jurusanDropdown.value;
                    const kelasOptionsForJurusan = kelasOptions[selectedJurusan] || [];

                    // Bersihkan opsi kelas sebelum menambahkan yang baru
                    clearKelasDropdown();

                    // Tambahkan opsi kelas yang sesuai
                    kelasOptionsForJurusan.forEach(function(kelas) {
                        const option = document.createElement('option');
                        option.value = kelas;
                        option.text = kelas;
                        kelasDropdown.appendChild(option);
                    });
                });

                // Inisialisasi opsi kelas saat halaman dimuat
                const initialJurusan = jurusanDropdown.value;
                const initialKelasOptions = kelasOptions[initialJurusan] || [];
                const selectedKelas = '{{ old('kelas', auth()->user()->kelas) }}'; // Dapatkan kelas yang sudah dipilih sebelumnya

                kelasDropdown.innerHTML = ''; // Hapus semua opsi kelas sebelum menambahkan yang baru

                initialKelasOptions.forEach(function(kelas) {
                    const option = document.createElement('option');
                    option.value = kelas;
                    option.text = kelas;
                    if (kelas === selectedKelas) {
                        option.selected = true; // Tetapkan opsi yang sudah dipilih sebelumnya sebagai terpilih
                    }
                    kelasDropdown.appendChild(option);
                });
            </script>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection