<?php

namespace App\Http\Controllers;

use App\Models\AbsenGuru;
use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanHarianController extends Controller
{
    public function index()
    {
        $absenSiswa=AbsenSiswa::with(['siswa' =>function($query){
            $query->where('id_kelas', Auth::user()->id_kelas);
        }]);

        $absenGuru=AbsenGuru::with(['jadwal' =>function($query){
            $query->where('id_kelas', Auth::user()->id_kelas);
        }]);
        if (request()->tanggal !='') {
            $absenSiswa=$absenSiswa->whereDate('created_at', request()->tanggal)->get();
            $absenGuru=$absenGuru->whereDate('created_at', request()->tanggal)->get();
        } else {
            $absenSiswa=$absenSiswa->whereDate('created_at', now())->get();
            $absenGuru=$absenGuru->whereDate('created_at', now())->get();
        }
        return view('harian.index', compact('absenSiswa', 'absenGuru'));
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
    
        return redirect()->back()->with('success', 'Kehadiran Siswa berhasil dihapus.');
    }

    public function deleteGuru($id)
    {  
        $absenGuru = AbsenGuru::find($id);
    
        $absenGuru->delete();
    
        return redirect()->back()->with('success', 'Kehadiran Guru berhasil dihapus.');   
    }
}
