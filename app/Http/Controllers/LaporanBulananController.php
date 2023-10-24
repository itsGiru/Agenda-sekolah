<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Barryvdh\DomPDF\PDF;
use App\Models\AbsenGuru;
use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LaporanBulananController extends Controller
{
    public function index()
    {
        $kelasKakom = [];

        // Jika pengguna adalah Kakom (role 4), ambil daftar kelas Kakom
        if (auth()->user()->role == 4) {
            $kelasKakom = Kelas::where('id_jurusan')->get();
        }

        $bulananSiswa=AbsenSiswa::select(DB::raw('count(id) as data'), DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"), DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
        ->groupby('year', 'month')->get();
        return view('bulanan.iindex', compact('bulananSiswa', 'kelasKakom'));
    }

    public function show($bulan)
    {
        $date=explode('-', $bulan);
        $date_bulan=$date[0];
        $date_tahun=$date[1];
        $absenSiswas = AbsenSiswa::whereHas('siswa', function ($query) {
            $query->where('id_kelas', Auth::user()->id_kelas);
        })
        ->whereMonth('created_at', $date_bulan)
        ->whereYear('created_at', $date_tahun)
        ->groupBy('id_siswa')
        ->get();
        $absenGurus = AbsenGuru::join('jadwals', 'absen_gurus.id_jadwal', '=', 'jadwals.id')
        ->join('guru_mapels', 'jadwals.id_guru_mapels', '=', 'guru_mapels.id')
        ->whereHas('jadwal', function ($query) {
            $query->where('id_kelas', Auth::user()->id_kelas);
        })
        ->whereMonth('absen_gurus.created_at', $date_bulan)
        ->whereYear('absen_gurus.created_at', $date_tahun)
        ->groupBy('guru_mapels.id')
        ->get();
        // $absenGurus = AbsenGuru::join('jadwals', 'absen_gurus.id_jadwal', '=', 'jadwals.id')
        // ->select('absen_gurus.*', 'jadwals.id_guru_mapels')
        // ->whereMonth('absen_gurus.created_at', $date_bulan)
        // ->whereYear('absen_gurus.created_at', $date_tahun)
        // ->groupBy('jadwals.id_guru_mapels')
        // ->get();

        
    
        $absenSiswas->each(function ($absenSiswa) {
            $absenSiswa->sakit = $absenSiswa->where('absensi', 'Sakit')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->alpa = $absenSiswa->where('absensi', 'Alpa')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->izin = $absenSiswa->where('absensi', 'Izin')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->dispensasi = $absenSiswa->where('absensi', 'Dispensasi')->where('id_siswa', $absenSiswa->id_siswa)->count();
        });
        $absenGurus->each(function ($absenGuru) {
            $absenGuru->hadir = AbsenGuru::where('keterangan', 'Hadir')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
    
            $absenGuru->penugasan = AbsenGuru::where('keterangan', 'Penugasan')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
    
            $absenGuru->tidakhadir = AbsenGuru::where('keterangan', 'Tidak Hadir')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
        });
    
    
    // Now, $absenSiswas collection contains the counts for each type of absensi for each id_siswa
    

        return view('bulanan.show', compact('absenSiswas', 'absenGurus'));

    }

    public function kakom($bulan)
    {
        $kelasCollection = Kelas::where('id_jurusan', Auth::user()->id_jurusan)->get();

        $date=explode('-', $bulan);
        $date_bulan=$date[0];
        $date_tahun=$date[1];
        $absenSiswas = AbsenSiswa::with('siswa')
        ->where('id_kelas',request()->kelas)
        ->whereMonth('created_at', $date_bulan)
        ->whereYear('created_at', $date_tahun)
        ->groupBy('id_siswa')
        ->get();
        $absenGurus = AbsenGuru::join('jadwals', 'absen_gurus.id_jadwal', '=', 'jadwals.id')
        ->whereHas('jadwal', function($query){
            $query->where('id_kelas',request()->kelas)->groupBy('id_guru_mapels');
        })
        ->select('absen_gurus.*', 'jadwals.id_guru_mapels')
        ->whereMonth('absen_gurus.created_at', $date_bulan)
        ->whereYear('absen_gurus.created_at', $date_tahun)
        ->groupBy('jadwals.id_guru_mapels')
        ->get();
    
        $absenSiswas->each(function ($absenSiswa) {
            $absenSiswa->sakit = $absenSiswa->where('absensi', 'Sakit')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->alpa = $absenSiswa->where('absensi', 'Alpa')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->izin = $absenSiswa->where('absensi', 'Izin')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->dispensasi = $absenSiswa->where('absensi', 'Dispensasi')->where('id_siswa', $absenSiswa->id_siswa)->count();
        });
        $absenGurus->each(function ($absenGuru) {
            $absenGuru->hadir = AbsenGuru::where('keterangan', 'Hadir')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
    
            $absenGuru->penugasan = AbsenGuru::where('keterangan', 'Penugasan')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
    
            $absenGuru->tidakhadir = AbsenGuru::where('keterangan', 'Tidak Hadir')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
        });
    
    
    

        return view('bulanan.kakom', compact('absenSiswas', 'absenGurus', 'kelasCollection'));
    }

    public function cetak($bulan)
    {
        $idKelas = Auth::user()->id_kelas;
        $kelas = Kelas::find($idKelas);
        $date=explode('-', $bulan);
        $date_bulan=$date[0];
        $date_tahun=$date[1];
        $namaBulanIndonesia = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        $absenSiswas = AbsenSiswa::whereHas('siswa', function ($query) {
            $query->where('id_kelas', Auth::user()->id_kelas);
        })
        ->whereMonth('created_at', $date_bulan)
        ->whereYear('created_at', $date_tahun)
        ->groupBy('id_siswa')
        ->get();
        $absenGurus = AbsenGuru::join('jadwals', 'absen_gurus.id_jadwal', '=', 'jadwals.id')
        ->join('guru_mapels', 'jadwals.id_guru_mapels', '=', 'guru_mapels.id')
        ->select('absen_gurus.*', 'jadwals.id_guru_mapels')
        ->whereHas('jadwal', function ($query) {
            $query->where('id_kelas', Auth::user()->id_kelas);
        })
        ->whereMonth('absen_gurus.created_at', $date_bulan)
        ->whereYear('absen_gurus.created_at', $date_tahun)
        ->groupBy('jadwals.id_guru_mapels')
        ->get();

        
    
        $absenSiswas->each(function ($absenSiswa) {
            $absenSiswa->sakit = $absenSiswa->where('absensi', 'Sakit')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->alpa = $absenSiswa->where('absensi', 'Alpa')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->izin = $absenSiswa->where('absensi', 'Izin')->where('id_siswa', $absenSiswa->id_siswa)->count();
            $absenSiswa->dispensasi = $absenSiswa->where('absensi', 'Dispensasi')->where('id_siswa', $absenSiswa->id_siswa)->count();
        });
        $absenGurus->each(function ($absenGuru) {
            $absenGuru->hadir = AbsenGuru::where('keterangan', 'Hadir')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
    
            $absenGuru->penugasan = AbsenGuru::where('keterangan', 'Penugasan')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
    
            $absenGuru->tidakhadir = AbsenGuru::where('keterangan', 'Tidak Hadir')
            ->whereHas('jadwal', function ($query) use ($absenGuru) {
                $query->where('id_guru_mapels', $absenGuru->id_guru_mapels);
            })->count();
        });
    
    
    

        $pdf = app('dompdf.wrapper')->loadView('bulanan.ekspor', [
            'absenSiswas' => $absenSiswas,
            'absenGurus' => $absenGurus,
            'kelas' => $kelas,
        ]);
        $namaBulan = $namaBulanIndonesia[$date_bulan - 1];
        $filename = "Laporan Bulanan $namaBulan {$kelas->tingkat} {$kelas->kelas}.pdf";
    
        return $pdf->download($filename);

    }
}
