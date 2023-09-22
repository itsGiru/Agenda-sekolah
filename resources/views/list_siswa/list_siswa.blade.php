@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Siswa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>List Siswa</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">No. Absen</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Jenis Kelamin</th>
                                    <th class="text-center">Aksi</th> <!-- Jika Anda ingin menambahkan kolom aksi -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="text-center">{{ $row->no_absen }}</td>
                                        <td class="text-center">{{ $row->nama }}</td>
                                        <td class="text-center">{{ $row->kelas_jurusan }}</td>
                                        <td class="text-center">{{ $row->jenis_kelamin }}</td>
                                        <td class="text-center">
                                            <!-- Isi dengan tautan atau tombol aksi sesuai kebutuhan Anda -->
                                        </td>
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
