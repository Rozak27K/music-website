@extends('layouts.app')

@section('title', 'Artikel | Eskul Musik')

@section('content')
<x-page-hero
    :title="$content['article_title']"
    :subtitle="$content['article_subtitle']"
/>

<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-6">
        <div class="fade-up mx-auto mb-10 max-w-2xl text-center">
            <p class="text-sm font-black uppercase tracking-[0.28em] text-purple-700">
                Baca
            </p>

            <h2 class="mt-3 text-4xl font-black text-[#202427] md:text-5xl">
                {{ $content['article_heading'] }}
            </h2>
        </div>

        <div class="fade-up mx-auto mb-12 max-w-xl">
            <label for="article-search" class="sr-only">Cari artikel</label>
            <input
                id="article-search"
                type="search"
                data-article-search
                placeholder="Cari artikel..."
                class="w-full rounded-full border border-slate-300 bg-slate-50 px-6 py-4 font-semibold text-[#202427] outline-none transition placeholder:text-slate-400 focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100"
            >
        </div>

        <div class="grid gap-7 md:grid-cols-3" data-article-list>
            @forelse ($artikels as $artikel)
                <x-article-card :artikel="$artikel" />
            @empty
                <div class="rounded-2xl border border-dashed border-slate-300 bg-slate-50 py-12 text-center font-semibold text-slate-500 md:col-span-3">
                    Belum ada artikel.
                </div>
            @endforelse
        </div>

        <p class="mt-10 hidden rounded-2xl border border-dashed border-slate-300 bg-slate-50 py-10 text-center font-semibold text-slate-500" data-empty-search>
            Artikel tidak ditemukan.
        </p>
    </div>
</section>
@endsection
