@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'List Siswa'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3>List Laporan Harian</h3>
                    <div class="row justify-content-between align-items-center" style="margin-top: 20px">
                        <h6>Dari Tanggal</h6>
                        <div class="col">
                            <div class="mb-2"> <!-- Tambahkan margin-bottom untuk elemen tanggal -->
                                <input type="date" name="start_date" class="form-control" style="width: auto;" value="{{ request('start_date') }}" />
                            </div>
                            <h6>Sampai Tanggal</h6>
                            <div class="mb-2"> <!-- Tambahkan margin-bottom untuk elemen tanggal -->
                                <input type="date" name="end_date" class="form-control" style="width: auto;" value="{{ request('end_date') }}" />
                            </div>
                            <div>
                                <button class="btn btn-outline-primary">Cari</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Tanggal</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
@include('layouts.footers.auth.footer')
@endsection

