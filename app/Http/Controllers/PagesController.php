<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\SiteSetting;

class PagesController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()
            ->take(6)
            ->get();

        $artikels = Artikel::latest()
            ->take(3)
            ->get();

        return view('home', compact('galeris', 'artikels'));
    }

    public function artikel()
    {
        $artikels = Artikel::latest()->get();
        $content = SiteSetting::publicContent();

        return view('pages.artikel', compact('artikels', 'content'));
    }

    public function detailArtikel(Artikel $artikel)
    {
        return view('pages.artikel-detail', compact('artikel'));
    }

    public function profil()
    {
        $content = SiteSetting::publicContent();

        return view('pages.profil', compact('content'));
    }

    public function galeri()
    {
        $galeris = Galeri::latest()->get();
        $content = SiteSetting::publicContent();

        return view('pages.galeri', compact('galeris', 'content'));
    }
}
