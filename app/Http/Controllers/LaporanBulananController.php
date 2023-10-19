<?php

namespace App\Http\Controllers;

use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanBulananController extends Controller
{
    public function index()
    {
        $bulananSiswa=AbsenSiswa::select(DB::raw('count(id) as data'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
        ->groupby('year', 'month')->get();
        return view('bulanan.index', compact('bulananSiswa'));
    }

    public function show($bulan)
    {
        $date=explode('-', $bulan);
        $date_bulan=$date[0];
        $date_tahun=$date[1];
        $absenSiswas = AbsenSiswa::with('siswa')
        ->whereMonth('created_at', $date_bulan)
        ->whereYear('created_at', $date_tahun)
        ->groupBy('id_siswa')
        ->get();
    
        $absenSiswas->each(function ($absenSiswa) {
            $absenSiswa->sakit = $absenSiswa->where('absensi', 'Sakit')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->alpa = $absenSiswa->where('absensi', 'Alpa')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->izin = $absenSiswa->where('absensi', 'Izin')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->dispensasi = $absenSiswa->where('absensi', 'Dispensasi')->where('id_siswa', $absenSiswa->id_siswa)->count();
        });
    
    // Now, $absenSiswas collection contains the counts for each type of absensi for each id_siswa
    

        return view('bulanan.show', compact('absenSiswas'));

    }
}
