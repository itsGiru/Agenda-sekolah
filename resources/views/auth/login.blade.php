@extends('layouts.app')

@section('content')
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('img/bg/bg2.jpg'); background-position: center;">
            <span class="mask bg-gradient-dark opacity-6"></span>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5 text-center mx-auto">
                        <h1 class="text-white mb-2 mt-5">Sampurasun!</h1>
                        <h5 class="text-lead text-white">Agenda Harian SMK Negeri 2 Purwakarta</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n11 mt-n10 justify-content-center">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0" style="background-color: rgb(234, 234, 234)">
                        <div class="card-header text-center pt-4" style="background-color: rgb(234, 234, 234)">
                            <h4 class="font-weight-bolder">Masuk</h4>
                            <p class="mb-0">Silahkan Login Terlebih Dahulu</p>
                        </div>
                        <div class="card-body">
                            <form role="form" method="POST" action="{{ route('login.perform') }}">
                                @csrf
                                @method('post')
                                <div class="flex flex-col mb-3">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" aria-label="Email">
                                </div>
                                <div class="flex flex-col mb-3">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg" aria-label="Password" placeholder="Password">
                                    <span  class="password-toggle-log" onclick="togglePasswordVisibility()"><i id="password-icon" class="fas fa-eye-slash"></i></span>
                                    @error('password') <p class="text-danger text-xs pt-1"> {{$message}} </p>@enderror
                                </div>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe">Ingat saya</label>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Masuk</button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                            <p class="mb-1 text-sm mx-auto">
                                Lupa password? Reset
                                <a href="{{ route('reset-password') }}" class="text-primary text-gradient font-weight-bold">disini</a>
                            </p>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
    @include('layouts.footers.guest.footer')

    <script>
        var passwordInput = document.getElementById('password');
        var passwordIcon = document.getElementById('password-icon');
    
        function togglePasswordVisibility() {
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                passwordIcon.classList.remove('fa-eye-slash');
                passwordIcon.classList.add('fa-eye');
            } else {
                passwordInput.type = 'password';
                passwordIcon.classList.remove('fa-eye');
                passwordIcon.classList.add('fa-eye-slash');
            }
        }
    </script>

@endsection



