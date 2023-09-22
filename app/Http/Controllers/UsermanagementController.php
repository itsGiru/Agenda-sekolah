<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsermanagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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


    public function GuruList(Request $request)
    {
       $list = DB::table('users')->get();
        return view('list_guru.list_guru    ', compact('list'));
    }

    public function AddUser(Request $request)
    {
       $list = DB::table('users')->get();
        return view('users.add-user', compact('list'));
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