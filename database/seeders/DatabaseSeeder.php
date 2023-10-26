<?php

namespace Database\Seeders;

use App\Models\Kelas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(JurusanSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(UserSeeder::class);

    }
}
