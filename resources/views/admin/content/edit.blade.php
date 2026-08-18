@extends('layouts.app')

@section('title', 'Kelola Konten Website')

@section('content')
<x-page-hero
    title="Kelola Konten Website"
    subtitle="Edit teks halaman publik tanpa membuka file code"
/>

@php
    $field = function ($name, $label, $type = 'text', $rows = 3) use ($content, $errors) {
        $value = old($name, $content[$name] ?? '');
        $errorClass = $errors->has($name) ? ' is-invalid' : '';

        echo '<div class="mb-3">';
        echo '<label for="' . e($name) . '" class="form-label fw-bold">' . e($label) . '</label>';

        if ($type === 'textarea') {
            echo '<textarea id="' . e($name) . '" name="' . e($name) . '" rows="' . e($rows) . '" class="form-control' . e($errorClass) . '">' . e($value) . '</textarea>';
        } else {
            echo '<input type="' . e($type) . '" id="' . e($name) . '" name="' . e($name) . '" value="' . e($value) . '" class="form-control' . e($errorClass) . '">';
        }

        if ($errors->has($name)) {
            echo '<div class="invalid-feedback">' . e($errors->first($name)) . '</div>';
        }

        echo '</div>';
    };
@endphp

<section class="container py-5">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.content.update') }}" method="POST" class="admin-content-form">
        @csrf
        @method('PUT')

        <div class="row g-4">
            <div class="col-lg-6">
                <x-content-card title="Halaman Home" class="h-100">
                    @php $field('home_title', 'Judul Hero'); @endphp
                    @php $field('home_subtitle', 'Subtitle Hero'); @endphp
                    @php $field('home_stat_1_title', 'Stat 1 - Judul'); @endphp
                    @php $field('home_stat_1_text', 'Stat 1 - Teks'); @endphp
                    @php $field('home_stat_2_title', 'Stat 2 - Judul'); @endphp
                    @php $field('home_stat_2_text', 'Stat 2 - Teks'); @endphp
                    @php $field('home_stat_3_title', 'Stat 3 - Judul'); @endphp
                    @php $field('home_stat_3_text', 'Stat 3 - Teks'); @endphp
                    @php $field('home_activity_heading', 'Heading Kegiatan'); @endphp
                    @php $field('home_activity_text', 'Teks Kegiatan'); @endphp
                    @php $field('home_article_heading', 'Heading Artikel Home'); @endphp
                </x-content-card>
            </div>

            <div class="col-lg-6">
                <x-content-card title="Halaman Profil" class="h-100">
                    @php $field('profile_title', 'Judul Hero Profil'); @endphp
                    @php $field('profile_subtitle', 'Subtitle Profil'); @endphp
                    @php $field('profile_intro_title', 'Judul Panel Profil'); @endphp
                    @php $field('profile_intro_text', 'Teks Panel Profil', 'textarea', 3); @endphp
                    @php $field('profile_about', 'Tentang Kami', 'textarea', 4); @endphp
                    @php $field('profile_activities', 'Kegiatan (satu baris per item)', 'textarea', 5); @endphp
                    @php $field('profile_vision', 'Visi', 'textarea', 3); @endphp
                    @php $field('profile_mission', 'Misi (satu baris per item)', 'textarea', 5); @endphp
                    @php $field('profile_board', 'Pengurus Harian (satu baris per item)', 'textarea', 7); @endphp
                    @php $field('profile_schedule', 'Jadwal Latihan'); @endphp
                    @php $field('profile_benefits', 'Manfaat (satu baris per item)', 'textarea', 5); @endphp
                    @php $field('instagram_url', 'Link Instagram', 'url'); @endphp
                    @php $field('instagram_label', 'Label Instagram'); @endphp
                </x-content-card>
            </div>

            <div class="col-lg-6">
                <x-content-card title="Halaman Galeri" class="h-100">
                    @php $field('gallery_title', 'Judul Hero Galeri'); @endphp
                    @php $field('gallery_subtitle', 'Subtitle Galeri'); @endphp
                    @php $field('gallery_heading', 'Heading Galeri'); @endphp
                    @php $field('gallery_text', 'Teks Galeri', 'textarea', 3); @endphp
                </x-content-card>
            </div>

            <div class="col-lg-6">
                <x-content-card title="Halaman Artikel" class="h-100">
                    @php $field('article_title', 'Judul Hero Artikel'); @endphp
                    @php $field('article_subtitle', 'Subtitle Artikel'); @endphp
                    @php $field('article_heading', 'Heading Daftar Artikel'); @endphp
                </x-content-card>
            </div>
        </div>

        <div class="admin-sticky-actions">
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Simpan Konten
            </button>
        </div>
    </form>
</section>
@endsection
