<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function edit()
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang masuk
        
        if ($user) {
            return view('profil', compact('user'));
        } else {
            return redirect()->back()->with('error', 'Gagal mengambil data pengguna.');
        }
    }

    public function update(Request $request)
    {
        $user = Auth::user(); // Mendapatkan data pengguna yang sedang masuk

        if ($user) {
            $user->update($request->all());
            return redirect()->route('profil.edit')->with('success', 'Profil berhasil diperbarui!');
        } else {
            return redirect()->back()->with('error', 'Gagal menyimpan perubahan profil.');
        }
    }
}
