<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mapel=Mapel::all();
        return view('mapel.index', compact('mapel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mapel' => 'required|unique:mapels,nama_mapel',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('mapel.index')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan, Mata Pelajaran sudah ada');
        }
    
        $mapel = Mapel::create([
            'nama_mapel' => $request->mapel,
        ]);
    
        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil ditambahkan');
    }
    

    public function delete($id)
    {
        // Temukan hubungan guru-mapel berdasarkan ID
        $mapel = Mapel::find($id);
    
        if (!$mapel) {
            // Handle jika hubungan guru-mapel tidak ditemukan
            return redirect()->route('mapel.index')->with('error', 'Mapel Tidak Ditemukan');
        }
    
        // Hapus hubungan guru-mapel
        $mapel->delete();
    
        // Redirect kembali ke halaman edit mapel dengan pesan sukses
        return redirect()->route('mapel.index')->with('success', 'Mata Pelajaran berhasil dihapus');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Mapel $mapel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mapel $mapel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mapel $mapel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mapel $mapel)
    {
        //
    }
}
