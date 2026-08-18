<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        $artikels = Artikel::latest()->take(3)->get();
        $content = SiteSetting::publicContent();

        return view('pages.index', compact('artikels', 'content'));
    }

    public function artikel(){
        $artikels = Artikel::latest()->get();
        $content = SiteSetting::publicContent();

        return view('pages.artikel', compact('artikels', 'content'));
    }

    public function detailArtikel(Artikel $artikel){
        return view('pages.artikel-detail', compact('artikel'));
    }

    public function profil(){
        $content = SiteSetting::publicContent();

        return view('pages.profil', compact('content'));
    }

    public function galeri(){
        $galeris = Galeri::latest()->get();
        $content = SiteSetting::publicContent();
        $categories = $galeris
            ->pluck('kategori')
            ->filter()
            ->merge(['Band', 'Event', 'Paduan Suara'])
            ->unique()
            ->values();

        return view('pages.galeri', compact('galeris', 'content', 'categories'));
    }
}
