@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Guru'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between align-items-center">
                    <h4>List Guru</h4>
                    @if (Auth::user()->role == 1 )
                    <a href="add_guru" class="btn btn-success">Tambah Guru</a>
                    @endif
                    </div>
                    <div id="alert">
                        @include('components.alert')
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Mata Pelajaran</th>
                                    @if (Auth::user()->role == 1)
                                    <th class="text-center">Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($guru as $row)
                                    <tr>
                                        <td class="text-center">{{ $row->nama }}</td>
                                        <td class="text-center">
                                            <ul class="list-unstyled">
                                            @foreach ($row->gurumapel as $mapel)
                                            <li>{{ $mapel->mapel->nama_mapel }}</li>
                                            @endforeach
                                            </ul>
                                        </td>
                                        @if (Auth::user()->role == 1)
                                        <td class="text-center">
                                            <a href="{{ URL::to('/edit_guru/' . $row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                            <a href="{{ URL::to('/edit_gurumapel/' . $row->id) }}" class="btn btn-sm btn-success">Edit Mapel<i></i></a>
                                            <a class="btn btn-sm btn-danger btn-delete" href="{{ URL::to('/delete_guru/' . $row->id) }}" id="delete"><i class="fas fa-trash"></i></a>
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
