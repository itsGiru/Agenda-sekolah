<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
<<<<<<< HEAD
    protected $table = 'siswa';

    use HasFactory;

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'id_kelas');
    }
=======
    use HasFactory;
>>>>>>> 37c50e3f56d1051223ade0ec29e862088b2aad61
}
