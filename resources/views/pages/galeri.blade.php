@extends('layouts.app')

@section('title', 'Galeri | Eskul Musik')

@section('content')

<x-page-hero
    title="Galeri Eskul Musik"
    subtitle="Dokumentasi kegiatan dan penampilan kami"
/>

<!-- GALERI -->
<section class="container py-5">
    <div class="row g-4">
        @foreach ($galeris as $item)
        <div class="col-md-4 col-sm-6">
            <x-gallery-image :image="$item->gambar" :caption="$item->judul" />
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
        <div class="col-md-4 col-sm-6">
            
            @foreach ($group['images'] as $img)
                <x-gallery-image :image="$img" :caption="$group['title']" />
            @endforeach

        </div>
        @endforeach

    </div>
</section>

@endsection
