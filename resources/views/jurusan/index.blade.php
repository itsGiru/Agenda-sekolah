@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'List Jurusan'])
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">List Jurusan</h3>
                        @if (Auth::user()->role == 1)
                        <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Jurusan
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
                                        <th class="text-center">Jurusan</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($jurusan as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->jurusan}}</td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-primary" href="{{ URL::to('/jurusan/kenaikan/' . $row->id) }}" id="delete">Kenaikan<i></i></a>
                                                <a class="btn btn-sm btn-danger btn-delete" href="{{ URL::to('/delete_jurusan/' . $row->id) }}" id="delete"><i class="fas fa-trash"></i></a>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambahkan Jurusan</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="{{ route('jurusan.store') }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <input type="text" placeholder="Nama Jurusan" id="jurusan" name="jurusan" class="form-control">
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
<script>
</script>
@endpush