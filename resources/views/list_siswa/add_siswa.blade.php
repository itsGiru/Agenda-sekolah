@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kelola Siswa'])
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h3 class="card-title">Kelola Siswa</h3>
                        </div>
                        <div id="alert">
                            @include('components.alert')
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ $action }}">
                            @csrf
                            <div class="form-group">
                                <label for="no_absen">No. Absen</label>
                                <input type="text" class="form-control" id="no_absen" name="no_absen" value="{{ $siswa->no_absen ?? old('no_absen') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" value="{{ $siswa->nama ?? old('nama') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="Laki-laki" @if (!empty($siswa) && $siswa->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                    <option value="Perempuan" @if (!empty($siswa) && $siswa->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah Siswa</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        // Jika Anda memerlukan JavaScript khusus, Anda bisa menambahkannya di sini.
    </script>
@endpush
