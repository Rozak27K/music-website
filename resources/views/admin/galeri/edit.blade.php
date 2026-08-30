@extends('layouts.app')

@section('title', 'Edit Galeri')

@section('content')
<section class="bg-[#f4f4f5] py-12">
    <div class="mx-auto max-w-4xl px-6">
        <div class="mb-8">
            <p class="text-sm font-black uppercase tracking-[0.28em] text-purple-700">
                Admin
            </p>
            <h1 class="mt-2 text-4xl font-black text-[#202427]">
                Edit Galeri
            </h1>
        </div>

        <form action="{{ route('admin.galeri.update', $galeri) }}" method="POST" enctype="multipart/form-data" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label for="judul" class="mb-2 block text-sm font-black text-[#202427]">Judul</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 font-semibold outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100">
                    @error('judul')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="deskripsi" class="mb-2 block text-sm font-black text-[#202427]">Deskripsi</label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 font-semibold outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="kategori" class="mb-2 block text-sm font-black text-[#202427]">Kategori</label>
                    <select id="kategori" name="kategori" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 font-semibold outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100">
                        @foreach (['Dokumentasi', 'Band', 'Event', 'Paduan Suara'] as $kategori)
                            <option value="{{ $kategori }}" @selected(old('kategori', $galeri->kategori) === $kategori)>
                                {{ $kategori }}
                            </option>
                        @endforeach
                    </select>
                    @error('kategori')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gambar" class="mb-2 block text-sm font-black text-[#202427]">Gambar</label>
                    @php
                        $image = str_contains($galeri->gambar, '/') ? asset('storage/' . $galeri->gambar) : asset('image/' . $galeri->gambar);
                    @endphp
                    <img src="{{ $image }}" alt="{{ $galeri->judul }}" class="mb-4 h-48 w-72 rounded-xl object-cover">
                    <input type="file" id="gambar" name="gambar" class="w-full rounded-xl border border-dashed border-slate-300 bg-slate-50 px-4 py-3 font-semibold file:mr-4 file:rounded-full file:border-0 file:bg-[#202427] file:px-4 file:py-2 file:text-sm file:font-black file:text-white">
                    @error('gambar')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 flex flex-wrap gap-3">
                <button type="submit" class="rounded-full bg-[#202427] px-6 py-3 text-sm font-black text-white transition hover:bg-purple-800">
                    Simpan Perubahan
                </button>
                <a href="{{ route('admin.galeri.index') }}" class="rounded-full border border-slate-300 px-6 py-3 text-sm font-black text-slate-700 transition hover:border-purple-400 hover:text-purple-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</section>
@endsection
