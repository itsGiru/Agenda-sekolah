<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\AbsenGuru;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsenGuruController extends Controller
{
    public function index()
    {
        $jadwal=Jadwal::where('id_kelas', Auth::user()->id_kelas)->where('hari', date('D'))->whereDoesntHave('absen', function($query){
            $query->whereDay('created_at',  now()->day);
        })->get();
        $keterangan=[
            'Hadir',
            'Penugasan',
            'Tidak Hadir'
        ];
        return view('absen_guru.iindex', compact('jadwal', 'keterangan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jadwal' => 'required',
            'keterangan' => 'required'
        ]);

        $absen=AbsenGuru::create([
            'id_jadwal'=>$request->jadwal,
            'keterangan'=>$request->keterangan,
            'tugasmateri'=>$request->materi,
        ]);

    
        return redirect()->route('absen_guru.index')->with('success', 'Berhasil menambahkan data kehadiran Guru');
    }

    public function isWeekend() {
        $today = Carbon::now()->dayOfWeek; // Mendapatkan hari dalam bentuk angka (0 untuk Minggu, 6 untuk Sabtu)
        return $today >= 5; // Jika hari adalah Sabtu (5) atau Minggu (6), return true, sebaliknya false.
    }

    public function showForm(Request $request) {
        $isWeekend = $this->isWeekend();
    
        return view('absen_guru.index', compact('isWeekend'));
    }
}
