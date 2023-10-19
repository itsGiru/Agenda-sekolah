<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsenSiswaController extends Controller
{
    public function index()
    {
        $siswa=Siswa::where('id_kelas', Auth::user()->id_kelas)->where('lulus', 0)->get();
        $keterangan= [
            'Sakit',
            'Izin',
            'Alpa',
            'Dispensasi'
        ];
        
        return view('absen_siswa.index', compact('siswa', 'keterangan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'absensi' => 'required'
        ]);
        $siswa=Siswa::where('id', $request->nama)->first();

        $absen=AbsenSiswa::create([
            'id_siswa'=>$siswa->id,
            'id_kelas'=>$siswa->id_kelas,
            'absensi'=>$request->absensi,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('absen_siswa.index')->with('success', 'Berhasil menambahkan data kehadiran Siswa');

    }

    public function isWeekend() {
        $today = Carbon::now()->dayOfWeek; // Mendapatkan hari dalam bentuk angka (0 untuk Minggu, 6 untuk Sabtu)
        return $today >= 5; // Jika hari adalah Sabtu (5) atau Minggu (6), return true, sebaliknya false.
    }

    public function showForm(Request $request) {
        $isWeekend = $this->isWeekend();
    
        return view('absen_siswa.index', compact('isWeekend'));
    }

}
