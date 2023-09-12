<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanHarianController extends Controller
{
    public function show()
    {
        return view('harian.index');
    }
}
