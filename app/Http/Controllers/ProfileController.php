<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|string|in:Laki-laki,Perempuan,Lainnya',
        ]);

        // Ambil data user yang sedang login
        $user = Auth::user();

        // Update data user
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->gender = $request->gender;

        // Simpan perubahan ke database
        $user->save();

        // Redirect atau beri feedback ke user setelah update
        return redirect()->back()->with('success', 'Data berhasil diperbarui');
    }
}
