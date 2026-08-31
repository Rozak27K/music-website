@extends('layouts.app')

@php
    $galleryItems = $galeris->toBase()->map(function ($item) {
        return [
            'title' => $item->judul,
            'image' => $item->gambar,
            'description' => $item->deskripsi,
            'category' => $item->kategori ?: 'Dokumentasi',
        ];
    });

    $categories = $galleryItems
        ->pluck('category')
        ->filter()
        ->unique()
        ->values();
@endphp

@section('title', 'Galeri | Eskul Musik')

@section('content')
<x-page-hero
    :title="$content['gallery_title']"
    :subtitle="$content['gallery_subtitle']"
/>

<section class="bg-[#f4f4f5] py-20">
    <div class="mx-auto max-w-7xl px-6">
        <div class="grid gap-8 lg:grid-cols-[0.75fr_1.25fr] lg:items-end">
            <div class="fade-up">
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-purple-700">
                    Dokumentasi
                </p>

                <h2 class="mt-3 text-4xl font-bold leading-tight text-[#202427] md:text-5xl">
                    {{ $content['gallery_heading'] }}
                </h2>

                <p class="mt-5 leading-8 text-slate-600">
                    {{ $content['gallery_text'] }}
                </p>
            </div>

            <div class="fade-up rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">
                <div class="grid gap-4 sm:grid-cols-3">
                    <div>
                        <p class="text-3xl font-bold text-[#202427]">{{ $galleryItems->count() }}</p>
                        <p class="mt-1 text-sm font-semibold text-slate-500">Dokumentasi</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-[#202427]">{{ $categories->count() }}</p>
                        <p class="mt-1 text-sm font-semibold text-slate-500">Kategori</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-[#202427]">{{ $galeris->count() }}</p>
                        <p class="mt-1 text-sm font-semibold text-slate-500">Tersimpan</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="fade-up sticky top-[86px] z-20 mt-12 border-y border-slate-200 bg-[#f4f4f5]/95 py-4 backdrop-blur" data-gallery-filters>
            <div class="flex flex-wrap gap-3">
                <button
                    type="button"
                    class="rounded-full bg-[#202427] px-5 py-2.5 text-sm font-bold text-white transition hover:bg-purple-800"
                    data-filter="all"
                >
                    Semua
                </button>

                @foreach ($categories as $category)
                    <button
                        type="button"
                        class="rounded-full border border-slate-300 bg-white px-5 py-2.5 text-sm font-bold text-slate-700 transition hover:border-purple-400 hover:text-purple-800"
                        data-filter="{{ \Illuminate\Support\Str::slug($category) }}"
                    >
                        {{ $category }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="mt-10 grid auto-rows-[220px] gap-5 md:grid-cols-2 lg:grid-cols-4">
            @forelse ($galleryItems as $item)
                @php
                    $source = str_contains($item['image'], '/') ? asset('storage/' . $item['image']) : asset('image/' . $item['image']);
                    $isFeatured = $loop->first;
                @endphp

                <a
                    href="{{ $source }}"
                    class="fade-up group relative overflow-hidden rounded-2xl bg-slate-200 shadow-sm transition hover:-translate-y-1 hover:shadow-xl {{ $isFeatured ? 'md:col-span-2 md:row-span-2' : '' }}"
                    aria-label="Buka foto {{ $item['title'] }}"
                    data-fancybox="gallery"
                    data-caption="{{ $item['title'] }}{{ !empty($item['description']) ? ' - ' . $item['description'] : '' }}"
                    data-thumb="{{ $source }}"
                    data-gallery-item
                    data-category="{{ \Illuminate\Support\Str::slug($item['category']) }}"
                    data-gallery-card
                >
                    <img
                        src="{{ $source }}"
                        alt="{{ $item['title'] }}"
                        class="h-full w-full object-cover transition duration-700 group-hover:scale-105"
                    >

                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent opacity-90"></div>
                    <div class="absolute inset-0 bg-purple-900/0 transition duration-300 group-hover:bg-purple-900/20"></div>

                    <div class="absolute bottom-0 left-0 right-0 p-5 text-white">
                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold backdrop-blur">
                            {{ $item['category'] }}
                        </span>

                        <h3 class="mt-3 text-xl font-bold {{ $isFeatured ? 'md:text-3xl' : '' }}">
                            {{ $item['title'] }}
                        </h3>

                        @if (!empty($item['description']) && $isFeatured)
                            <p class="mt-2 line-clamp-2 max-w-xl text-sm leading-6 text-white/80">
                                {{ $item['description'] }}
                            </p>
                        @endif

                        <span class="mt-4 inline-flex translate-y-2 rounded-full border border-white/25 bg-white/15 px-4 py-2 text-xs font-bold opacity-0 backdrop-blur transition duration-300 group-hover:translate-y-0 group-hover:opacity-100">
                            Lihat Foto
                        </span>
                    </div>
                </a>
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white py-12 text-center font-semibold text-slate-500 md:col-span-2 lg:col-span-4">
                    Belum ada dokumentasi.
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
