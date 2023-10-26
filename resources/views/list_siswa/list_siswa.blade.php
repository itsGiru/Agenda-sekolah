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
                    </div>
                    @if (Auth::user()->role == 3 )
                    <div>
                        <a href="add_siswa" class="btn btn-success">Tambah Siswa</a>
                    </div>
                    @endif
                    @if (Auth::user()->role == 1)
                    <div class="mb-2">
                        <label for="filter_kelas">Filter Kelas:</label>
                        <select id="filter_kelas" class="form-select">
                            <option value="">Semua Kelas</option>
                            @foreach ($list_kelas as $jurusan)
                                <optgroup label="{{ $jurusan->jurusan }}">
                                    @foreach ($jurusan->kelas as $kelas)
                                    <option value="{{ $kelas->tingkat }} {{ $kelas->kelas }}">{{ $kelas->tingkat }} {{ $kelas->kelas }}</option>
                                    @endforeach
                                </optgroup>
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
                                    @if (Auth::user()->role == 1)
                                    <th class="text-center">Kelas</th>
                                    @endif
                                    <th class="text-center">No. Absen</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    @if (Auth::user()->role == 2 || Auth::user()->role == 3)
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                    @if (Auth::user()->role == 1)
                                    <td class="kelas-id text-center">{{ $row->kelas->tingkat }} {{ $row->kelas->kelas }}</td>
                                    @endif
                                    <td class="text-center">{{ $row->no_absen }}</td>
                                        <td class="text-center">{{ $row->nama }}</td>
                                        <td class="text-center">{{ $row->jenis_kelamin }}</td>
                                        @if (Auth::user()->role == 2 || Auth::user()->role == 3)
                                        <td class="text-center">
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" onclick="detailSiswa({{ $row->id }})" data-bs-target="#exampleModal"><i class="fas fa-eye"></i></button>
                                        @endif
                                        @if (Auth::user()->role == 3)
                                            <a href="{{ route('list-siswa.edit_siswa' , $row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger btn-delete" onclick="deleteSiswa('{{ route('siswa.delete', $row->id) }}')" id="delete"><i class="fas fa-trash"></i></button>
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
              <h5 class="modal-title" id="exampleModalLabel">Detail Siswa : <span id="nama-siswa"></span></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <ul class="list-unstyled">
                <li>Sakit : <span id="siswa-sakit"></span></li>
                <li>Izin : <span id="siswa-izin"></span></li>
                <li>Alpa : <span id="siswa-alpa"></span></li>
                <li>Dispensasi : <span id="siswa-dispensasi"></span></li>
            </ul>
            </div>
          </div>
        </div>
      </div>
    @include('layouts.footers.auth.footer')
@endsection

@push('js')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
<script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>
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

    function deleteSiswa(action){
            Swal.fire({
                title: 'Hapus Siswa?',
                    html: "<b class='text-danger'>Peringatan!</b> Riwayat kehadiran siswa akan ikut terhapus! Pastikan anda telah mencetak laporan bulanannya",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Iya',
                    cancelButtonText: 'Batal'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href=action
                    }
                })
            }
</script>
@endpush