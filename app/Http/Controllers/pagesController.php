<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Galeri;
use Illuminate\Http\Request;

class pagesController extends Controller
{
    public function index(){
        $artikels = Artikel::latest()->take(3)->get();

        return view('pages.index', compact('artikels'));
    }

    public function artikel(){
        $artikels = Artikel::latest()->get();

        return view('pages.artikel', compact('artikels'));
    }

    public function detailArtikel(Artikel $artikel){
        return view('pages.artikel-detail', compact('artikel'));
    }

    public function profil(){
        return view('pages.profil');
    }

    public function galeri(){
        $galeris = Galeri::latest()->get();

        return view('pages.galeri', compact('galeris'));
    }
}
