@extends('layouts.app')

@section('title', 'Profil | Eskul Musik')

@section('content')

<x-page-hero
    :title="$content['profile_title']"
    :subtitle="$content['profile_subtitle']"
/>

@php
    $lines = fn ($value) => array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $value)));
@endphp

<!-- CONTENT -->
<section class="container py-5">
    <div class="row g-4 justify-content-center align-items-start">

        <!-- LOGO -->
        <div class="col-lg-4 text-center">
            <div class="profile-logo-panel" data-reveal>
                <img src="{{ asset('image/musiklogo.png') }}" class="logo-img" alt="Logo Musik">
                <h2>{{ $content['profile_intro_title'] }}</h2>
                <p>{{ $content['profile_intro_text'] }}</p>
            </div>
        </div>

        <!-- KIRI -->
        <div class="col-lg-4">
            <div class="profile-card">

                @php
                $kiri = [
                    [
                        'title' => 'Tentang Kami',
                        'content' => '<p class="text-center">' . e($content['profile_about']) . '</p>'
                    ],
                    [
                        'title' => 'Kegiatan',
                        'content' => '<ul><li>' . implode('</li><li>', array_map('e', $lines($content['profile_activities']))) . '</li></ul>'
                    ]
                ];
                @endphp

                @foreach ($kiri as $item)
                <x-content-card :title="$item['title']" class="mb-3">
                    {!! $item['content'] !!}
                </x-content-card>
                @endforeach

                <!-- SOCIAL -->
                <x-content-card title="Instagram" class="text-center">
                    <div class="social-icons">
                        <a href="{{ $content['instagram_url'] }}" target="_blank" rel="noopener">
                            <i class="bi bi-instagram"></i>
                        </a>
                    </div>
                    <p class="mt-2">
                        <a href="{{ $content['instagram_url'] }}" target="_blank" rel="noopener">
                            {{ $content['instagram_label'] }}
                        </a>
                    </p>
                </x-content-card>

            </div>
        </div>

        <!-- KANAN -->
        <div class="col-lg-4">
            <div class="profile-card">

                @php
                $kanan = [
                    [
                        'title' => 'Visi',
                        'content' => '<p class="text-center">' . e($content['profile_vision']) . '</p>'
                    ],
                    [
                        'title' => 'Misi',
                        'content' => '<ul><li>' . implode('</li><li>', array_map('e', $lines($content['profile_mission']))) . '</li></ul>'
                    ],
                    [
                        'title' => 'Pengurus Harian',
                        'content' => '<ul><li>' . implode('</li><li>', array_map('e', $lines($content['profile_board']))) . '</li></ul>'
                    ],
                    [
                        'title' => 'Jadwal Latihan',
                        'content' => '<p class="text-center">' . e($content['profile_schedule']) . '</p>'
                    ],
                    [
                        'title' => 'Manfaat',
                        'content' => '<ul><li>' . implode('</li><li>', array_map('e', $lines($content['profile_benefits']))) . '</li></ul>'
                    ]
                ];
                @endphp

                @foreach ($kanan as $item)
                <x-content-card :title="$item['title']" class="mb-3">
                    {!! $item['content'] !!}
                </x-content-card>
                @endforeach

            </div>
        </div>

    </div>
</section>

@endsection
