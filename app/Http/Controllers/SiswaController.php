<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function SiswaList(Request $request)
    {
       $list = DB::table('siswa')->get();
       $list = Siswa::with('kelas')->get();
        return view('list_siswa.list_siswa', compact('list'));
    }
}
