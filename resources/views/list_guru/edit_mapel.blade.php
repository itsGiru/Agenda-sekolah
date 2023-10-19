@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                        <h3 class="card-title">Kelola Mata Pelajaran untuk {{ $edit->nama }}</h3>
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Tambah Mata Pelajaran
                          </button>
                        </div>
                    </div>
                    <div id="alert">
                        @include('components.alert')
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center">Mata Pelajaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($gurumapel as $row)
                                        <tr>
                                            <td class="text-center">{{ $row->mapel->nama_mapel }}</td>
                                            <td class="text-center">
                                                <a class="btn btn-sm btn-danger btn-delete" href="{{ URL::to('/delete_gurumapel/' . $row->id) }}" id="delete"><i class="fas fa-trash"></i></a>
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
              <h5 class="modal-title" id="exampleModalLabel">Tambahkan Mata Pelajaran Untuk  {{ $edit->nama }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form role="form" action="{{ route('list-guru.update_mapel' , $edit->id) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select id="mapel" name="mapel" class="form-control" required>
                            <option></option>
                            @foreach($mapel as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                            @endforeach                            
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