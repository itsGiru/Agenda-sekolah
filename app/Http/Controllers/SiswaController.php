<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    public function SiswaList(Request $request)
    {
       $list = DB::table('siswa')->get();
        return view('list_siswa.list_siswa', compact('list'));
    }
}
