@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Kehadiran Guru'])
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: rgb(240, 240, 240); border-block-color: inherit">
                <div class="card-header" style="background-color:  rgb(240, 240, 240)">
                    <h4>Kehadiran Guru</h4>
                </div>
                <div class="card-body">
                  <form action="#" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label>Jam Ke</label>
                    <select class="form-select form-control" name="jam">
                        <option selected></option>
                    </select>
                </div>
                  <div class="form-group">
                      <label>Nama Guru</label>
                      <select class="form-select form-control" name="id_guru">
                          <option selected></option>
                      </select>
                  </div>
  
                  <div class="form-group">
                      <label>Mapel</label>
                      <select class="form-select form-control" name="mapel">
                          <option selected></option>
                      </select>
                  </div>
  
                  <div class="form-group">
                      <label class="form-label">Materi</label>
                      <input type="text" name="materi"  class="form-control">
                  </div>
                  
                  <br>
                  <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
              </div>


            </div>
        </div>
    </div>
</div>


@endsection