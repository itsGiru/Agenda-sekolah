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
        $siswa=Siswa::where('id_kelas', Auth::user()->id_kelas)->whereDoesntHave('absen' , function($query){
            $query->whereDay('created_at',  now()->day);
        })->where('lulus', 0)->get();
        $keterangan= [
            'Sakit',
            'Izin',
            'Alpa',
            'Dispensasi'
        ];
        
        return view('absen_siswa.iindex', compact('siswa', 'keterangan'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'absensi' => 'required'
        ]);
        $siswa=Siswa::where('id', $request->nama)->first();
        $checkAbsen=AbsenSiswa::where('id_siswa', $siswa->id)->whereDay('created_at', now()->day)->count();
        if ($checkAbsen==0) {


        AbsenSiswa::create([
            'id_siswa'=>$siswa->id,
            'id_kelas'=>$siswa->id_kelas,
            'absensi'=>$request->absensi,
            'keterangan'=>$request->keterangan,
        ]);

        return redirect()->route('absen_siswa.index')->with('success', 'Berhasil menambahkan data kehadiran Siswa');
    } else {
        return redirect()->back()->with('error', 'Data kehadiran Siswa tersebut sudah ada');
    }

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
