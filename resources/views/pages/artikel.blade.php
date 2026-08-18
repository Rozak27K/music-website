@extends('layouts.app')

@section('title', 'Artikel | Eskul Musik')

@section('content')

<x-page-hero
    title="Artikel Eskul Musik"
    subtitle="Informasi, kegiatan, dan manfaat mengikuti ekstrakurikuler musik"
/>

<!-- ARTIKEL -->
<section class="container py-5">
    <div class="section-heading text-center" data-reveal>
        <span class="section-kicker">Baca</span>
        <h2>Artikel Eskul Musik</h2>
    </div>

    <div class="article-search" data-reveal>
        <i class="bi bi-search"></i>
        <input type="search" data-article-search placeholder="Cari artikel...">
    </div>

    <div class="row g-4" data-article-list>
        @forelse ($artikels as $artikel)
        <div class="col-md-4 article-item">
            <x-article-card :artikel="$artikel" />
        </div>
        @empty
        <div class="col-12 text-center empty-state">
            <p>Belum ada artikel.</p>
        </div>
        @endforelse
    </div>

    <p class="empty-state text-center d-none" data-empty-search>Artikel tidak ditemukan.</p>
</section>

@endsection
