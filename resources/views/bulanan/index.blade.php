@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'List Laporan Bulanan'])
<div class="row mt-4 mx-4">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h3>List Laporan Bulanan</h3>
            </div>
            <div class="card-body p-0">
                <form action="" method="GET">
                    <div class="row justify-content-between align-items-center mb-4 mx-3">
                        <div class="col">
                            <div class="mb-2">
                                <input type="date" name="tanggal" class="form-control" style="width: auto;" value="{{ now() }}" />
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
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">Bulan</th>
                                <th class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($bulananSiswa as $item)
                          <tr>
                            <td class="text-center">{{ \Carbon\Carbon::parse('01-'.$item->new_date)->isoFormat('MMMM Y') }}</td>
                            <td class="text-center">
                              <a href="{{ route('bulanan.show', $item->new_date) }}" class="btn btn-warning">Detail</a>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@include('layouts.footers.auth.footer')
@endsection
