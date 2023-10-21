<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $guarded = [
        'id'
    ];

    use HasFactory;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function absen()
    {
        return $this->hasMany(AbsenSiswa::class, 'id_siswa');
    }

    public function scopeBelumLulus($query) {
        $query->where('lulus', '0');
    }
}
