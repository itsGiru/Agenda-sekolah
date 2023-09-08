@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Walas'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Walas</h6>
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
                                    <th class="text-center">Telp</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    @if ($row->role == 3) <!-- Hanya tampilkan data dengan role 3 -->
                                        <tr>
                                            <td class="col-12 col-sm-2 align-middle text-center text-sm">{{ $row->id }}</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @if ($row->profile_image)
                                                        <img src="{{ asset('storage/' . $row->profile_image) }}" class="avatar mr-2" alt="image">
                                                    @else
                                                        <img src="img/donat.jpg" class="avatar mr-2" alt="image">
                                                    @endif
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
                                                @if (!empty($row->no_wa))
                                                    @php
                                                        // Menghasilkan URL WhatsApp jika nomor WhatsApp tersedia
                                                        $whatsapp_url = strpos($row->no_wa, '0') === 0 ? 'https://wa.me/62' . substr($row->no_wa, 1) : 'https://wa.me/' . $row->no_wa;
                                                    @endphp
                                                    <a type="button" class="btn btn-success btn-sm mt-2" href="{{ $whatsapp_url }}" target="blank_"><i class="fa-brands fa-whatsapp" style="font-size: 16px;"></i></a>
                                                @endif
                                            </td>                                            
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
@endsection

