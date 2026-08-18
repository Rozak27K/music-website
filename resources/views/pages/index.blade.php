@extends('layouts.app')

@section('title', 'Home | Eskul Musik')

@section('content')

<x-page-hero
    :title="$content['home_title']"
    :subtitle="$content['home_subtitle']"
/>

<section class="container intro-strip" data-reveal>
    <div class="row g-3 text-center">
        <div class="col-md-4">
            <div class="mini-stat">
                <strong>{{ $content['home_stat_1_title'] }}</strong>
                <span>{{ $content['home_stat_1_text'] }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mini-stat">
                <strong>{{ $content['home_stat_2_title'] }}</strong>
                <span>{{ $content['home_stat_2_text'] }}</span>
            </div>
        </div>
        <div class="col-md-4">
            <div class="mini-stat">
                <strong>{{ $content['home_stat_3_title'] }}</strong>
                <span>{{ $content['home_stat_3_text'] }}</span>
            </div>
        </div>
    </div>
</section>

<!-- KEGIATAN -->
<section class="container py-5">
    <div class="section-heading text-center" data-reveal>
        <span class="section-kicker">Eksplorasi</span>
        <h2>{{ $content['home_activity_heading'] }}</h2>
        <p>{{ $content['home_activity_text'] }}</p>
    </div>

    <div class="row g-4 justify-content-center">

        @foreach ([
            ['img' => 'band.jpeg', 'title' => 'Band'],
            ['img' => 'event.jpeg', 'title' => 'Event'],
            ['img' => 'padus.jpeg', 'title' => 'Paduan Suara']
        ] as $item)

        <div class="col-md-3">
            <x-image-card :image="$item['img']" :title="$item['title']" :href="url('/galeri')" />
        </div>

        @endforeach

    </div>
</section>

<!-- ARTIKEL -->
<section class="container pb-5">
    <div class="section-heading text-center" data-reveal>
        <span class="section-kicker">Cerita terbaru</span>
        <h2>{{ $content['home_article_heading'] }}</h2>
    </div>

    @forelse ($artikels as $artikel)
        <x-content-card class="mb-3 article-preview">
            <h4>{{ $artikel->judul }}</h4>
            <p>
                {{ \Illuminate\Support\Str::limit($artikel->isi, 100) }}
                <a href="{{ route('artikel.detail', $artikel) }}">selengkapnya...</a>
            </p>
        </x-content-card>
    @empty
        <x-content-card class="mb-3">
            <h4>BAND</h4>
            <p>Band adalah sekelompok musisi... <a href="{{ route('artikel') }}">selengkapnya...</a></p>
        </x-content-card>

        <x-content-card class="mb-3">
            <h4>Paduan Suara</h4>
            <p>Paduan suara adalah kelompok penyanyi... <a href="{{ route('artikel') }}">selengkapnya...</a></p>
        </x-content-card>

        <x-content-card class="mb-3">
            <h4>LATIHAN RUTIN</h4>
            <p>Latihan padus setiap hari rabu... <a href="{{ route('artikel') }}">selengkapnya...</a></p>
        </x-content-card>
    @endforelse

    <div class="text-center mt-4">
        <a href="{{ route('artikel') }}" class="btn btn-primary">Lihat Artikel Lainnya <i class="bi bi-arrow-right"></i></a>
    </div>
</section>

@endsection
