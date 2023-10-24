@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User untuk {{ $edit->name }}</h3>
                    </div>
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    @if(session('error'))
                    <div id="alert">
                        @include('components.alert')
                    </div>
                    @endif
                    <form role="form" action="{{ URL::to('/update_user/' . $edit->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" id="nama" name="name" value="{{ $edit->name }}" class="form-control" required>
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="{{ $edit->email }}" class="form-control" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="password">Password Baru</label>
                                <div class="password-input-container">
                                    <input type="password" id="password" name="password" placeholder="Password (Opsional)" class="form-control">
                                    <span class="password-toggle" onclick="togglePasswordVisibility()"><i id="password-icon"
                                        class="fas fa-eye-slash"></i></span>
                                    </div>
                                    
                                @if ($edit->role != 1)
                                <div class="form-group">
                                    <label for="role">Izin</label>
                                    <select class="form-control" id="role" name="role">
                                        <option value="2" {{ $edit->role == 2 ? 'selected' : '' }} id="roleKetuaMurid">Ketua murid</option>
                                        <option value="3" {{ $edit->role == 3 ? 'selected' : '' }} id="roleWalas">Walas</option>
                                        <option value="4" {{ $edit->role == 4 ? 'selected' : '' }} id="roleKakom">Kepala Kompetensi</option>
                                    </select>
                                </div>
                                @endif
                                
                                @if ($edit->role != 1)
                                <div class="form-group" id="jurusan">
                                    <label for="jurusan">Jurusan</label>
                                    <select id="jurusanSelect" name="id_jurusan" class="form-control">
                                        <option>Pilih Jurusan</option>
                                        @foreach($jurusan as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $edit->id_jurusan ? 'selected' : '' }}>{{ $item->jurusan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @endif
                            
                                @if ($edit->role != 1)
                            <div class="form-group" id="kelasJurusan" style="{{ ($edit->role==4)?'display:none':null }}">
                                <label for="kelas">Kelas</label>
                                <select id="kelasSelect" name="id_kelas" class="form-control">
                                    {{-- @foreach($kelas as $item) --}}
                                        <option></option>
                                        <option value="{{ $edit->kelas->id }}" selected>{{ $edit->kelas->tingkat }} {{ $edit->kelas->kelas }}</option>
                                    {{-- @endforeach --}}
                                </select>
                            </div>
                            @endif
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div> 
@endsection

@push('js')
<script>

document.getElementById('role').addEventListener('change', function () {
        var jurusanSelect = document.getElementById('jurusan');
        var kelasJurusanSelect = document.getElementById('kelasJurusan');
        var jurusanSelectElement = document.getElementById('jurusanSelect');
        var kelasSelectElement = document.getElementById('kelasSelect');

        if (this.value === '1') {
            jurusanSelect.style.display = 'none';
            jurusanSelectElement.removeAttribute('required');

            kelasJurusanSelect.style.display = 'none';
            kelasSelectElement.removeAttribute('required');
            
        } else if (this.value === '2' || this.value === '3') {
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



// Fungsi untuk mengisi opsi kelas berdasarkan jurusan yang dipilih atau default
function fillKelasOptions(selectedJurusanId) {
    // Get the "kelasSelect" element
    var kelasSelectElement = document.getElementById('kelasSelect');

    // Remove existing options
    kelasSelectElement.innerHTML = '';

    // Fetch kelas data based on selectedJurusanId using your API endpoint
    axios.get('/jurusankelas/' + selectedJurusanId) // Gantilah dengan URL API Anda
        .then(function (response) {
            var optionsData = response.data;

            // Add new options based on the selectedJurusanId or default jurusan
            optionsData.forEach(function (option) {
                var optionElement = document.createElement('option');
                optionElement.value = option.id;
                optionElement.text = option.tingkat + ' ' + option.kelas;
                kelasSelectElement.appendChild(optionElement);
            });
        })
        .catch(function (error) {
            console.error('Error fetching options:', error);
        });
}

// Inisialisasi: Ambil nilai jurusan terpilih saat halaman dimuat
var selectedJurusanId = document.getElementById('jurusanSelect').value;

// Panggil fungsi untuk mengisi opsi kelas sesuai dengan jurusan terpilih atau default
// fillKelasOptions(selectedJurusanId);

// Event listener untuk perubahan jurusan
document.getElementById('jurusanSelect').addEventListener('change', function () {
    // Ambil nilai jurusan yang dipilih
    var selectedJurusanId = this.value;

    // Panggil fungsi untuk mengisi opsi kelas berdasarkan jurusan yang dipilih
    fillKelasOptions(selectedJurusanId);

        // Sembunyikan semua opsi kelas
        var kelasOptions = document.querySelectorAll('#kelasSelect option');
    kelasOptions.forEach(function (option) {
        option.disabled = true;
    });

    // Hapus atribut disabled dari opsi kelas yang sesuai dengan jurusan yang dipilih
    var kelasOptionsToEnable = document.querySelectorAll('#kelasSelect option[data-jurusan="' + selectedJurusanId + '"]');
    kelasOptionsToEnable.forEach(function (option) {
        option.disabled = false;
    });
});

</script>
@endpush