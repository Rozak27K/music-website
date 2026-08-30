<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Galeri;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard', [
            'jumlahGaleri' => Galeri::count(),
            'jumlahArtikel' => Artikel::count(),
            'galeriTerbaru' => Galeri::latest()->take(5)->get(),
            'artikelTerbaru' => Artikel::latest()->take(5)->get(),
        ]);
    }
}
