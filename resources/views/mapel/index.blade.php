@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Mata Pelajaran'])
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">List Mata Pelajaran</h3>
                        @if (Auth::user()->role == 1)
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Mata Pelajaran
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
                                        <th class="text-center">Mata Pelajaran</th>
                                        @if (Auth::user()->role == 1)
                                        <th class="text-center">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mapel as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->nama_mapel}}</td>
                                            @if (Auth::user()->role == 1)
                                            <td class="text-center">
                                                <button class="btn btn-sm btn-danger btn-delete" onclick="deleteMapel('{{ route('mapel.delete', $row->id) }}')" id="delete"><i class="fas fa-trash"></i></button>
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
            <div class="col-md-2">
            </div>
        </div>
    </div> 

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Tambahkan Mapel</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="{{ route('mapel.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <input type="text" placeholder="Nama Mata Pelajaran" id="mapel" name="mapel" class="form-control">
                        </select>
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
<link rel="stylesheet" href="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.css') }}">
<script src="{{ asset('assets/js/plugins/sweetalert2/dist/sweetalert2.js') }}"></script>

<script>
        function deleteMapel(action){
        Swal.fire({
            title: 'Hapus Mata Pelajaran?',
                text: "Apakah Anda yakin akan menghapus mata pelajaran ini?",
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