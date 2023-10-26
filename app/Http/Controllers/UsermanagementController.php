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
        $list = User::get();
        return view('list_walas.list_walas', compact('list'));
    }
    public function KmList(Request $request)
    {
        $list = User::get();
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
        if(request()->role=='2'){
            $check=User::where('id_kelas', request()->id_kelas)->where('role', '2')->count();
            if ($check==0) {
                $user = User::create($attributes);
                return redirect()->route('users.index')->with('success', 'User (Ketua Murid) berhasil ditambahkan.');

            } else {
                return redirect()->back()->with('error', 'Ketua Murid di Kelas tersebut sudah ada');
            }
        } elseif(request()->role=='3'){
            $check=User::where('id_kelas', request()->id_kelas)->where('role', '3')->count();
            if ($check==0) {
                $user = User::create($attributes);
                return redirect()->route('users.index')->with('success', 'User (Wali Kelas) berhasil ditambahkan.');

            } else {
                return redirect()->back()->with('error', 'Wali Kelas di Kelas tersebut sudah ada');
            }

        } elseif(request()->role=='4'){
            $check=User::where('id_jurusan', request()->id_jurusan)->where('role', '4')->count();
            if ($check==0) {
                $user = User::create($attributes);
                return redirect()->route('users.index')->with('success', 'User (Kepala Kompetensi) berhasil ditambahkan.');

            } else {
                return redirect()->back()->with('error', 'Kepala Kompetensi di Jurusan tersebut sudah ada');
            }
        }

        // session()->flash('success', 'User berhasil ditambahkan.');

    }

    public function UserList(Request $request)
    {
        $list = User::with('jurusan')->get();
        return view('users.list_user', compact('list'));
    }


    public function UserEdit($id)
    {
        $edit = User::where('id', $id)->first();
        $kelas = Kelas::all(); // Retrieve all kelas data
        $jurusan = Jurusan::all(); // Retrieve all jurusan data
    
        return view('users.edit_user', compact('edit', 'jurusan', 'kelas'));
    }
    

    public function UserUpdate(Request $request, $id)
    {
        // Get the existing user
        $existingUser = User::where('id', $id)->first();
    
        // Check if the user is trying to update their own account
        if ($existingUser->id === auth()->user()->id) {
            // Allow admin to update email and password
            $rules = [
                'name' => 'required',
                'email' => 'required',
            ];
    
            if (auth()->user()->role == 1) {
                if ($request->filled('password') && auth()->user()->role == 1) {
                    $rules['password'] = 'required|min:6|max:255';
                }
            }
    
            // Validate the request
            $request->validate($rules);
        } else {
            // Validate the request for non-admin users (only name)
            $rules = [
                'name' => 'required',
            ];
    
            // Check if the user is not an admin (role != 1)
            if ($request->role != 1) {
                $rules['role'] = 'required';
            }
    
            // If password is being changed, add password validation rules
            if ($request->filled('password')) {
                $rules['password'] = 'required|min:6|max:255';
            }
    
            // Validate the request
            $request->validate($rules);
        }
    
        // Continue with the update logic here
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
    
        // Only an admin can change the role
        if ($request->role && auth()->user()->role == 1) {
            $data['role'] = $request->role;
        }
    
        // Update id_jurusan and id_kelas based on the role
        if ($request->role && ($request->role == 2 || $request->role == 3)) {
            $data['id_jurusan'] = $request->id_jurusan;
            $data['id_kelas'] = $request->id_kelas;
        } elseif ($request->role && $request->role == 4) {
            $data['id_jurusan'] = $request->id_jurusan;
            // Set id_kelas to null when role is not 2 or 3
            $data['id_kelas'] = null;
        }
    
        // Only update password if it's provided and the user is an admin
        if ($request->filled('password') && auth()->user()->role == 1) {
            $data['password'] = bcrypt($request->password);
        }
    
        if($existingUser->role=='1'){
            $update = User::where('id', $id)->update($data);
            return redirect()->route('users.index')->with('success', 'Admin Berhasil Diupdate!');
        } else {
            if(request()->role=='2'){
                $check=User::where('id_kelas', request()->id_kelas)->where('role', '2')->where('id', '!=', $existingUser->id)->count();
                if ($check==0) {
                    // Update the user with the new data
                    $update = User::where('id', $id)->update($data);
                    return redirect()->route('users.index')->with('success', 'User Berhasil Diupdate!');

                } else {
                    return redirect()->back()->with('error', 'Ketua Murid di Kelas tersebut sudah ada');
                }
            } elseif(request()->role=='3'){
                $check=User::where('id_kelas', request()->id_kelas)->where('role', '3')->where('id', '!=', $existingUser->id)->count();
                if ($check==0) {
                    // Update the user with the new data
                    $update = User::where('id', $id)->update($data);
                    return redirect()->route('users.index')->with('success', 'User Berhasil Diupdate!');

                } else {
                    return redirect()->back()->with('error', 'Wali Kelas di Kelas tersebut sudah ada');
                }

            } elseif(request()->role=='4'){
                $check=User::where('id_jurusan', request()->id_jurusan)->where('role', '4')->where('id', '!=', $existingUser->id)->count();
                if ($check==0) {
                    // Update the user with the new data
                    $update = User::where('id', $id)->update($data);
                    return redirect()->route('users.index')->with('success', 'User Berhasil Diupdate!.');

                } else {
                    return redirect()->back()->with('error', 'Kepala Kompetensi di Jurusan tersebut sudah ada');
                }
            }
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