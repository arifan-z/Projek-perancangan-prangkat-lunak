<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Laporan;
use App\Models\User;
use App\Models\Informasi;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // ====== DATA COUNT UNTUK ADMIN & STAF ======
        $arsip = Laporan::where('status', 'selesai')->count();
        $pengguna = User::where('role', 'user')->count();
        $totalLaporan = Laporan::count();
        $totalInformasi = Informasi::count();

        // 🔹 Jika admin → tampilkan dashboard admin + data count
        if ($user->role === 'admin') {
            $laporans = Laporan::latest()->get(); // Admin bisa melihat semua
            return view('admin.dashboard', compact(
                'user',
                'laporans',
                'arsip',
                'pengguna',
                'totalLaporan',
                'totalInformasi'
            ));
        }

        // 🔹 Jika staf → tampilkan dashboard staf + data count
        if ($user->role === 'staf') {
            $laporans = Laporan::where('status', 'diproses')->latest()->get();
            return view('staf.dashboard', compact(
                'user',
                'laporans',
                'arsip',
                'pengguna',
                'totalLaporan',
                'totalInformasi'
            ));
        }

        // 🔹 Jika user biasa → tampilkan dashboard user (TIDAK ADA KARTU)
        $laporans = Laporan::where('user_id', $user->id)->latest()->get();

        return view('user.dashboard', compact('user', 'laporans'));
    }
}
