<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\GuruMapel;
use App\Models\Mapel;

class GuruController extends Controller
{
    public function GuruList(Request $request)
    {
        $guru = Guru::with('gurumapel')->get();
        return view('list_guru.list_guru ', compact('guru'));
    }

    public function AddGuru()
    {
        $mapel=Mapel::all();
        return view('list_guru.add_guru ', compact('mapel'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'nama'=>'required|unique:gurus',
            'mapel'=>'required'
        ],[
            'nama.unique' => 'Nama Guru tersebut sudah ada'
        ]);
        $guru=Guru::create([
            'nama'=>$request->nama
        ]);
        $gurumapel=GuruMapel::create([
            'id_guru'=>$guru->id,
            'id_mapel'=>$request->mapel
        ]);

        return redirect()->route('list-guru.index')->with('success', 'Guru berhasil ditambahkan');
    }

    public function EditGuru(int $id)
    {
        $edit=Guru::find($id);
        $mapel=Mapel::all();
        return view('list_guru.edit_guru ', compact('mapel', 'edit'));
    }

    public function GuruUpdate(Request $request, $id)
    {
        $rules = [
            'nama' => 'required',
        ];

        $request->validate($rules);

        $update = Guru::where('id', $id)->update([
            'nama'=>$request->nama
        ]);

        return redirect()->route('list-guru.index');
    }
    public function DeleteGuru($id)
    {
    // Temukan guru berdasarkan ID
    $guru = Guru::find($id);

    if (!$guru) {
        // Handle jika guru tidak ditemukan
        return redirect()->route('list-guru.index')->with('error', 'Guru tidak ditemukan.');
    }

    // Hapus guru
    $guru->delete();

    // Redirect kembali ke daftar guru dengan pesan sukses
    return redirect()->route('list-guru.index')->with('success', 'Guru berhasil dihapus.');
}

    public function EditMapel(int $id)
    {
        $gurumapel=GuruMapel::where('id_guru', $id)->get();
        $edit=Guru::find($id);
        $mapel=Mapel::all();
        return view('list_guru.edit_mapel ', compact('mapel', 'edit', 'gurumapel'));
    }

    public function MapelUpdate(Request $request, $id)
    {
        $rules = [
            'mapel' => 'required',
        ];

        $request->validate($rules);

        $update = GuruMapel::create([
            'id_mapel'=>$request->mapel,
            'id_guru'=>$id
        ]);

        return redirect()->route('list-guru.edit_mapel', $id)->with('success', 'Mata Pelajaran berhasil ditambahkan.');
    }

    public function DeleteMapel($id)
{
    // Temukan hubungan guru-mapel berdasarkan ID
    $gurumapel = GuruMapel::find($id);

    if (!$gurumapel) {
        // Handle jika hubungan guru-mapel tidak ditemukan
        return redirect()->route('list-guru.index')->with('error', 'Hubungan guru-mapel tidak ditemukan.');
    }

    // Hapus hubungan guru-mapel
    $gurumapel->delete();

    // Redirect kembali ke halaman edit mapel dengan pesan sukses
    return redirect()->route('list-guru.edit_mapel', $gurumapel->id_guru)->with('success', 'Mata Pelajaran berhasil dihapus.');
}

}
