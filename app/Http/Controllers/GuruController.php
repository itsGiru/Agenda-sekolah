<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function GuruList(Request $request)
    {
       $list = DB::table('gurus')->get();
        return view('list_guru.list_guru ', compact('list'));
    }
}
