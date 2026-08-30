@extends('layouts.app')

@php
    $lines = fn ($value) => array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $value)));

    $cards = [
        [
            'title' => 'Tentang Kami',
            'text' => $content['profile_about'],
        ],
        [
            'title' => 'Visi',
            'text' => $content['profile_vision'],
        ],
        [
            'title' => 'Jadwal Latihan',
            'text' => $content['profile_schedule'],
        ],
    ];

    $lists = [
        [
            'title' => 'Kegiatan',
            'items' => $lines($content['profile_activities']),
        ],
        [
            'title' => 'Misi',
            'items' => $lines($content['profile_mission']),
        ],
        [
            'title' => 'Pengurus Harian',
            'items' => $lines($content['profile_board']),
        ],
        [
            'title' => 'Manfaat',
            'items' => $lines($content['profile_benefits']),
        ],
    ];
@endphp

@section('title', 'Profil | Eskul Musik')

@section('content')
<x-page-hero
    :title="$content['profile_title']"
    :subtitle="$content['profile_subtitle']"
/>

<section class="bg-[#f4f4f5] py-20">
    <div class="mx-auto max-w-7xl px-6">
        <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr]">
            <aside class="fade-up rounded-2xl bg-[#202427] p-8 text-white shadow-2xl shadow-slate-300/40">
                <div class="flex items-center gap-4">
                    <img
                        src="{{ asset('image/musiklogo-clean.png') }}"
                        class="h-20 w-20 object-contain drop-shadow-[0_10px_18px_rgba(0,0,0,0.35)]"
                        alt="Logo Eskul Musik"
                    >

                    <img
                        src="{{ asset('image/smk-logo-clean.png') }}"
                        class="h-16 w-16 object-contain drop-shadow-[0_10px_18px_rgba(0,0,0,0.3)]"
                        alt="Logo SMKN 1 Dukuhturi"
                    >
                </div>

                <h2 class="mt-8 text-3xl font-black">
                    {{ $content['profile_intro_title'] }}
                </h2>

                <p class="mt-4 leading-8 text-slate-300">
                    {{ $content['profile_intro_text'] }}
                </p>

                <a
                    href="{{ $content['instagram_url'] }}"
                    target="_blank"
                    rel="noopener"
                    class="mt-8 inline-flex rounded-full bg-purple-600 px-6 py-3 text-sm font-black text-white transition hover:bg-purple-500"
                >
                    {{ $content['instagram_label'] }}
                </a>
            </aside>

            <div class="grid gap-5">
                @foreach ($cards as $card)
                    <article class="fade-up rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                        <h2 class="text-2xl font-black text-[#202427]">
                            {{ $card['title'] }}
                        </h2>

                        <p class="mt-4 leading-8 text-slate-600">
                            {{ $card['text'] }}
                        </p>
                    </article>
                @endforeach
            </div>
        </div>

        <div class="mt-8 grid gap-5 md:grid-cols-2">
            @foreach ($lists as $list)
                <article class="fade-up rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                    <h2 class="text-2xl font-black text-[#202427]">
                        {{ $list['title'] }}
                    </h2>

                    <ul class="mt-5 space-y-3">
                        @foreach ($list['items'] as $item)
                            <li class="flex gap-3 leading-7 text-slate-600">
                                <span class="mt-2 h-2 w-2 shrink-0 rounded-full bg-purple-600"></span>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                </article>
            @endforeach
        </div>
    </div>
</section>
@endsection
