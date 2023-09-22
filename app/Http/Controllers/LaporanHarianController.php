<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanHarianController extends Controller
{
    public function index()
    {
        return view('harian.index');
    }


    public function create()
    {
        return view('harian.create');
    }

    public function show()
    {
        return view('harian.show');
    }
}
