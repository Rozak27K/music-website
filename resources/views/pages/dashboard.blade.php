@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<x-page-hero
    title="Dashboard"
    subtitle="Halaman untuk mengelola konten website Eskul Musik"
/>

<section class="container py-5">
    <div class="row g-4">
        <div class="col-md-6">
            <x-content-card class="h-100">
                <h4>Kelola Konten Website</h4>
                <p>Ubah teks hero, profil, jadwal, Instagram, heading artikel, dan galeri tanpa edit code.</p>

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.content.edit') }}" class="btn btn-primary">Buka Admin Konten</a>
                @else
                    <div class="alert alert-warning mb-0">
                        Akun kamu belum punya akses admin.
                    </div>
                @endif
            </x-content-card>
        </div>

        <div class="col-md-6">
            <x-content-card class="h-100">
                <h4>Kelola Artikel</h4>
                <p>Tambah, edit, atau hapus artikel yang tampil di halaman artikel dan home.</p>

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.artikel') }}" class="btn btn-primary">Buka Artikel Admin</a>
                @else
                    <div class="alert alert-warning mb-0">
                        Akun kamu belum punya akses admin.
                    </div>
                @endif
            </x-content-card>
        </div>

        <div class="col-md-6">
            <x-content-card class="h-100">
                <h4>Kelola Galeri</h4>
                <p>Tambah, edit, atau hapus foto galeri tambahan.</p>

                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('admin.galeri') }}" class="btn btn-primary">Buka Galeri Admin</a>
                @else
                    <div class="alert alert-warning mb-0">
                        Akun kamu belum punya akses admin.
                    </div>
                @endif
            </x-content-card>
        </div>

        <div class="col-md-6">
            <x-content-card class="h-100">
                <h4>Akun Login</h4>
                <p class="mb-1"><strong>Nama:</strong> {{ auth()->user()->name }}</p>
                <p class="mb-1"><strong>Email:</strong> {{ auth()->user()->email }}</p>
                <p class="mb-0"><strong>Role:</strong> {{ auth()->user()->role }}</p>
            </x-content-card>
        </div>
    </div>
</section>
@endsection
