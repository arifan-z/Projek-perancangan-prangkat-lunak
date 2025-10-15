<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class PageController extends Controller
{
    public function beranda()
    {
        return view('beranda');
    }

    public function status()
    {
        return view('status');
    }
    public function informasi()
    {
        return view('informasi');
    }
}
