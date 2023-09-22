@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tambah User'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240); border-block-color: inherit">
                <div class="card-header" style="background-color:  rgb(240, 240, 240)">
                    <h4>Tambah User</h4>
                </div>

                <div class="card-body">
                    <form method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="password-input-container">
                                <input type="password" id="password" name="password" class="form-control" required>
                                <span class="password-toggle" onclick="togglePasswordVisibility()"><i id="password-icon"
                                        class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role">Role</label>
                            <select id="role" name="role" class="form-control" required>
                                <option value="99">Pilih role</option>
                                <option value="2">Ketua Murid</option>
                                <option value="3">Wali Kelas</option>
                                <option value="4">Kepala Kompetensi</option>
                            </select>
                        </div>

                        <div class="form-group" id="jurusan" style="display: none;">
                            <label for="jurusan">Jurusan</label>
                            <select id="jurusanSelect" name="id_jurusan" class="form-control" required>
                                @foreach($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                                @endforeach
                                <!-- Tambahkan opsi kelas sesuai kebutuhan -->
                            </select>
                        </div>

                        <div class="form-group" id="kelasJurusan" style="display: none;">
                            <label for="kelas">Kelas</label>
                            <select id="kelasSelect" name="id_kelas" class="form-control" required>
                                @foreach($kelas as $item)
                                <option value="{{ $item->id }}">{{ $item->kelas }}</option>
                                @endforeach
                                <!-- Tambahkan opsi kelas sesuai kebutuhan -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Tampilkan atau sembunyikan field Kelas dan Jurusan sesuai dengan pilihan Role
    document.getElementById('role').addEventListener('change', function () {
        var jurusanSelect = document.getElementById('jurusan');
        var kelasJurusanSelect = document.getElementById('kelasJurusan');
        var jurusanSelectElement = document.getElementById('jurusanSelect');
        var kelasSelectElement = document.getElementById('kelasSelect');

        if (this.value === '2' || this.value === '3') {
            jurusanSelect.style.display = 'block';
            jurusanSelectElement.setAttribute('required', 'required');

            kelasJurusanSelect.style.display = 'block';
            kelasSelectElement.setAttribute('required', 'required');
        } else {
            jurusanSelect.style.display = 'block';
            jurusanSelectElement.removeAttribute('required');

            kelasJurusanSelect.style.display = 'none';
            kelasSelectElement.removeAttribute('required');
        }
    });
    

    var passwordInput = document.getElementById('password');
    var passwordIcon = document.getElementById('password-icon');

    function togglePasswordVisibility() {
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordIcon.classList.remove('fa-eye-slash');
            passwordIcon.classList.add('fa-eye');
        } else {
            passwordInput.type = 'password';
            passwordIcon.classList.remove('fa-eye');
            passwordIcon.classList.add('fa-eye-slash');
        }
    }

</script>
@endsection
