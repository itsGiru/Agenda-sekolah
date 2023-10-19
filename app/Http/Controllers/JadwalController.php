<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\GuruMapel;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Jadwal;
use DB;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index(Request $request)
    {
        $list_kelas = Kelas::all(); // Mengambil semua data kelas
        $kelasWaliKelas = Auth::user()->id_kelas;

        $list = Jadwal::with('kelas')
        ->where('id_kelas', $kelasWaliKelas)
        ->orderByRaw("case when hari='Mon' then 1 when hari='Tue' then 2 when hari='Wed' then 3 when hari='Thu' then 4 when hari='Fri' then 5 end")
        ->get();
        return view('jadwal.index', compact('list'));
    }

    public function create()
    {
        $list = GuruMapel::get();
        return view('jadwal.create', compact('list'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'hari'=>'required',
            'mapel'=>'required',
        ]);
        $jadwal=Jadwal::create([
            'hari'=>$request->hari,
            'id_guru_mapels'=>$request->mapel,
            'id_kelas'=>Auth()->user()->id_kelas
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit(int $id)
    {
        $jadwal=Jadwal::find($id);
        $action=route('jadwal.update_jadwal', $id);
        return view('list_siswa.add_siswa ', compact('siswa', 'action'));
    }

    public function delete(int $id)
{
    $jadwal = Jadwal::find($id);

    if (!$jadwal) {
        return redirect()->route('jadwal.index')->with('error', 'Jadwal tidak ditemukan.');
    }

    $jadwal->delete();

    return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil dihapus.');
}
}
