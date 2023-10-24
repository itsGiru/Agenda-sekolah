<?php

namespace Database\Seeders;

use App\Models\Kelas;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Kelas::insert([
            //12 RPL
            [
                'tingkat' => '12',
                'kelas' => 'RPL 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'RPL 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'RPL 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'RPL 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'RPL 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],

            //11 RPL
            [
                'tingkat' => '11',
                'kelas' => 'RPL 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'RPL 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'RPL 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'RPL 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'RPL 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],

            //10 RPL
            [
                'tingkat' => '10',
                'kelas' => 'RPL 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'RPL 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'RPL 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'RPL 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'RPL 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Rekayasa Perangkat Lunak')->first()->id,
            ],

            //12 TKJ
            [
                'tingkat' => '12',
                'kelas' => 'TKJ 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TKJ 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TKJ 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TKJ 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TKJ 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],

            //11 TKJ
            [
                'tingkat' => '11',
                'kelas' => 'TKJ 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TKJ 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TKJ 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TKJ 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TKJ 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],

            //10 TKJ
            [
                'tingkat' => '10',
                'kelas' => 'TKJ 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TKJ 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TKJ 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TKJ 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TKJ 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Teknik Komputer dan Jaringan')->first()->id,
            ],



            //12 OTKP
            [
                'tingkat' => '12',
                'kelas' => 'OTKP 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'OTKP 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'OTKP 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'OTKP 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'OTKP 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],

            //11 OTKP
            [
                'tingkat' => '11',
                'kelas' => 'OTKP 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'OTKP 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'OTKP 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'OTKP 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'OTKP 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],

            //10 OTKP
            [
                'tingkat' => '10',
                'kelas' => 'OTKP 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'OTKP 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'OTKP 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'OTKP 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'OTKP 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Otomatisasi Tata Kelola Perkantoran')->first()->id,
            ],

            //12 BDP
            [
                'tingkat' => '12',
                'kelas' => 'BDP 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'BDP 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'BDP 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'BDP 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'BDP 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],

            //11 BDP
            [
                'tingkat' => '11',
                'kelas' => 'BDP 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'BDP 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'BDP 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'BDP 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'BDP 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],

            //10 BDP
            [
                'tingkat' => '10',
                'kelas' => 'BDP 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'BDP 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'BDP 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'BDP 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'BDP 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Bisnis Daring dan Pemasaran')->first()->id,
            ],

            //12 AKL
            [
                'tingkat' => '12',
                'kelas' => 'AKL 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'AKL 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'AKL 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'AKL 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'AKL 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],

            //11 AKL
            [
                'tingkat' => '11',
                'kelas' => 'AKL 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'AKL 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'AKL 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'AKL 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'AKL 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],

            //10 AKL
            [
                'tingkat' => '10',
                'kelas' => 'AKL 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'AKL 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'AKL 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'AKL 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'AKL 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Akuntansi Keuangan Lembaga')->first()->id,
            ],

            //12 TB
            [
                'tingkat' => '12',
                'kelas' => 'TB 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TB 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TB 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TB 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '12',
                'kelas' => 'TB 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],

            //11 TB
            [
                'tingkat' => '11',
                'kelas' => 'TB 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TB 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TB 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TB 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '11',
                'kelas' => 'TB 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],

            //10 TB
            [
                'tingkat' => '10',
                'kelas' => 'TB 1',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TB 2',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TB 3',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TB 4',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
            [
                'tingkat' => '10',
                'kelas' => 'TB 5',
                'id_jurusan' => Jurusan::where('jurusan', 'Tata Busana')->first()->id,
            ],
        ]);
    }
}
