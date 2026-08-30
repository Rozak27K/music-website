@extends('layouts.app')

@php
    $activities = [
        [
            'title' => 'Latihan Band',
            'text' => 'Sesi latihan instrumen, aransemen lagu, dan kekompakan antar pemain.',
            'image' => 'band.jpeg',
        ],
        [
            'title' => 'Paduan Suara',
            'text' => 'Latihan vokal bersama untuk membangun harmoni, disiplin, dan percaya diri.',
            'image' => 'padus.jpeg',
        ],
        [
            'title' => 'Pentas Musik',
            'text' => 'Kesempatan tampil dalam acara sekolah dan menampilkan hasil latihan.',
            'image' => 'event.jpeg',
        ],
    ];

    $homeGalleryItems = ($galeris ?? collect())->take(4)->map(function ($item) {
        return [
            'title' => $item->judul,
            'image' => str_contains($item->gambar, '/') ? asset('storage/' . $item->gambar) : asset('image/' . $item->gambar),
        ];
    });
@endphp

@section('title', 'Eskul Musik | SMKN 1 Dukuhturi')

@section('content')
<section class="relative overflow-hidden bg-[#202427]">
    <div class="absolute inset-0 bg-cover bg-center opacity-25" style="background-image: url('{{ asset('image/event.jpeg') }}')"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-[#202427] via-purple-900/85 to-purple-700/80"></div>

    <div class="relative mx-auto grid min-h-[520px] max-w-7xl items-center gap-10 px-6 py-20 lg:grid-cols-[1.1fr_0.9fr] lg:py-24">
        <div class="fade-up text-center lg:text-left">
            <p class="text-sm font-bold uppercase tracking-[0.28em] text-purple-100">
                Ekstrakurikuler Musik
            </p>

            <h1 class="mt-5 text-4xl font-bold leading-tight text-white md:text-6xl">
                Selamat Datang di Website Eskul Musik
            </h1>

            <p class="mx-auto mt-6 max-w-2xl text-lg leading-8 text-white/90 lg:mx-0">
                Tempat mengembangkan bakat musik siswa SMKN 1 Dukuhturi melalui latihan, dokumentasi, artikel, dan karya bersama.
            </p>

            <div class="mt-9 flex flex-wrap justify-center gap-4 lg:justify-start">
                <a
                    href="{{ route('galeri') }}"
                    class="rounded-full bg-white px-7 py-3.5 text-sm font-bold text-purple-800 shadow-lg shadow-purple-950/20 transition hover:-translate-y-1 hover:bg-purple-50"
                >
                    Lihat Kegiatan
                </a>

                <a
                    href="{{ route('profil') }}"
                    class="rounded-full border border-white/35 bg-white/10 px-7 py-3.5 text-sm font-bold text-white backdrop-blur transition hover:-translate-y-1 hover:bg-white/20"
                >
                    Tentang Kami
                </a>
            </div>
        </div>

        <div class="fade-up hidden lg:block">
            <div class="music-logo-visual relative mx-auto flex h-[390px] max-w-md items-center justify-center" data-music-logo>
                <div class="absolute inset-8 rounded-full border border-white/15" data-logo-ring></div>
                <div class="absolute inset-16 rounded-full border border-purple-200/25" data-logo-ring></div>

                <div class="absolute inset-0" data-logo-notes></div>

                <div class="relative z-10 flex h-52 w-52 items-center justify-center rounded-full p-1 drop-shadow-[0_24px_42px_rgba(20,8,38,0.45)]" data-logo-core>
                    <img
                        src="{{ asset('image/musiklogo-clean.png') }}"
                        alt="Logo Eskul Musik"
                        class="h-full w-full object-contain"
                    >
                </div>

                <div class="absolute bottom-8 z-20 flex h-16 items-end gap-2 rounded-full border border-white/20 bg-white/10 px-5 py-3 backdrop-blur" data-logo-bars>
                    @for ($i = 0; $i < 11; $i++)
                        <span class="block w-2 rounded-full bg-white/85"></span>
                    @endfor
                </div>

                <div class="absolute right-4 top-12 z-20 rounded-xl bg-white px-5 py-4 text-[#202427] shadow-xl">
                    <p class="text-sm font-semibold text-purple-700">
                        SMKN 1 Dukuhturi
                    </p>
                    <p class="mt-1 text-xl font-bold">
                        Musik dan Karya
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#f4f4f5] py-20">
    <div class="mx-auto max-w-7xl px-6">
        <div class="fade-up mx-auto mb-12 max-w-2xl text-center">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-purple-700">
                Kegiatan
            </p>
            <h2 class="mt-3 text-4xl font-bold text-[#202427] md:text-5xl">
                Kegiatan Kami
            </h2>
            <p class="mt-5 leading-7 text-slate-600">
                Aktivitas rutin dan penampilan yang membantu siswa berkembang sebagai musisi muda.
            </p>
        </div>

        <div class="grid gap-7 md:grid-cols-3">
            @foreach ($activities as $activity)
                <article class="fade-up group overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-2xl">
                    <div class="relative overflow-hidden">
                        <img
                            src="{{ asset('image/' . $activity['image']) }}"
                            alt="{{ $activity['title'] }}"
                            class="h-72 w-full object-cover transition duration-700 group-hover:scale-110"
                        >
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-80"></div>
                        <h3 class="absolute bottom-5 left-5 right-5 text-2xl font-bold text-white">
                            {{ $activity['title'] }}
                        </h3>
                    </div>

                    <p class="p-6 leading-7 text-slate-600">
                        {{ $activity['text'] }}
                    </p>
                </article>
            @endforeach
        </div>
    </div>
</section>

<section class="bg-white py-20">
    <div class="mx-auto grid max-w-7xl items-center gap-12 px-6 lg:grid-cols-[0.95fr_1.05fr]">
        <div class="fade-up grid grid-cols-2 gap-4">
            <img src="{{ asset('image/event1.jpeg') }}" alt="Dokumentasi musik" class="h-56 w-full rounded-2xl object-cover">
            <img src="{{ asset('image/tampil.jpeg') }}" alt="Penampilan musik" class="mt-10 h-56 w-full rounded-2xl object-cover">
            <img src="{{ asset('image/rayis.jpeg') }}" alt="Latihan musik" class="h-56 w-full rounded-2xl object-cover">
            <img src="{{ asset('image/padus.jpeg') }}" alt="Paduan suara" class="mt-10 h-56 w-full rounded-2xl object-cover">
        </div>

        <div class="fade-up">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-purple-700">
                Tentang Kami
            </p>
            <h2 class="mt-3 text-4xl font-bold leading-tight text-[#202427] md:text-5xl">
                Berkarya bersama melalui musik
            </h2>
            <p class="mt-6 leading-8 text-slate-600">
                Eskul Musik menjadi ruang bagi siswa untuk belajar instrumen, vokal, kerja sama tim, dan keberanian tampil di depan umum.
            </p>
            <p class="mt-4 leading-8 text-slate-600">
                Setiap latihan dibuat menyenangkan, terarah, dan dekat dengan kegiatan sekolah agar bakat siswa bisa tumbuh dengan percaya diri.
            </p>

            <div class="mt-8 flex flex-wrap gap-4">
                <a href="{{ route('profil') }}" class="rounded-full bg-[#202427] px-7 py-3.5 text-sm font-bold text-white transition hover:-translate-y-1 hover:bg-purple-800">
                    Selengkapnya
                </a>
                <a href="{{ route('artikel') }}" class="rounded-full border border-slate-300 px-7 py-3.5 text-sm font-bold text-[#202427] transition hover:-translate-y-1 hover:border-purple-400 hover:text-purple-800">
                    Baca Artikel
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#f4f4f5] py-20">
    <div class="mx-auto max-w-7xl px-6">
        <div class="fade-up mb-12 flex flex-col justify-between gap-5 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-bold uppercase tracking-[0.22em] text-purple-700">
                    Dokumentasi
                </p>
                <h2 class="mt-3 text-4xl font-bold text-[#202427] md:text-5xl">
                    Galeri Pilihan
                </h2>
            </div>

            <a href="{{ route('galeri') }}" class="font-bold text-purple-700 transition hover:text-purple-950">
                Buka Galeri
            </a>
        </div>

        <div class="grid gap-5 md:grid-cols-4">
            @forelse ($homeGalleryItems as $item)
                <img
                    src="{{ $item['image'] }}"
                    class="fade-up h-64 w-full rounded-2xl object-cover shadow-sm transition hover:-translate-y-2 hover:shadow-xl"
                    alt="{{ $item['title'] }}"
                >
            @empty
                <div class="fade-up rounded-2xl border border-dashed border-slate-300 bg-white py-12 text-center font-semibold text-slate-500 md:col-span-4">
                    Belum ada dokumentasi.
                </div>
            @endforelse
        </div>
    </div>
</section>

<section class="bg-white py-20">
    <div class="mx-auto max-w-7xl px-6">
        <div class="fade-up mx-auto mb-12 max-w-2xl text-center">
            <p class="text-sm font-bold uppercase tracking-[0.22em] text-purple-700">
                Informasi
            </p>
            <h2 class="mt-3 text-4xl font-bold text-[#202427] md:text-5xl">
                Artikel Terbaru
            </h2>
        </div>

        @if (isset($artikels) && $artikels->count())
            <div class="grid gap-7 md:grid-cols-3">
                @foreach ($artikels->take(3) as $artikel)
                    @php
                        $articleImage = $artikel->gambar
                            ? (str_contains($artikel->gambar, '/') ? asset('storage/' . $artikel->gambar) : asset('image/' . $artikel->gambar))
                            : null;
                    @endphp

                    <article class="fade-up overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                        @if ($artikel->gambar)
                            <img
                                src="{{ $articleImage }}"
                                class="h-56 w-full object-cover"
                                alt="{{ $artikel->judul }}"
                            >
                        @endif

                        <div class="p-6">
                            <p class="text-sm font-bold text-purple-700">
                                {{ $artikel->created_at->format('d M Y') }}
                            </p>

                            <h3 class="mt-3 text-xl font-bold text-[#202427]">
                                {{ $artikel->judul }}
                            </h3>

                            <p class="mt-3 leading-7 text-slate-600">
                                {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 120) }}
                            </p>

                            <a href="{{ route('artikel.detail', $artikel) }}" class="mt-5 inline-block font-bold text-purple-700 hover:text-purple-950">
                                Baca selengkapnya
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        @else
            <div class="fade-up rounded-2xl border border-dashed border-slate-300 bg-slate-50 py-12 text-center font-semibold text-slate-500">
                Belum ada artikel.
            </div>
        @endif
    </div>
</section>
@endsection
