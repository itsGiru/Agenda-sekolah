@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Edit User'])
    <div class="card-body">
        <div class="row">
            <div class="col-md-2">
            </div>
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit User untuk {{ $edit->name }}</h3>
                    </div>
                    <form role="form" action="{{ URL::to('/update_user/' . $edit->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @php
                                    
                                    if ($edit->role == 1) {
                                        echo 'Izin saat ini adalah : <b>Admin</b>';
                                    }
                                    if ($edit->role == 2) {
                                        echo 'Izin saat ini adalah : <b>Ketua murid</b>';
                                    }
                                    if ($edit->role == 3) {
                                        echo 'Izin saat ini adalah : <b>Walas</b>';
                                    }
                                    if ($edit->role == 4) {
                                        echo 'Izin saat ini adalah : <b>Kakom</b>';
                                    }
                                    if ($edit->role == 5) {
                                        echo 'Izin saat ini adalah : <b>Tidak ada role</b>';
                                    }
                                    if ($edit->role == 6) {
                                        echo 'Izin saat ini adalah : <b>Pending</b>';
                                    }
                                    
                                @endphp
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Ubah Izin</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="role">
                                    <option value="1">Admin</option>
                                    <option value="2">Ketua murid</option>
                                    <option value="3">Walas</option>
                                    <option value="4">Kakom</option>
                                    <option value="5">Tidak ada role</option>
                                    <option value="6">Cabut izin</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2">
            </div>
        </div>
    </div> 
@endsection
