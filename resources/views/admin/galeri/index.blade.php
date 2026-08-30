@extends('layouts.app')

@section('title', 'Kelola Galeri')

@section('content')
<section class="bg-[#f4f4f5] py-12">
    <div class="mx-auto max-w-7xl px-6">
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <p class="text-sm font-black uppercase tracking-[0.28em] text-purple-700">
                    Admin
                </p>
                <h1 class="mt-2 text-4xl font-black text-[#202427]">
                    Kelola Galeri
                </h1>
            </div>

            <a href="{{ route('admin.galeri.create') }}" class="rounded-full bg-[#202427] px-6 py-3 text-sm font-black text-white transition hover:bg-purple-800">
                Tambah Galeri
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 font-semibold text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            @forelse ($galeris as $galeri)
                @php
                    $image = str_contains($galeri->gambar, '/') ? asset('storage/' . $galeri->gambar) : asset('image/' . $galeri->gambar);
                @endphp

                <article class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <img src="{{ $image }}" alt="{{ $galeri->judul }}" class="h-64 w-full object-cover">

                    <div class="p-6">
                        <h2 class="text-xl font-black text-[#202427]">
                            {{ $galeri->judul }}
                        </h2>

                        <span class="mt-3 inline-flex rounded-full bg-purple-50 px-3 py-1 text-xs font-black text-purple-700">
                            {{ $galeri->kategori }}
                        </span>

                        <p class="mt-3 min-h-14 leading-7 text-slate-600">
                            {{ $galeri->deskripsi ?: 'Tidak ada deskripsi.' }}
                        </p>

                        <div class="mt-6 flex gap-2">
                            <a href="{{ route('admin.galeri.edit', $galeri) }}" class="rounded-full bg-amber-100 px-4 py-2 text-sm font-black text-amber-700 hover:bg-amber-200">
                                Edit
                            </a>

                            <form action="{{ route('admin.galeri.destroy', $galeri) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="rounded-full bg-red-100 px-4 py-2 text-sm font-black text-red-700 hover:bg-red-200" onclick="return confirm('Hapus galeri ini?')">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white py-12 text-center font-semibold text-slate-500 sm:col-span-2 lg:col-span-3">
                    Belum ada galeri tambahan.
                </div>
            @endforelse
        </div>

        <div class="mt-6">
            {{ $galeris->links() }}
        </div>
    </div>
</section>
@endsection
