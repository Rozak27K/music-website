@extends('layouts.app')

@section('title', 'Home | Eskul Musik')

@section('content')

<x-page-hero
    title="Selamat Datang di Website Eskul Musik"
    subtitle="Tempat mengembangkan bakat musik siswa"
/>

<!-- KEGIATAN -->
<section class="container py-5">
    <h2 class="text-center mb-4">Kegiatan Kami</h2>
    <p class="text-center mb-2">pencet gambar untuk melanjutkan ke halaman galeri</p>

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
    <h2 class="text-center mb-4">Artikel</h2>

    @forelse ($artikels as $artikel)
        <x-content-card class="mb-3">
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
        <a href="{{ route('artikel') }}" class="btn btn-primary">Lihat Artikel Lainnya</a>
    </div>
</section>

@endsection
