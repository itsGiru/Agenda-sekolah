@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Kehadiran Siswa'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240); border-block-color: inherit">
                <div class="card-header" style="background-color:  rgb(240, 240, 240)">
                    <h4>Kehadiran Siswa</h4>
                </div>
                <div class="card-body">
                  <form action="#" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                      <label>Nama Siswa</label>
                      <select class="form-select form-control" name="id_guru">
                          <option selected></option>
                      </select>
                  </div>
  
                  <div class="form-group">
                      <label>Sakit/Izin/Alfa/Dispensasi</label>
                      <select class="form-select form-control" name="mapel">
                          <option selected></option>
                      </select>
                  </div>
  
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Keterangan</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
  
  
  

                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>


            </div>
        </div>
    </div>
</div>


@endsection