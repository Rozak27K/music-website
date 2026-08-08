<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->get();

        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            $namaGambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('image'), $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);

        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'isi' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($this->isUploadedImage($artikel->gambar)) {
                File::delete(public_path('image/' . $artikel->gambar));
            }

            $namaGambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('image'), $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil diubah.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        if ($this->isUploadedImage($artikel->gambar)) {
            File::delete(public_path('image/' . $artikel->gambar));
        }

        $artikel->delete();

        return redirect()->route('admin.artikel')->with('success', 'Artikel berhasil dihapus.');
    }

    private function isUploadedImage(?string $gambar): bool
    {
        return $gambar
            && str_contains($gambar, '-')
            && File::exists(public_path('image/' . $gambar));
    }
}
