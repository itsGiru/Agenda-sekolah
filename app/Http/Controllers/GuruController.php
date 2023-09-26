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
<<<<<<< HEAD
       $list = DB::table('gurus')->get();
        return view('list_guru.list_guru ', compact('list'));
    }
}
=======
        $list = DB::table('mapels')
            ->join('gurus', 'mapels.id_guru', '=', 'gurus.id')
            ->select('gurus.nama', 'mapels.nama_mapel')
            ->get();

        // Inisialisasi array asosiatif untuk mengelompokkan mata pelajaran berdasarkan guru
        $groupedMapels = [];

        foreach ($list as $row) {
            $namaGuru = $row->nama;
            $namaMapel = $row->nama_mapel;

            // Jika guru belum ada dalam array, tambahkan
            if (!isset($groupedMapels[$namaGuru])) {
                $groupedMapels[$namaGuru] = $namaMapel;
            } else {
                // Jika guru sudah ada, tambahkan mata pelajaran yang sesuai
                $groupedMapels[$namaGuru] .= ', ' . $namaMapel;
            }
        }

        return view('list_guru.list_guru', compact('groupedMapels'));
    }
}
>>>>>>> 37c50e3f56d1051223ade0ec29e862088b2aad61
