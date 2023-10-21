@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => Carbon\Carbon::now()->isWeekend() ? 'Kehadiran Guru' : 'Kehadiran Guru'])

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240); border-block-color: inherit">
                <div class="card-header" style="background-color: rgb(240, 240, 240)">
                    <h4>{{ Carbon\Carbon::now()->isWeekend() ? 'Kehadiran Guru Hari Ini' : 'Kehadiran Guru Hari Ini' }}</h4>
                </div>
                <div id="alert">
                    @include('components.alert')
                </div>
                <div class="card-body">
                    @if (Carbon\Carbon::now()->isWeekend())
                    <h3 class="text-center">Maaf, hari ini adalah hari libur.</h3>
                    @else
                    <form action="{{ route('absen_guru.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Nama Guru & Mata Pelajaran</label>
                            <select class="form-select form-control" name="jadwal">
                                <option selected></option>
                                @foreach ($jadwal as $item)
                                    <option value="{{ $item->id }}">{{ $item->guruMapel->guru->nama }} - {{ $item->guruMapel->mapel->nama_mapel }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Kehadiran</label>
                            <select class="form-select form-control" name="keterangan">
                                <option selected></option>
                                @foreach ($keterangan as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group" id="materi-form" style="display: none;">
                            <label class="form-label">Materi / Tugas</label>
                            <textarea name="materi" class="form-control"></textarea>
                        </div>

                        <br>
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
    // Ambil elemen dropdown kehadiran
    var kehadiranDropdown = document.querySelector('select[name="keterangan"]');

    // Ambil elemen form materi
    var materiForm = document.getElementById('materi-form');

    // Tambahkan event listener untuk mengubah visibilitas form materi saat dropdown kehadiran berubah
    kehadiranDropdown.addEventListener('change', function () {
        console.log(kehadiranDropdown);
        if (kehadiranDropdown.value === 'Hadir' || kehadiranDropdown.value === 'Penugasan') { // Jika pilihan adalah "Hadir"
            materiForm.style.display = 'block'; // Tampilkan form materi
        } else {
            materiForm.style.display = 'none'; // Sembunyikan form materi
        }
    });
</script>
@endpush
