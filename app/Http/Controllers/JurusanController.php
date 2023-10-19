<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan=Jurusan::all();
        return view('jurusan.index', compact('jurusan'));
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
        $this->validate($request, [
            'jurusan'=>'required',
        ]);
        $jurusan=Jurusan::create([
            'jurusan'=>$request->jurusan
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan');
    }

    public function delete($id)
    {

        $jurusan = Jurusan::find($id);
    
        if (!$jurusan) {
            
            return redirect()->route('jurusan.index')->with('error', 'Jurusan Tidak Ditemukan');
        }
    
        // Hapus hubungan guru-mapel
        $jurusan->delete();
    
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jurusan $jurusan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jurusan $jurusan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jurusan $jurusan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jurusan $jurusan)
    {
        //
    }
}
