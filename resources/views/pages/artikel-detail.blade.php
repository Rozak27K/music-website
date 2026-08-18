@extends('layouts.app')

@section('title', $artikel->judul . ' | Eskul Musik')

@section('content')
<x-page-hero :title="$artikel->judul" subtitle="Artikel Eskul Musik" />

<section class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            @if ($artikel->gambar)
                <img src="{{ asset('image/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid rounded mb-4 w-100">
            @endif

            <x-content-card class="p-2 article-detail-card">
                <h2 class="mb-3">{{ $artikel->judul }}</h2>
                <p class="text-muted">
                    Dibuat pada {{ $artikel->created_at->format('d M Y') }}
                </p>
                <p style="white-space: pre-line;">{{ $artikel->isi }}</p>

                <div class="mt-3">
                    <a href="{{ route('artikel') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali ke Artikel</a>
                </div>
            </x-content-card>
        </div>
    </div>
</section>
@endsection
