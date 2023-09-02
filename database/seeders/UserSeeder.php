<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate([
            'name' => 'Fatih Firdaus'
        ], [
            'name' => 'Fatih Firdaus',
            'email' => 'fatih@gmail.com',
            'password' => bcrypt('admin123'),
            'address' => 'Perum bumi jaya indah BLOK AR-24',
            'city' => 'Purwakarta',
            'province' => 'Jawa Barat',
            'postal' => '41118',
            'about' => 'Hello world',
            'role' => 1,
        ]);
    }
}
