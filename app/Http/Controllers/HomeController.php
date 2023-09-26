<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\Mapel;
use App\Models\Kelas;
use App\Models\Jurusan;



class HomeController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $jumlahGuru = Guru::count();
        $jumlahMapel = Mapel::count();
        $jumlahKelas = Kelas::count();
        $jumlahJurusan = Jurusan::count();



        return view('dashboard', [
            'jumlahGuru' => $jumlahGuru,
            'jumlahMapel' => $jumlahMapel,
            'jumlahKelas' => $jumlahKelas,
            'jumlahJurusan' => $jumlahJurusan,
        ]);
    }
}
