@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Tambah Jadwal'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240); border-block-color: inherit">
                <div class="card-header" style="background-color:  rgb(240, 240, 240)">
                    <h4>Tambah Jadwal</h4>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>

                <div class="card-body">
                    @foreach ($errors->all() as $error)
                    {{ $error }}
                    @endforeach
                    <form action="{{ route('jadwal.store') }}" method="POST">
                        @csrf
                    
                        <div class="form-group">
                            <label for="hari">Hari :</label>
                            <select name="hari" id="hari" class="form-control">
                                <option></option>
                                @foreach([
                                    'Mon' => 'Senin',
                                    'Tue' => 'Selasa',
                                    'Wed' => 'Rabu',
                                    'Thu' => 'Kamis',
                                    'Fri' => 'Jum`at',
                                ] as $key=>$item)
                                <option value="{{ $key }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <div class="form-group">
                            <label for="mapel">Mata Pelajaran :</label>
                            <select name="mapel" id="mapel" class="form-control">
                                @foreach ($list as $item)
                                <option value="{{ $item->id }}">{{ $item->guru->nama }} - {{ $item->mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Tambah Jadwal</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection