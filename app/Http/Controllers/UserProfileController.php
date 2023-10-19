<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    public function show()
    {
        return view('user-profiles.index');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        if ($request->has('id_kelas')) {
            $user->id_kelas = $request->input('id_kelas');
        }

        $attributes = $request->validate([
            'name' => ['required', 'max:255', 'min:2'],
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            'profile_image' => ['nullable', 'image'],
        ]);
        
        $user->update([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
        ]);
        
        


        if ($request->hasFile('profile_image')) {
            if ($user->profile_image) {
                Storage::delete($user->profile_image);
            }

            $imagePath = $request->file('profile_image')->store('profile_images', 'public');
            $user->profile_image = $imagePath;
            $user->save();
        }

        return back()->with('success', 'Profil berhasil diupdate');
        
    }
    public function deleteProfileImage()
    {
        $user = auth()->user();

        if ($user->profile_image) {
            // Hapus gambar dari penyimpanan
            Storage::delete($user->profile_image);

            // Hapus referensi gambar dari database
            $user->profile_image = null;
            $user->save();

            return redirect()->back()->with('success', 'Gambar profil telah dihapus.');
        } else {
            return redirect()->back()->with('error', 'Tidak ada gambar profil yang dapat dihapus.');
        }
    }

}