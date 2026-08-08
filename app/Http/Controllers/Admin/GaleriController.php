<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $galeris = Galeri::latest()->get();

        return view('admin.galeri.index', compact('galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['nullable', 'string', 'max:255'],
            'gambar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $namaGambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('image'), $namaGambar);
        $data['gambar'] = $namaGambar;

        Galeri::create($data);

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $galeri = Galeri::findOrFail($id);

        return view('admin.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $data = $request->validate([
            'judul' => ['required', 'string', 'max:255'],
            'kategori' => ['nullable', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('gambar')) {
            if ($galeri->gambar && File::exists(public_path('image/' . $galeri->gambar))) {
                File::delete(public_path('image/' . $galeri->gambar));
            }

            $namaGambar = time() . '-' . $request->file('gambar')->getClientOriginalName();
            $request->file('gambar')->move(public_path('image'), $namaGambar);
            $data['gambar'] = $namaGambar;
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil diubah.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);

        if ($galeri->gambar && File::exists(public_path('image/' . $galeri->gambar))) {
            File::delete(public_path('image/' . $galeri->gambar));
        }

        $galeri->delete();

        return redirect()->route('admin.galeri')->with('success', 'Galeri berhasil dihapus.');
    }
}
