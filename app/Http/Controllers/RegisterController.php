<?php

namespace App\Http\Controllers;

// use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'role' => 'required'
        ]);

        $attributes['password'] = bcrypt(request('password')); // Enkripsi password
        if ($attributes ['role']=='2' || $attributes ['role']=='3'){
            $attributes ['id_jurusan'] ='required';
            $attributes ['id_kelas'] ='required';
        }
        elseif ($attributes ['role']=='4') {
            $attributes ['id_jurusan'] = 'required';
        }

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/dashboard');
    }
}