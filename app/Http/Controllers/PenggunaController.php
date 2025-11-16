<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PenggunaController extends Controller
{
    // Menampilkan seluruh pengguna
    public function index()
    {
        $pengguna = User::orderBy('created_at', 'desc')->get();
        return view('admin.pengguna', compact('pengguna'));
    }

    // Update role pengguna
    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|in:user,staf,admin'
        ]);

        $user = User::findOrFail($id);
        $user->role = $request->role;
        $user->save();

        return back()->with('success', 'Role pengguna berhasil diperbarui.');
    }

    // Hapus pengguna
    public function hapus($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
