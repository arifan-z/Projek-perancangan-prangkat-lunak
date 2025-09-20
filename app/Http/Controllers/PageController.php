<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class PageController extends Controller
{
    public function beranda()
    {
        $locale = app()->getLocale(); // ambil locale dari middleware
        $translator = new GoogleTranslate($locale);

        $title = $translator->translate("Selamat datang di website kami!");
        $content = $translator->translate("Ini adalah halaman beranda.");

        return view('beranda', compact('title', 'content'));
    }

    public function about()
    {
        $locale = app()->getLocale();
        $translator = new GoogleTranslate($locale);

        $title = $translator->translate("Tentang Kami");
        $content = $translator->translate("Ini adalah halaman tentang kami.");

        return view('tentang', compact('title', 'content'));
    }
}
