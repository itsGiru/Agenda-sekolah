<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        

    ];

    public function gurumapel(){
        return $this->hasMany(GuruMapel::class,'id_guru');
    }
}
