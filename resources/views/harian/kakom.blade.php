@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'List Laporan Harian'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3>List Laporan Harian</h3>
                    <h6>Hari, Tanggal : {{ ((request()->tanggal) ? \Carbon\Carbon::parse(request()->tanggal)->translatedFormat('l, j F Y') : \Carbon\Carbon::now()->translatedFormat('l, j F Y')) }}</h6>
                </div>
                <div class="card-body p-0">
                    <form action="" method="GET">
                        <div class="row justify-content-between align-items-center mb-4 mx-3">
                            <div class="col">
                                <div class="mb-2">
                                    <input type="date" name="tanggal" class="form-control" style="width: auto;" value="{{ request()->tanggal ?? date('Y-m-d') }}" />
                                </div>
                                <div class="col">
                                    <div class="mb-2">
                                        <select name="kelas" class="form-control">
                                            <option value="">Pilih Kelas</option>
                                            @foreach($kelasCollection as $item)
                                                <option value="{{ $item->id }}" {{ ($item->id==request()->kelas) ? 'selected' : null }}>{{ $item->tingkat }} {{ $item->kelas }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" type="submit">Cari</button>
                                </div>
                                <div id="alert">
                                  @include('components.alert')
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="nav-wrapper position-relative end-0 mx-1">
                      @if (request()->tanggal && request()->kelas)
                        <ul class="nav nav-pills nav-fill p-1" role="tablist">
                          <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#tab-siswa" role="tab" aria-controls="preview" aria-selected="true">
                            <i class="ni ni-badge text-sm me-2"></i> Siswa
                            </a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#tab-guru" role="tab" aria-controls="code" aria-selected="false">
                              <i class="ni ni-laptop text-sm me-2"></i> Guru
                            </a>
                          </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane p-3 fade show active" id="tab-siswa">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                      <thead>
                                        <tr>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder">Nama Siswa</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder">S, I, A, Dispensasi</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder">Keterangan</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse ($absenSiswa as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->siswa->nama }}</td>
                                            <td class="text-center">{{ $item->absensi }}</td>
                                            <td class="text-center">{{ $item->keterangan }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                          <td colspan="4" class="text-center">Belum ada Data</td>
                                        </tr>
                                        @endforelse
                                      </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane p-3 fade" id="tab-guru">
                                <div class="table-responsive">
                                    <table class="table align-items-center mb-0">
                                      <thead>
                                        <tr>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder">Nama Guru</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder">Mata Pelajaran</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder">Kehadiran</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder">Materi / Tugas</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse ($absenGuru as $item)
                                        <tr>
                                            <td class="text-center">{{ $item->jadwal->guruMapel->guru->nama }}</td>
                                            <td class="text-center">{{ $item->jadwal->guruMapel->mapel->nama_mapel }}</td>
                                            <td class="text-center">{{ $item->keterangan }}</td>
                                            <td class="text-center">{{ $item->tugasmateri }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                          <td colspan="4" class="text-center">Belum ada Data</td>
                                        </tr>
                                        @endforelse
                                        
                                      </tbody>
                                    </table>

                            </div>
                        </div>
                      </div>
                      @endif
                </div>
                
            </div>
        </div>
    </div>
@include('layouts.footers.auth.footer')
@endsection

