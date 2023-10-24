@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Siswa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div id="alert">
                        @include('components.alert')
                </div>
                <div class="card-body text-center border-bottom">
                    <h2 class="mb-5">Jumlah Siswa Jurusan {{ $jurusan->jurusan }} : {{ $list }}</h2>
                    <div>
                        <button type="button" onclick="naikKelas('{{ route('jurusan.kenaikan.update', $jurusan->id) }}')" class="btn btn-success btn-lg w-100">Naikkan Kelas</button>
                    </div>
                </div>
                <div class="card-body ">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <h4>Riwayat Kenaikan Kelas</h4>
                            <thead>
                                <tr>
                                    <th class="">Tanggal</th>
                                    <th class="">Jurusan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($riwayat as $row)
                                <tr>
                                    <td class="">{{ $row->created_at }}</td>
                                    <td class="">{{ $jurusan->jurusan }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth.footer')
@endsection

@push('js')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
<script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>
<script>
    function naikKelas(action){
        Swal.fire({
            title: 'Naikkan Kelas?',
            text: "Anda akan menaikkan semua kelas yang ada di Jurusan {{ $jurusan->jurusan }}",
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
@endpush