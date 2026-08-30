<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\SiteSetting;

class PagesController extends Controller
{
    public function index()
    {
        $galeris = rescue(
            fn () => Galeri::latest()
                ->take(6)
                ->get(),
            collect(),
            false
        );

        $artikels = rescue(
            fn () => Artikel::latest()
                ->take(3)
                ->get(),
            collect(),
            false
        );

        return view('home', compact('galeris', 'artikels'));
    }

    public function artikel()
    {
        $artikels = rescue(fn () => Artikel::latest()->get(), collect(), false);
        $content = $this->publicContent();

        return view('pages.artikel', compact('artikels', 'content'));
    }

    public function detailArtikel(Artikel $artikel)
    {
        return view('pages.artikel-detail', compact('artikel'));
    }

    public function profil()
    {
        $content = $this->publicContent();

        return view('pages.profil', compact('content'));
    }

    public function galeri()
    {
        $galeris = rescue(fn () => Galeri::latest()->get(), collect(), false);
        $content = $this->publicContent();

        return view('pages.galeri', compact('galeris', 'content'));
    }

    private function publicContent(): array
    {
        return rescue(fn () => SiteSetting::publicContent(), SiteSetting::publicContent(), false);
    }
}
