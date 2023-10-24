@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Ketua Murid'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Ketua Murid</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Izin</th>
                                    <th class="text-center">Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    @if ($row->role == 2)
                                        <tr>
                                            <td class="col-6 col-sm-3 align-middle text-center text-sm">
                                                <div class="d-flex align-items-center justify-content-center gap-3">
                                                @if ($row->profile_image)
                                                    <img src="{{ asset('storage/' . $row->profile_image) }}" class="avatar mr-2" alt="image">
                                                @else
                                                    <img src="img/donat.jpg" class="avatar mr-2" alt="image">
                                                @endif
                                                <span>{{ $row->name }}</span>
                                            </div>
                                            </td>
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
                                            <td class="col-6 col-sm-3 align-middle text-center text-sm">{{ $row->kelas->tingkat }} {{ $row->kelas->kelas }}</td>                                       
                                        </tr>
                                    @endif
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

