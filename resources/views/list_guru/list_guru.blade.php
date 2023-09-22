@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Guru'])
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
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Mata Pelajaran</th>
                                    <th class="text-center">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($groupedMapels as $namaGuru => $mapel)
                                    <tr>
                                        <td class="text-center">{{ $namaGuru }}</td>
                                        <td class="text-center">
                                            @php
                                                $mapelArray = explode(', ', $mapel);
                                            @endphp
                                            @foreach ($mapelArray as $mapelItem)
                                                {{ $mapelItem }}<br>
                                            @endforeach
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
