<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_mapel',
        

    ];

    public function jadwals()
    {
        return $this->hasMany(Jadwal::class, 'id_mapel');
    }


    public function guruMapel(){
        return $this->hasMany(GuruMapel::class,'id_guru_mapels');
    }
}
