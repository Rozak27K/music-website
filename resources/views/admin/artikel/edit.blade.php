@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<section class="bg-[#f4f4f5] py-12">
    <div class="mx-auto max-w-4xl px-6">
        <div class="mb-8">
            <p class="text-sm font-black uppercase tracking-[0.28em] text-purple-700">
                Admin
            </p>
            <h1 class="mt-2 text-4xl font-black text-[#202427]">
                Edit Artikel
            </h1>
        </div>

        <form action="{{ route('admin.artikel.update', $artikel) }}" method="POST" enctype="multipart/form-data" class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
            @csrf
            @method('PUT')

            <div class="space-y-5">
                <div>
                    <label for="judul" class="mb-2 block text-sm font-black text-[#202427]">Judul</label>
                    <input type="text" id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 font-semibold outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100">
                    @error('judul')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="ringkasan" class="mb-2 block text-sm font-black text-[#202427]">Ringkasan</label>
                    <textarea id="ringkasan" name="ringkasan" rows="3" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 font-semibold outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100">{{ old('ringkasan', $artikel->ringkasan) }}</textarea>
                    @error('ringkasan')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="isi" class="mb-2 block text-sm font-black text-[#202427]">Isi</label>
                    <textarea id="isi" name="isi" rows="8" class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 font-semibold outline-none focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100">{{ old('isi', $artikel->isi) }}</textarea>
                    @error('isi')
                        <p class="mt-2 text-sm font-semibold text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="gambar" class="mb-2 block text-sm font-black text-[#202427]">Gambar</label>
                    @if ($artikel->gambar)
                        @php
                            $image = str_contains($artikel->gambar, '/') ? asset('storage/' . $artikel->gambar) : asset('image/' . $artikel->gambar);
                        @endphp
                        <img src="{{ $image }}" alt="{{ $artikel->judul }}" class="mb-4 h-40 w-64 rounded-xl object-cover">
                    @endif
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
                <a href="{{ route('admin.artikel.index') }}" class="rounded-full border border-slate-300 px-6 py-3 text-sm font-black text-slate-700 transition hover:border-purple-400 hover:text-purple-800">
                    Batal
                </a>
            </div>
        </form>
    </div>
</section>
@endsection
