<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AbsenGuruController extends Controller
{
    public function index()
    {
        return view('absen_guru.index');
    }
}
