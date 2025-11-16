<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // 🔹 Jika admin → tampilkan dashboard admin
        if ($user->role === 'admin') {
            $laporans = Laporan::latest()->get(); // Admin bisa melihat semua
            return view('admin.dashboard', compact('user', 'laporans'));
        }

        // 🔹 Jika staf → tampilkan dashboard staf
        if ($user->role === 'staf') {
            $laporans = Laporan::where('status', 'diproses')->latest()->get();
            return view('staf.dashboard', compact('user', 'laporans'));
        }

        // 🔹 Jika user biasa → tampilkan dashboard user
        $laporans = Laporan::where('user_id', $user->id)->latest()->get();
        return view('user.dashboard', compact('user', 'laporans'));
    }
}
