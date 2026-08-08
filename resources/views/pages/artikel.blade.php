@extends('layouts.app')

@section('title', 'Artikel | Eskul Musik')

@section('content')

<x-page-hero
    title="Artikel Eskul Musik"
    subtitle="Informasi, kegiatan, dan manfaat mengikuti ekstrakurikuler musik"
/>

<!-- ARTIKEL -->
<section class="container py-5">
    <div class="row g-4">
        @forelse ($artikels as $artikel)
        <div class="col-md-4">
            <x-article-card :artikel="$artikel" />
        </div>
        @empty
        <div class="col-12 text-center">
            <p>Belum ada artikel.</p>
        </div>
        @endforelse
    </div>
</section>

@endsection
