@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Siswa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                    <h4>List Siswa
                        @php
                        $kelas = App\Models\Kelas::find(Auth::user()->id_kelas);
                        if ($kelas) {
                            echo $kelas->tingkat;
                            echo " ";
                            echo $kelas->kelas;
                        }
                        @endphp
                    </h4>
                    @if (Auth::user()->role == 3 )
                    <a href="add_siswa" class="btn btn-success">Tambah Siswa</a>
                    @endif
                    </div>
                    @if (Auth::user()->role == 1)
                    <div class="mb-2">
                        <label for="filter_kelas">Filter Kelas:</label>
                        <select id="filter_kelas" class="form-select">
                            <option value="">Semua Kelas</option>
                            @foreach ($list_kelas as $kelas)
                                <option value="{{ $kelas->tingkat }} {{ $kelas->kelas }}">{{ $kelas->tingkat }} {{ $kelas->kelas }}</option>
                            @endforeach
                        </select>
                    </div>
                    @endif
                    <div id="alert">
                        @include('components.alert')
                    </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">No. Absen</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                    <td class="kelas-id text-center">{{ $row->kelas->tingkat }} {{ $row->kelas->kelas }}</td>
                                    <td class="text-center">{{ $row->no_absen }}</td>
                                        <td class="text-center">{{ $row->nama }}</td>
                                        <td class="text-center">{{ $row->jenis_kelamin }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" onclick="detailSiswa({{ $row->id }})" data-bs-target="#exampleModal"><i class="fas fa-eye"></i></button>
                                    @if (Auth::user()->role == 3)
                                            <a href="{{ route('list-siswa.edit_siswa' , $row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger btn-delete" href="{{ URL::to('/delete_siswa/' . $row->id) }}" id="delete"><i class="fas fa-trash"></i></a>
                                        </td>
                                    @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Siswa <span id="nama-siswa"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <li>Sakit: <span id="siswa-sakit"></span></li>
                <li>Izin: <span id="siswa-izin"></span></li>
                <li>Alpa: <span id="siswa-alpa"></span></li>
                <li>Dispensasi: <span id="siswa-dispensasi"></span></li>
            </div>
          </div>
        </div>
      </div>
    @include('layouts.footers.auth.footer')
@endsection

@push('js')
@if (Auth::user()->role == 1)
<script>
    // Menangani perubahan nilai pada elemen select
    document.getElementById('filter_kelas').addEventListener('change', function() {
        var selectedKelasId = this.value;
        var rows = document.querySelectorAll('tbody tr');

        // Jika "Semua Kelas" dipilih, tampilkan semua baris
        if (selectedKelasId === "") {
            rows.forEach(function(row) {
                row.style.display = "";
            });
        } else {
            // Jika kelas tertentu dipilih, sembunyikan baris yang tidak sesuai
            rows.forEach(function(row) {
                var kelasId = row.querySelector('.kelas-id').textContent;
                if (kelasId === selectedKelasId) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        }
    });
</script>
@endif
<script>
    function detailSiswa(id) 
    {
      axios.get('/siswa_detail/' + id)
      .then(function (response){
        document.getElementById('nama-siswa').textContent=response.data.siswa;
        document.getElementById('siswa-sakit').textContent=response.data.absensi[0];
        document.getElementById('siswa-izin').textContent=response.data.absensi[1];
        document.getElementById('siswa-alpa').textContent=response.data.absensi[2];
        document.getElementById('siswa-dispensasi').textContent=response.data.absensi[3];

      }).catch(function (error) {
        console.error('Error fetching options:', error);
      });
    }
</script>
@endpush