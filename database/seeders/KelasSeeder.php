<?php

namespace Database\Seeders;

use App\Models\Kelas;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::create([
            'kelas' => 'XII RPL 1',
            'id_jurusan' => 1,
        ]);
    }
}
