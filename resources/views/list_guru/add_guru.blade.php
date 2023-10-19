@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tambah User'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240); border-block-color: inherit">
                <div class="card-header" style="background-color:  rgb(240, 240, 240)">
                    <h4>Tambah guru</h4>
                </div>

                <div class="card-body">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    
                    <form method="POST" action="{{ route('list-guru.store_guru') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" id="nama" name="nama" placeholder="Nama" class="form-control" required>
                        </div>


                        <div class="form-group">
                            <label for="mapel">Mata Pelajaran</label>
                            <select id="mapel" name="mapel" class="form-control" required>
                                <option></option>
                                @foreach($mapel as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_mapel }}</option>
                                @endforeach                            
                            </select>
                        </div>

                        <div class="text-center">
                        <button type="submit" class="btn btn-primary bg-gradient-dark w-100 my-4 mb-2">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection