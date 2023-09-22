@extends('layouts.app',  ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Laporan Harian'])

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Laporan Harian</h3>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Form untuk laporan harian -->
                        <div>
                            <h4>Kelas : </h4>
                        </div>
                        <div class="form-group">
                            <label for="bulan">Bulan:</label>
                            <input type="text" class="form-control" id="bulan" name="bulan">
                        </div>
                        <!-- Tambahkan elemen form lainnya sesuai kebutuhan -->
                        <div class="form-group">
                            <label for="kelas">Kelas:</label>
                            <input type="text" class="form-control" id="kelas" name="kelas">
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                        <div class="form-group">
                            <label for="nomor">No.:</label>
                            <input type="text" class="form-control" id="nomor" name="nomor">
                        </div>
                        <div class="form-group">
                            <label for="jam">Jam ke:</label>
                            <input type="text" class="form-control" id="jam" name="jam">
                        </div>
                        <div class="form-group">
                            <label for="mapel">Mapel:</label>
                            <input type="text" class="form-control" id="mapel" name="mapel">
                        </div>
                        <div class="form-group">
                            <label for="materi">Materi:</label>
                            <textarea class="form-control" id="materi" name="materi"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="nama_guru">Nama Guru:</label>
                            <input type="text" class="form-control" id="nama_guru" name="nama_guru">
                        </div>
                        <!-- ... Isi form laporan harian di sini ... -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Izin Siswa</h3>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Form untuk kehadiran siswa -->
                        <div class="form-group">
                            <label for="siswa">Input Data Izin :</label>
                            <div class="table-responsive">
                            <table class="table-responsive">
                                <thead>
                                    <tr>
                                        <td><input type="text" class="form-control" name="siswa[1][nama]"></td>
                                        <td><input type="text" class="form-control" name="siswa[1][keterangan]"></td>
                                    </tr>
                                    <thead style="background: #e9e9e9">
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Siswa</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>    
                                </thead>
                                <tbody>
                                    <!-- Tambahkan baris lainnya sesuai dengan jumlah siswa -->
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth.footer')
@endsection
