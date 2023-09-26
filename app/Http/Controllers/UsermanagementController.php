<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\Kelas;

class UsermanagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    

    public function JurusanKelas(int $id)
    {
        $list = DB::table('kelas')->where('id_jurusan', $id)->get();
        return response()->json($list);
    }

    public function WalasList(Request $request)
    {
        $list = DB::table('users')->get();
        return view('list_walas.list_walas', compact('list'));
    }
    public function KmList(Request $request)
    {
        $list = DB::table('users')->get();
        return view('list_km.list_km', compact('list'));
    }

    public function AddUser(Request $request)
    {
        $kelas = Kelas::all();
        $jurusan = Jurusan::all();
        $list = DB::table('users')->get();
        return view('users.add-user', compact('list', 'jurusan', 'kelas'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255|min:2',
            'email' => 'required|email|max:255|unique:users,email',
            'password' => 'required|min:5|max:255',
            'role' => 'required',
            'id_jurusan' => 'nullable|required_if:role,2,3', // Validasi untuk id_jurusan (opsional jika role bukan 2 atau 3)
            'id_kelas' => 'nullable|required_if:role,2,3', // Validasi untuk id_kelas (opsional jika role bukan 2 atau 3)
        ]);

        $attributes['password'] = bcrypt(request('password')); // Enkripsi password
        if ($attributes ['role']=='2' || $attributes ['role']=='3'){
            $attributes['id_jurusan'] = request('id_jurusan');
            $attributes['id_kelas'] = request('id_kelas');
        }
        elseif ($attributes ['role']=='4') {
            $attributes['id_jurusan'] = request('id_jurusan');
        }

        $user = User::create($attributes);
        auth()->login($user);

        return redirect('/user_management');
    }

    public function UserList(Request $request)
    {
        $list = DB::table('users')->get();
        return view('users.list_user', compact('list'));
    }


    public function UserEdit($id)
    {
        $edit = DB::table('users')
            ->where('id', $id)
            ->first();
        return view('users.edit_user', compact('edit'));
    }

    public function UserUpdate(Request $request, $id)
    {

        DB::table('users')->where('id', $id)->first();
        $data = array();
        $data['role'] = $request->role;
        $update = DB::table('users')->where('id', $id)->update($data);

        if ($update) {

            return Redirect()->route('users.index')->with('success', 'User Berhasil Diupdate!');
        } else {

            return Redirect()->route('users.index')->with('error', 'Oops, ada sesuatu yang Salah!');
        }

    }

    public function UserDelete($id)
    {

        $delete = DB::table('users')->where('id', $id)->delete();
        if ($delete) {
            return Redirect()->route('users.index')->with('success', 'User Berhasil Dihapus!');
        } else {
            return Redirect()->route('users.index')->with('error', 'Oops, ada sesuatu yang Salah!');
        }

    }
    public function changeRole($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        if ($user->role == 6) {
            DB::table('users')->where('id', $id)->update(['role' => 2]);
            return redirect()->route('users.index')->with('success', 'Izin akun berhasil diubah.');
        } else {
            return redirect()->route('users.index')->with('error', 'Tidak dapat mengubah izin akun.');
        }
    }
}