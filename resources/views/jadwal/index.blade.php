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
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Hari</th>
                                    <th class="text-center">Guru & Mata Pelajaran</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
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
                                        <td class="text-center">
                                            @if (Auth::user()->role == 2)
                                                <button class="btn btn-sm btn-danger btn-delete" disabled><i class="fas fa-trash"></i></button>
                                            @else
                                                {{-- <a href="{{ URL::to('/edit_jadwal/' . $row->id) }}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> --}}
                                                <a class="btn btn-sm btn-danger btn-delete" href="{{ URL::to('/delete_jadwal/' . $row->id) }}" id="delete"><i class="fas fa-trash"></i></a>
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
    @include('layouts.footers.auth.footer')
@endsection
    
@push('js')
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
    </script>
@endpush
