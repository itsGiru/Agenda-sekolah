@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Jadwal'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                    <h4>List Jadwal
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
                    <div>
                        @if (Auth::user()->role == 3 )
                        <a href="tambah_jadwal" class="btn btn-success">Tambah Jadwal</a>
                        @endif
                    </div>
                    <div id="alert">
                        @include('components.alert')
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table-bordered table align-items-center mb-0">
                            <thead style="background-color: rgb(194, 194, 194)">
                                <tr>
                                    <th class="text-center">Hari</th>
                                    <th class="text-center">Guru & Mata Pelajaran</th>
                                    @if (Auth::user()->role == 3)
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody style="background-color: rgb(255, 255, 255)">
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="text-center">{{ match ($row->hari) {
                                            'Mon' => 'Senin',
                                            'Tue' => 'Selasa',
                                            'Wed' => 'Rabu',
                                            'Thu' => 'Kamis',
                                            'Fri' => 'Jum`at',
                                            default => 'Hah'

                                        } }}</td>
                                        <td class="text-center">
                                            <ul class="list-unstyled">
                                                {{ $row->guruMapel->guru->nama }} - {{ $row->guruMapel->mapel->nama_mapel }}
                                            </ul>
                                        </td>
                                        @if (Auth::user()->role == 3)
                                        <td class="text-center">
                                                <button class="btn btn-sm btn-danger btn-delete" onclick="deleteGuruMapel('{{ route('jadwal.delete', $row->id) }}')" id="delete"><i class="fas fa-trash"></i></button>
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
    @include('layouts.footers.auth.footer')
@endsection
    
@push('js')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
<script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>

<script>
    const table = document.querySelector('table');
    
    let headerCell = null;
    
    for (let row of table.rows) {
        const firstCell = row.cells[0];
        
        if (headerCell === null || firstCell.innerText !== headerCell.innerText) {
            headerCell = firstCell;
        } else {
            headerCell.rowSpan++;
            firstCell.remove();
        }
    }

    function deleteGuruMapel(action){
            Swal.fire({
                title: 'Hapus Mata Pelajaran Pada Hari Tersebut?',
                    html: "<b class='text-danger'>Peringatan!</b> Riwayat kehadiran guru akan ikut terhapus! Pastikan anda telah mencetak laporan bulanannya",
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
