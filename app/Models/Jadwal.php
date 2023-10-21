<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];


    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'id_mapel');
    }

    public function guruMapel()
    {
        return $this->belongsTo(GuruMapel::class, 'id_guru_mapels');
    }

    public function hari()
    {
        return $this->belongsTo(Hari::class, 'id_hari');
    }

    public function guru()
{
    return $this->belongsTo(Guru::class, 'id_guru');
}

public function absen()
{
    return $this->hasMany(AbsenGuru::class, 'id_jadwal');
}

}
