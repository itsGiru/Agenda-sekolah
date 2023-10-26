<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Jurusan;
use App\Models\AbsenGuru;
use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanHarianController extends Controller
{
    public function index()
    {
        $kelasCollection = Kelas::where('id_jurusan', Auth::user()->id_jurusan)->pluck('id', 'id');

        $absenSiswa = AbsenSiswa::whereHas('siswa', function ($query) {
            $query->where('id_kelas', Auth::user()->id_kelas);
        });

        $absenGuru = AbsenGuru::whereHas('jadwal', function ($query) {
            $query->where('id_kelas', Auth::user()->id_kelas);
        });

        if (request()->tanggal != '') {
            $absenSiswa = $absenSiswa->whereDate('created_at', request()->tanggal)->get();
            $absenGuru = $absenGuru->whereDate('created_at', request()->tanggal)->get();
        } else {
            $absenSiswa = $absenSiswa->whereDate('created_at', now())->get();
            $absenGuru = $absenGuru->whereDate('created_at', now())->get();
        }

        return view('harian.index', compact('absenSiswa', 'absenGuru'));
    }

    public function kakom()
    {
        $kelasCollection =  Jurusan::whereHas('kelas')
        ->with(['kelas' => function($query) {
            $query->orderByRaw('kelas, tingkat DESC');
        }])
        ->where('id', auth()->user()->id_jurusan)
        ->get();

        $absenSiswa=AbsenSiswa::whereHas('siswa', function($query){
            $query->where('id_kelas', request()->kelas);
        });

        $absenGuru = AbsenGuru::whereHas('jadwal', function ($query) {
            $query->where('id_kelas', request()->kelas);
        });

        if (request()->tanggal != '') {
            $absenSiswa = $absenSiswa->whereDate('created_at', request()->tanggal)->get();
            $absenGuru = $absenGuru->whereDate('created_at', request()->tanggal)->get();
        } else {
            $absenSiswa = $absenSiswa->whereDate('created_at', now())->get();
            $absenGuru = $absenGuru->whereDate('created_at', now())->get();
        }
        return view('harian.kakom', compact('kelasCollection', 'absenSiswa', 'absenGuru'));
    }


    public function create()
    {
        return view('harian.create');
    }

    public function show()
    {
        return view('harian.show');
    }

    public function deleteSiswa($id)
    {
        $absenSiswa = AbsenSiswa::find($id);
    
        $absenSiswa->delete();
    
        return redirect()->back()->with('success', 'Data Kehadiran Siswa berhasil dihapus.');
    }

    public function deleteGuru($id)
    {  
        $absenGuru = AbsenGuru::find($id);
    
        $absenGuru->delete();
    
        return redirect()->back()->with('success', 'Data Kehadiran Guru berhasil dihapus.');   
    }
}
