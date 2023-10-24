<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\RiwayatKenaikanKelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas=Kelas::has('jurusan')
        ->orderBy('id_jurusan', 'asc')
        ->orderBy('tingkat', 'desc')
        ->get();
        $jurusan=Jurusan::all();
        return view('kelas.index', compact('kelas', 'jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all(); // Mengambil semua data jurusan
        return view('kelas.index', compact('jurusan'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'kelas' => 'required',
            'jurusan' => 'required',
            'tingkat' => 'required',
        ]);
    
        // Cek apakah kombinasi tingkat dan kelas sudah ada dalam database
        $kelasExists = Kelas::where('kelas', $request->kelas)
            ->where('id_jurusan', $request->jurusan)
            ->where('tingkat', $request->tingkat)
            ->exists();
    
        if ($kelasExists) {
            return redirect()->route('kelas.index')->with('error', 'Kelas tersebut sudah ada');
        }
    
        $kelas = Kelas::create([
            'kelas' => $request->kelas,
            'id_jurusan' => $request->jurusan,
            'tingkat' => $request->tingkat,
        ]);
    
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan');
    }
    
    

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $jurusan=Jurusan::find($id);
        $kelas=Kelas::whereIdJurusan($id)->pluck('id');
        $list=Siswa::whereIn('id_kelas', $kelas)->where('lulus', 0)->count();
        $riwayat=RiwayatKenaikanKelas::where('id_jurusan', $id)->latest()->get();
        return view('kelas.kenaikan', compact('kelas', 'list', 'jurusan', 'riwayat'));
    }

    public function kenaikan(int $id)
    {
        $kelas = Kelas::whereIdJurusan($id)
            ->orderByRaw('kelas, tingkat DESC')
            ->get();
        foreach ($kelas as $item) {
            if ($item->tingkat == '12') {
                Siswa::where('id_kelas', $item->id)->where('lulus', 0)->update(['lulus' => 1]);
            } elseif ($item->tingkat == '11') {
                $naikKelas = Kelas::firstOrNew([
                    'tingkat' => '12',
                    'kelas' => $item->kelas,
                    'id_jurusan' => $id
                ]);

                if (!$naikKelas->exists) {
                    $naikKelas->save();
                }

                Siswa::where('id_kelas', $item->id)->where('lulus', 0)->update(['id_kelas' => $naikKelas->id]);
            } elseif ($item->tingkat == '10') {
                $naikKelas = Kelas::firstOrNew([
                    'tingkat' => '11',
                    'kelas' => $item->kelas,
                    'id_jurusan' => $item->id_jurusan
                ]);

                if (!$naikKelas->exists) {
                    $naikKelas->save();
                }

                Siswa::where('id_kelas', $item->id)->where('lulus', 0)->update(['id_kelas' => $naikKelas->id]);
            }
        }

        RiwayatKenaikanKelas::create(['id_jurusan'=>$id]);
        return redirect()->route('jurusan.index')->with('success', 'Berhasil Menaikkan Kelas');
    }

    public function delete($id)
    {

        $kelas = Kelas::find($id);
    
        if (!$kelas) {
            
            return redirect()->route('jurusan.index')->with('error', 'Kelas Tidak Ditemukan');
        }
    
        // Hapus hubungan guru-mapel
        $kelas->delete();
    
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
