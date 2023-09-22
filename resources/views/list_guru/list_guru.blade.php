@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Siswa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>List Guru</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Mata Pelajaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    @if ($row->role == 2) <!-- Hanya tampilkan data dengan role 3 -->
                                        <tr>
                                            <td class="col-6 col-sm-3 align-middle text-center text-sm">{{ $row->name }}</td>
                                            <td class="col-6 col-sm-3 align-middle text-center text-sm">{{ $row->kelas }}</td>
                                            <td class="col-12 col-sm-2 align-middle text-center text-sm">

                                            </td>
                                            <td class="col-12 col-sm-2 align-middle text-center text-sm">
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
@include('layouts.footers.auth.footer')
@endsection

