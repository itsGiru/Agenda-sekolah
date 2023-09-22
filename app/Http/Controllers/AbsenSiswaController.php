<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenSiswaController extends Controller
{
    public function index()
    {
        return view('absen_siswa.index');
    }
}
