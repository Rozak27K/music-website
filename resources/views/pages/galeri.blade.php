@extends('layouts.app')

@section('title', 'Galeri | Eskul Musik')

@section('content')

<x-page-hero
    :title="$content['gallery_title']"
    :subtitle="$content['gallery_subtitle']"
/>

<!-- GALERI -->
<section class="container py-5">
    <div class="section-heading text-center" data-reveal>
        <span class="section-kicker">Dokumentasi</span>
        <h2>{{ $content['gallery_heading'] }}</h2>
        <p>{{ $content['gallery_text'] }}</p>
    </div>

    <div class="filter-bar" data-gallery-filters data-reveal>
        <button class="filter-btn active" type="button" data-filter="all">Semua</button>
        @foreach ($categories as $category)
            <button class="filter-btn" type="button" data-filter="{{ \Illuminate\Support\Str::slug($category) }}">{{ $category }}</button>
        @endforeach
    </div>

    <div class="row g-4 gallery-grid">
        @foreach ($galeris as $item)
        <div class="col-md-4 col-sm-6">
            <x-gallery-image :image="$item->gambar" :caption="$item->judul" :category="$item->kategori ?? $item->judul" />
        </div>
        @endforeach

        @php
        $galeri = [
            [
                'title' => 'Band',
                'images' => ['band.jpeg', 'aniss.jpeg']
            ],
            [
                'title' => 'Event',
                'images' => ['event.jpeg', 'tampil.jpeg', 'tampil 2.jpeg']
            ],
            [
                'title' => 'Paduan Suara',
                'images' => ['padus.jpeg', 'rayis.jpeg', 'foto bareng.jpeg']
            ]
        ];
        @endphp

        @foreach ($galeri as $group)
            @foreach ($group['images'] as $img)
            <div class="col-md-4 col-sm-6">
                <x-gallery-image :image="$img" :caption="$group['title']" />
            </div>
            @endforeach
        @endforeach

    </div>
</section>

@endsection
