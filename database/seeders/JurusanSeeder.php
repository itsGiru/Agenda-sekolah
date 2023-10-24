<?php

namespace Database\Seeders;

use App\Models\Jurusan;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        Jurusan::insert([
            ['jurusan' => 'Rekayasa Perangkat Lunak'],
            ['jurusan' => 'Teknik Komputer dan Jaringan'],
            ['jurusan' => 'Otomatisasi Tata Kelola Perkantoran'],
            ['jurusan' => 'Bisnis Daring dan Pemasaran'],
            ['jurusan' => 'Akuntansi Keuangan Lembaga'],
            ['jurusan' => 'Tata Busana'],
        ]);
    }
}
