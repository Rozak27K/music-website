@extends('layouts.app')

@section('title', $artikel->judul . ' | Eskul Musik')

@section('content')
<x-page-hero :title="$artikel->judul" subtitle="Artikel Eskul Musik" />

<section class="bg-white py-20">
    <div class="mx-auto max-w-4xl px-6">
        @php
            $image = $artikel->gambar
                ? (str_contains($artikel->gambar, '/') ? asset('storage/' . $artikel->gambar) : asset('image/' . $artikel->gambar))
                : null;
        @endphp

        @if ($image)
            <img
                src="{{ $image }}"
                alt="{{ $artikel->judul }}"
                class="fade-up mb-8 h-[420px] w-full rounded-2xl object-cover shadow-lg"
            >
        @endif

        <article class="fade-up rounded-2xl border border-slate-200 bg-white p-7 shadow-sm md:p-10">
            <p class="text-sm font-black uppercase tracking-[0.22em] text-purple-700">
                {{ $artikel->created_at->format('d M Y') }}
            </p>

            <h1 class="mt-4 text-3xl font-black leading-tight text-[#202427] md:text-5xl">
                {{ $artikel->judul }}
            </h1>

            <div class="mt-8 whitespace-pre-line text-lg leading-9 text-slate-700">
                {{ $artikel->isi }}
            </div>

            <a
                href="{{ route('artikel') }}"
                class="mt-10 inline-flex rounded-full bg-[#202427] px-6 py-3 text-sm font-black text-white transition hover:bg-purple-800"
            >
                Kembali ke Artikel
            </a>
        </article>
    </div>
</section>
@endsection
