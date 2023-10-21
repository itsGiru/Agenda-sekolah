@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => Carbon\Carbon::now()->isWeekend() ? 'Kehadiran Siswa' : 'Kehadiran Siswa'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240); border-block-color: inherit">
                <div class="card-header" style="background-color: rgb(240, 240, 240)">
                    @php
                    $today = Carbon\Carbon::now();
                    @endphp
                    <h4>{{ $today->isWeekend() ? 'Kehadiran Siswa Hari Ini' : 'Kehadiran Siswa Hari Ini' }}</h4>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body">
                    @if ($today->isWeekend())
                    <h3 class="text-center">Maaf, hari ini adalah hari libur.</h3>
                    @else
                    <form action="{{ route('absen_siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Siswa</label>
                            <select class="form-select form-control" name="nama">
                                <option selected></option>
                                @foreach ($siswa as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Sakit/Izin/Alfa/Dispensasi</label>
                            <select class="form-select form-control" name="absensi">
                                <option selected></option>
                                @foreach ($keterangan as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="keterangan-form" style="display: none">
                            <label for="exampleFormControlTextarea1">Keterangan</label>
                            <textarea name="keterangan" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('js')
    <script>
            var kehadiranDropdown = document.querySelector('select[name="absensi"]');

            var ketForm = document.getElementById('keterangan-form');

            kehadiranDropdown.addEventListener('change', function () {
        console.log(kehadiranDropdown);
        if (kehadiranDropdown.value === 'Izin' || kehadiranDropdown.value === 'Sakit' || kehadiranDropdown.value === 'Dispensasi') { 
            ketForm.style.display = 'block';
        } else {
            ketForm.style.display = 'none';
        }
    });
    </script>
@endpush
