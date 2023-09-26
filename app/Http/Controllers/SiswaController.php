<?php

namespace App\Http\Controllers;

use DB;
<<<<<<< HEAD
use App\Models\Siswa;
=======
use App\Models\User;
>>>>>>> 37c50e3f56d1051223ade0ec29e862088b2aad61
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function SiswaList(Request $request)
    {
       $list = DB::table('siswa')->get();
<<<<<<< HEAD
       $list = Siswa::with('kelas')->get();
=======
>>>>>>> 37c50e3f56d1051223ade0ec29e862088b2aad61
        return view('list_siswa.list_siswa', compact('list'));
    }
}
