@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Kelas'])
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">List Kelas</h3>
                        @if (Auth::user()->role == 1)
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Kelas
                          </button>
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
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kelas as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->tingkat }} {{ $row->kelas}}</td>
                                            <td class="text-center">{{ $row->jurusan->jurusan }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-danger btn-delete" href="{{ URL::to('/delete_kelas/' . $row->id) }}" id="delete"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div> 

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambahkan Kelas</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form role="form" action="{{ route('kelas.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label for="jurusan">Jurusan</label>
                            <select id="jurusan" name="jurusan" class="form-control" required>
                                <option value="">Pilih Jurusan</option>
                                @foreach($jurusan as $item)
                                    <option value="{{ $item->id }}">{{ $item->jurusan}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tingkat">Kelas</label>
                            <select id="tingkat" name="tingkat" class="form-control" required>
                                <option value="">Pilih Kelas</option>
                                @foreach([10, 11, 12] as $item)
                                    <option value="{{ $item }}">{{ $item}}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="form-group" id="kelas-field" >
                            <label for="kelas">Nama Kelas</label>
                            <input type="text" name="kelas" class="form-control" placeholder="Misal, RPL 1">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Tambahkan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')
<script>
    document.getElementById('jurusan').addEventListener('change', function () {
        const jurusanId = this.value;
        const kelasField = document.getElementById('kelas-field');

        if (jurusanId) {
            kelasField.style.display = 'block';
        } else {
            kelasField.style.display = 'none';
        }
    });
</script>
@endpush