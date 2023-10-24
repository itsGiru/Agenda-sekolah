@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'List Laporan Harian'])
    <div class="row mt-4 mx-4">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h3>Detail Laporan Bulan {{ \Carbon\Carbon::parse('01-'.request()->bulan)->isoFormat('MMMM ') }}
                      @php
                      $kelas = App\Models\Kelas::find(Auth::user()->id_kelas);
                      if ($kelas) {
                          echo $kelas->tingkat;
                          echo " ";
                          echo $kelas->kelas;
                      }
                      @endphp
                    </h3>
                </div>
                <div class="card-body p-0">
                    <form action="" method="GET">
                        <div class="row justify-content-between align-items-center mb-4 mx-3">
                            <div class="col">
                                <div id="alert">
                                  @include('components.alert')
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="nav-wrapper position-relative end-0 mx-1">
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
                                          <th class="text-center text-uppercase text-xs font-weight-bolder" rowspan="2">No</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder" rowspan="2">Nama Siswa</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder" colspan="4">Jumlah Keterangan Per Bulan</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center text-uppercase text-xs font-weight-bolder">Sakit</th>
                                            <th class="text-center text-uppercase text-xs font-weight-bolder">Izin</th>
                                            <th class="text-center text-uppercase text-xs font-weight-bolder">Alpa</th>
                                            <th class="text-center text-uppercase text-xs font-weight-bolder">Dispensasi</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse ($absenSiswas as $item)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td class="text-center">{{ $item->siswa->nama }}</td>
                                            <td class="text-center">{{ $item->sakit }}</td>
                                            <td class="text-center">{{ $item->izin }}</td>
                                            <td class="text-center">{{ $item->alpa }}</td>
                                            <td class="text-center">{{ $item->dispensasi }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                          <td colspan="6" class="text-center fs-5">Belum ada Data</td>
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
                                          <th class="text-center text-uppercase text-xs font-weight-bolder" rowspan="2">No</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder" rowspan="2">Nama Guru</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder" rowspan="2">Mata Pelajaran</th>
                                          <th class="text-center text-uppercase text-xs font-weight-bolder" colspan="3">Jumlah Keterangan Per Bulan</th>
                                        </tr>
                                        <tr>
                                            <th class="text-center text-uppercase text-xs font-weight-bolder">Masuk Kelas</th>
                                            <th class="text-center text-uppercase text-xs font-weight-bolder">Penugasan</th>
                                            <th class="text-center text-uppercase text-xs font-weight-bolder">Absen & Tidak Ada Tugas</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @forelse ($absenGurus as $item)
                                        <tr>
                                          <td class="text-center">{{ $loop->iteration }}</td>
                                          <td class="text-center">{{ $item->jadwal->gurumapel->guru->nama }}</td>
                                          <td class="text-center">{{ $item->jadwal->gurumapel->mapel->nama_mapel }}</td>
                                          <td class="text-center">{{ $item->hadir }}</td>
                                          <td class="text-center">{{ $item->penugasan }}</td>
                                          <td class="text-center">{{ $item->tidakhadir }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                          <td colspan="6" class="text-center fs-5">Belum ada Data</td>
                                        </tr>
                                        @endforelse
                                      </tbody>
                                    </table>

                            </div>
                        </div>
                      </div>
                </div>
                
            </div>
        </div>
    </div>
@include('layouts.footers.auth.footer')
@endsection

