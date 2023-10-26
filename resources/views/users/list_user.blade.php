@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4>Users</h4>
                        <a href="add_user" class="btn btn-success">Tambah User</a>
                    </div>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Profil</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Izin</th>
                                    <th class="text-center">Jurusan</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="text-center">{{ $row->id }}</td>
                                        <td class="text-center">
                                            <div class="align-items-center">
                                                <?php if ($row->profile_image): ?>
                                                    <img src="{{ asset('storage/' . $row->profile_image) }}" class="avatar mr-2" alt="image">
                                                <?php else: ?>
                                                    <img src="img/donat.jpg" class="avatar mr-2" alt="image">
                                                <?php endif; ?>
                                            </div>                                            
                                        </td>
                                        <td class="text-center">{{ $row->name }}</td>
                                        <td class="text-center">{{ $row->email }}</td>          
                                        <td class="text-center">
                                            @php
                                                if ($row->role == 1) {
                                                    echo 'Admin';
                                                } elseif ($row->role == 2) {
                                                    echo 'Ketua murid';
                                                } elseif ($row->role == 3) {
                                                    echo 'Wali Kelas';
                                                } elseif ($row->role == 4) {
                                                    echo 'Kepala Kompetensi';
                                                } elseif ($row->role == 5) {
                                                    echo 'Belum ada role';
                                                } elseif ($row->role == 6) {
                                                    echo 'Pending';
                                                }
                                            @endphp
                                        </td>
                                        @if ($row->role==4)
                                        <td class="text-center">{{ $row->jurusan->jurusan }}</td>
                                        <td></td>
                                        @elseif ($row->role==2 || $row->role==3)
                                        <td class="text-center">{{ $row->jurusan->jurusan }}</td>
                                        <td class="text-center">{{ $row->kelas->tingkat }} {{ $row->kelas->kelas }}</td>
                                        @else
                                        <td></td>
                                        <td></td>
                                        @endif
                                        <td class="text-center">
                                            <a href="{{ URL::to('/edit_user/' . $row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <button class="btn btn-sm btn-danger btn-delete" onclick="deleteUser('{{ route('users.delete', $row->id) }}')" id="delete"><i class="fas fa-trash"></i></button>
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
@push('js')
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
<script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>
    <script>
        function deleteUser(action){
            Swal.fire({
                title: 'Hapus User?',
                text: "Apakah Anda yakin akan menghapus user ini?",
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