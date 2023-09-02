@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Users</h6>
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
                                    <th class="text-center"></th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Izin</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="col-12 col-sm-2 align-middle text-center text-sm">{{ $row->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <?php if ($row->profile_image): ?>
                                                    <img src="{{ asset('storage/' . $row->profile_image) }}" class="avatar mr-2" alt="image">
                                                <?php else: ?>
                                                    <img src="img/bruce-mars.jpg" class="avatar mr-2" alt="image">
                                                <?php endif; ?>
                                            </div>                                            
                                        </td>
                                        <td class="col-6 col-sm-3 align-middle text-center text-sm">{{ $row->name }}</td>
                                        <td class="col-6 col-sm-3 align-middle text-center text-sm">{{ $row->email }}</td>
                                        <td class="col-12 col-sm-2 align-middle text-center text-sm">
                                            @php
                                                if ($row->role == 1) {
                                                    echo 'Admin';
                                                } elseif ($row->role == 2) {
                                                    echo 'Ketua murid';
                                                } elseif ($row->role == 3) {
                                                    echo 'Walas';
                                                } elseif ($row->role == 4) {
                                                    echo 'Kakom';
                                                } elseif ($row->role == 5) {
                                                    echo 'Pending';
                                                }
                                            @endphp
                                        </td>
                                        <td class="col-12 col-sm-2 align-middle text-center text-sm">
                                            <a href="{{ URL::to('/edit_user/' . $row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger btn-delete" href="{{ URL::to('delete_user/' . $row->id) }}" id="delete"><i class="fas fa-trash"></i></a>
                                            @if ($row->role == 5)
                                                <form action="{{ URL::to('/change_role/' . $row->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success"><i class="fas fa-check"></i>&nbsp;Izinkan</button>
                                                </form>
                                            @endif
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
@endsection

