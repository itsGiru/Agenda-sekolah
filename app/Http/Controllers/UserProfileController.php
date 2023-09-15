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

        $user->jurusan = $request->jurusan;
        $user->kelas = $request->kelas;

        $attributes = $request->validate([
            'name' => ['required', 'max:255', 'min:2'],
            'email' => [
                'required',
                'email',
                'max:255', Rule::unique('users')->ignore($user->id),
            ],
            'address' => ['max:100'],
            'city' => ['max:100'],
            'province' => ['max:100'],
            'postal' => ['max:100'],
            'about' => ['max:255'],
            'profile_image' => ['nullable', 'image'],
            'no_wa' => ['nullable', 'min:11', 'max:13', 'regex:/^[0-9]+$/' /* menambahkan aturan regex */],
        ], [
            'no_wa.regex' => 'Nomor WhatsApp tidak valid. Harus berupa angka.',
        ]);
        

        $user->update([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'address' => $attributes['address'],
            'city' => $attributes['city'],
            'province' => $attributes['province'],
            'postal' => $attributes['postal'],
            'about' => $attributes['about'],
            'no_wa' => $attributes['no_wa'],
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