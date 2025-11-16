<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fakultas;
use App\Models\Prodi;
use App\Models\Tempat;

class PageController extends Controller
{
    public function beranda()
    {
        $fakultas = Fakultas::all();
        $prodi    = Prodi::all();
        $tempat   = Tempat::all();

        return view('beranda', compact('fakultas', 'prodi', 'tempat'));
    }

    public function status()
    {
        $fakultas = Fakultas::all();
        $prodi    = Prodi::all();
        $tempat   = Tempat::all();

        return view('status', compact('fakultas', 'prodi', 'tempat'));
    }

    public function informasi()
    {
        $fakultas = Fakultas::all();
        $prodi    = Prodi::all();
        $tempat   = Tempat::all();

        return view('informasi', compact('fakultas', 'prodi', 'tempat'));
    }

    public function login()
    {
        return view('login');
    }

    public function dashboard()
    {
        $fakultas = Fakultas::all();
        $prodi    = Prodi::all();
        $tempat   = Tempat::all();

        return view('user.dashboard-user', compact('fakultas', 'prodi', 'tempat'));
    }

    public function profile()
    {
        $fakultas = Fakultas::all();
        $prodi    = Prodi::all();
        $tempat   = Tempat::all();

        return view('user.profile', compact('fakultas', 'prodi', 'tempat'));
    }

    public function laporan()
    {
        $fakultas = Fakultas::all();
        $prodi    = Prodi::all();
        $tempat   = Tempat::all();

        return view('user.laporan', compact('fakultas', 'prodi', 'tempat'));
    }
}
