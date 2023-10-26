<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\Jurusan;
use App\Models\AbsenSiswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SiswaController extends Controller
{
    public function SiswaList(Request $request)
    {

        $list_kelas = Jurusan::whereHas('kelas')
        ->with(['kelas' => function($query) {
            $query->orderByRaw('kelas, tingkat DESC');
        }])
        ->get();

        if (Auth::user()->role == 1) {
            $list = Siswa::with('kelas')
            ->belumLulus()
            ->orderBy('no_absen', 'asc')
            ->get();
            return view('list_siswa.list_siswa', compact('list', 'list_kelas'));
        } else {

            $kelasWaliKelas = Auth::user()->id_kelas;
            $list = Siswa::with('kelas')
            ->where('id_kelas', $kelasWaliKelas)
            ->belumLulus()
            ->orderBy('no_absen', 'asc')
            ->get();
            return view('list_siswa.list_siswa', compact('list'));
        }

    }
    
    public function AddSiswa(Request $request)
    {

        $kelasWaliKelas = Auth::user()->id_kelas;

        $list = DB::table('siswa')->get();

        $list = Siswa::with('kelas')
        ->where('id_kelas', $kelasWaliKelas)
        ->get();

        $action = route('list-siswa.store_siswa');
        return view('list_siswa.add_siswa', compact('list', 'action'));
    }

    public function store(Request $request)
    {
        $kelasId = Auth()->user()->id_kelas;
    
        $validator = Validator::make($request->all(), [
            'no_absen' => [
                'required',
                Rule::unique('siswa', 'no_absen')->where('id_kelas', $kelasId)
            ],
            'nama' => 'required',
            'jenis_kelamin' => 'required',
        ]);
    
        if ($validator->fails()) {
            return redirect()->route('list-siswa.index')
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Gagal menambahkan, Nomor Absen tersebut pada kelas ini sudah ada');
        }
    
        $siswa = Siswa::create([
            'no_absen' => $request->no_absen,
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jenis_kelamin,
            'id_kelas' => $kelasId
        ]);
    
        return redirect()->route('list-siswa.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function delete($id)
    {

        $siswa = Siswa::find($id);
    
        if (!$siswa) {

            return redirect()->route('list-siswa.index')->with('error', 'Siswa Tidak Ditemukan');
        }
    

        $siswa->delete();

    
        return redirect()->route('list-siswa.index')->with('success', 'Siswa berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'no_absen'=>'required',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
        ];

        $request->validate($rules);

        $update = Siswa::where('id', $id)->update([
            'no_absen'=>$request->no_absen,
            'nama'=>$request->nama,
            'jenis_kelamin'=>$request->jenis_kelamin
        ]);

        return redirect()->route('list-siswa.index');
    }

    
    public function edit(int $id)
    {
        $siswa=Siswa::find($id);
        $action=route('list-siswa.update_siswa', $id);
        return view('list_siswa.add_siswa ', compact('siswa', 'action'));
    }

    public function detail($id)
    {
        $siswa=Siswa::find($id);
        

        $sakit = AbsenSiswa::where('id_siswa',$id)->where('id_kelas', $siswa->id_kelas)->where('absensi', 'Sakit')->count();
        $izin = AbsenSiswa::where('id_siswa',$id)->where('id_kelas', $siswa->id_kelas)->where('absensi', 'Izin')->count();
        $alpa = AbsenSiswa::where('id_siswa',$id)->where('id_kelas', $siswa->id_kelas)->where('absensi', 'alpa')->count();
        $dispensasi = AbsenSiswa::where('id_siswa',$id)->where('id_kelas', $siswa->id_kelas)->where('absensi', 'Dispensasi')->count();
        return response()->json(['siswa'=>$siswa->nama, 'absensi'=>[$sakit,$izin,$alpa,$dispensasi]]);
    }
}
