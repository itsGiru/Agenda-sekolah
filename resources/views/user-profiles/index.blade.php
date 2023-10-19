@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Profil'])
    <div class="card shadow-lg mx-4 card-profile-bottom">
        <div class="card-body p-3">
            <div class="row gx-4">
                <div class="col-auto">
                    <div class="avatar avatar-xl position-relative">
                        <img src="{{ auth()->user()->getProfileImageURL() }}" alt="profile_image"
                            class="w-100 border-radius-lg shadow-sm">
                    </div>
                </div>
                <div class="col my-auto">
                    <div class="h-100">
                        <h5 class="mb-1">
                            {{ auth()->user()->name ?? 'Lorem Ipsum' }}
                        </h5> 
                    </div>
                </div>
                <div class="col-auto my-auto">
                    @if (auth()->user()->profile_image)
                        <form action="{{ route('delete-profile-image') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm mt-2">Hapus Foto Profil</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="container-fluid py-4">
        <div class="row">
            <div>
                <div class="card">
                    <form role="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header pb-0">
                            <div class="d-flex align-items-center">
                                <p class="mb-0">Edit Profil</p>
                                <button type="submit" class="btn btn-primary btn-sm ms-auto">Simpan</button>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="text-uppercase text-sm">Informasi Akun</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Nama</label>
                                        <input class="form-control" type="text" name="name"
                                            value="{{ old('name', auth()->user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="example-text-input" class="form-control-label">Alamat Email</label>
                                        <input class="form-control" type="email" name="email"
                                            value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <form role="form" method="POST" action="{{ route('profile.update') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <!-- Field lainnya -->
                                            <div class="form-group">
                                                <label for="profile_image" class="form-control-label">Foto Profil</label>
                                                <input type="file" name="profile_image" class="form-control">
                                            </div>
                                            <!-- Tombol Simpan dan lainnya -->
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth.footer')
    </div>
@endsection
