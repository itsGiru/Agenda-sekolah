<?php

namespace App\Models;

//  use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'city',
        'province',
        'postal',
        'about',
        'profile_image',
        'no_wa',
        'jurusan',
        'kelas',

    ];
    const JURUSAN = [
        'Pilih Jurusan' => 'Pilih Jurusan',
        'Rekayasa Perangkat Lunak' => 'Rekayasa Perangkat Lunak',
        'Tata Busana' => 'Tata Busana',
    ];
    const KELAS = [
        'Pilih Jurusan Dahulu' => 'Pilih Jurusan Dahulu',
        'XII RPL 1' => 'XII RPL 1',
        'XII RPL 2' => 'XII RPL 2',
        'XII TB 1' => 'XII TB 1',
        'XII TB 2' => 'XII TB 2',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProfileImageURL()
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        } else {
            return asset('img/donat.jpg'); // Ganti dengan path gambar default yang sesuai
        }
    }
}