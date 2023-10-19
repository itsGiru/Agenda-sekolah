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
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach

                    @if(session('error'))
                    <div id="alert">
                        @include('components.alert')
                    </div>
                    @endif
                    
                    <form method="POST" action="{{ route('addUser.perform') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="name" placeholder="Nama" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="password-input-container">
                                <input type="password" id="password" name="password" placeholder="Password" class="form-control" required>
                                <span class="password-toggle" onclick="togglePasswordVisibility()"><i id="password-icon"
                                        class="fas fa-eye-slash"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="role">Izin</label>
                            <select id="role" name="role" class="form-control" required>
                                <option>Pilih Izin</option>
                                <option value="2">Ketua Murid</option>
                                <option value="3">Wali Kelas</option>
                                <option value="4">Kepala Kompetensi</option>
                            </select>
                        </div>

                        <div class="form-group" id="jurusan" style="display: none;">
                            <label for="jurusan">Jurusan</label>
                            <select id="jurusanSelect" name="id_jurusan" class="form-control" required>
                                <option>Pilih Jurusan</option>
                                @foreach($jurusan as $item)
                                <option value="{{ $item->id }}">{{ $item->jurusan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="kelasJurusan" style="display: none;">
                            <label for="kelas">Kelas</label>
                            <select id="kelasSelect" name="id_kelas" class="form-control" required></select>
                        </div>

                        <div class="text-center">
                        <button type="submit" class="btn btn-primary bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('js')
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

        // When the "jurusanSelect" element's value changes
        document.getElementById('jurusanSelect').addEventListener('change', function () {
        // Get the selected jurusan value
        var selectedJurusan = this.value;

        // Make an Axios GET request to your API endpoint to fetch options data
        axios.get('/jurusankelas/'+selectedJurusan) // Replace with your actual API endpoint
            .then(function (response) {
                // Handle the response data, assuming it's an array of options
                var optionsData = response.data;
                console.log(optionsData);

                // Get the "kelasSelect" element
                var kelasSelectElement = document.getElementById('kelasSelect');

                // Remove existing options
                kelasSelectElement.innerHTML = '';

                // Add new options based on the selected jurusan
                optionsData.forEach(function (option) {
                    // Check if the option matches the selected jurusan or is empty (for default option)
                        var optionElement = document.createElement('option');
                        optionElement.value = option.id;
                        optionElement.text = option.tingkat + ' ' + option.kelas;
                        kelasSelectElement.appendChild(optionElement);
                });
            })
            .catch(function (error) {
                console.error('Error fetching options:', error);
            });
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
@endpush