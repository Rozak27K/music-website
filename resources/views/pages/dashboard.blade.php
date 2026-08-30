@extends('layouts.app')

@php
    $user = auth()->user();
    $isAdmin = $user->isAdmin();

    $stats = [
        [
            'label' => 'Foto Galeri',
            'value' => $jumlahGaleri ?? 0,
            'show' => $isAdmin,
        ],
        [
            'label' => 'Artikel',
            'value' => $jumlahArtikel ?? 0,
            'show' => $isAdmin,
        ],
        [
            'label' => 'Role Akun',
            'value' => $isAdmin ? 'Admin' : 'User',
            'show' => true,
        ],
    ];

    $adminActions = [
        [
            'title' => 'Kelola Artikel',
            'description' => 'Tambah, edit, dan hapus artikel yang tampil di website.',
            'href' => route('admin.artikel.index'),
            'label' => 'Buka Artikel',
        ],
        [
            'title' => 'Kelola Galeri',
            'description' => 'Atur dokumentasi kegiatan dan foto penampilan musik.',
            'href' => route('admin.galeri.index'),
            'label' => 'Buka Galeri',
        ],
        [
            'title' => 'Lihat Website',
            'description' => 'Cek tampilan halaman utama setelah konten diperbarui.',
            'href' => route('home'),
            'label' => 'Buka Home',
        ],
    ];

    $userActions = [
        [
            'title' => 'Lihat Galeri',
            'description' => 'Dokumentasi kegiatan dan penampilan Eskul Musik.',
            'href' => route('galeri'),
            'label' => 'Buka Galeri',
        ],
        [
            'title' => 'Baca Artikel',
            'description' => 'Informasi dan cerita terbaru seputar kegiatan musik.',
            'href' => route('artikel'),
            'label' => 'Buka Artikel',
        ],
        [
            'title' => 'Lihat Profil',
            'description' => 'Kenali visi, kegiatan, jadwal, dan pengurus Eskul Musik.',
            'href' => route('profil'),
            'label' => 'Buka Profil',
        ],
    ];

    $actions = $isAdmin ? $adminActions : $userActions;
@endphp

@section('title', 'Dashboard | Eskul Musik')

@section('content')
<section class="min-h-screen bg-slate-100 pt-20">
    <div class="bg-slate-950">
        <div class="mx-auto max-w-7xl px-6 py-16">
            <div class="grid gap-10 lg:grid-cols-[1.4fr_0.8fr] lg:items-end">
                <div>
                    <span class="inline-flex rounded-full border border-violet-300/30 bg-violet-400/10 px-4 py-2 text-sm font-semibold text-violet-200">
                        Dashboard Eskul Musik
                    </span>

                    <h1 class="mt-6 max-w-3xl text-4xl font-black leading-tight text-white md:text-6xl">
                        Halo, {{ $user->name }}
                    </h1>

                    <p class="mt-5 max-w-2xl text-base leading-8 text-slate-300 md:text-lg">
                        @if ($isAdmin)
                            Kelola konten website dari satu tempat yang ringkas dan mudah dipindai.
                        @else
                            Jelajahi informasi, dokumentasi, dan artikel terbaru dari Eskul Musik.
                        @endif
                    </p>
                </div>

                <div class="rounded-2xl border border-white/10 bg-white/5 p-6 text-white shadow-2xl shadow-slate-950/30">
                    <p class="text-sm font-semibold uppercase tracking-[0.2em] text-violet-200">
                        Akun Login
                    </p>

                    <div class="mt-5 space-y-4">
                        <div>
                            <p class="text-sm text-slate-400">Nama</p>
                            <p class="font-bold">{{ $user->name }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-slate-400">Email</p>
                            <p class="break-words font-bold">{{ $user->email }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-slate-400">Role</p>
                            <p class="font-bold">{{ $isAdmin ? 'Admin' : 'User' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto max-w-7xl px-6 py-10">
        <div class="-mt-20 grid gap-4 md:grid-cols-3">
            @foreach ($stats as $stat)
                @if ($stat['show'])
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-lg shadow-slate-200/70">
                        <p class="text-sm font-semibold text-slate-500">{{ $stat['label'] }}</p>
                        <p class="mt-3 text-3xl font-black text-slate-950">{{ $stat['value'] }}</p>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="mt-10 grid gap-5 lg:grid-cols-3">
            @foreach ($actions as $action)
                <article class="flex min-h-64 flex-col justify-between rounded-2xl border border-slate-200 bg-white p-7 shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
                    <div>
                        <div class="mb-6 flex h-12 w-12 items-center justify-center rounded-xl bg-violet-100 text-xl font-black text-violet-700">
                            {{ $loop->iteration }}
                        </div>

                        <h2 class="text-2xl font-black text-slate-950">
                            {{ $action['title'] }}
                        </h2>

                        <p class="mt-3 leading-7 text-slate-600">
                            {{ $action['description'] }}
                        </p>
                    </div>

                    <a
                        href="{{ $action['href'] }}"
                        class="mt-8 inline-flex w-fit items-center rounded-full bg-violet-700 px-5 py-3 text-sm font-bold text-white transition hover:bg-violet-600"
                    >
                        {{ $action['label'] }}
                    </a>
                </article>
            @endforeach
        </div>

        @if ($isAdmin)
            <div class="mt-10 grid gap-5 lg:grid-cols-2">
                <section class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-xl font-black text-slate-950">Galeri Terbaru</h2>
                        <a href="{{ route('admin.galeri.index') }}" class="text-sm font-bold text-violet-700 hover:text-violet-900">
                            Kelola
                        </a>
                    </div>

                    <div class="mt-5 divide-y divide-slate-100">
                        @forelse (($galeriTerbaru ?? collect()) as $galeri)
                            <div class="flex items-center justify-between gap-4 py-4">
                                <p class="font-semibold text-slate-800">{{ $galeri->judul }}</p>
                                <span class="shrink-0 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                    {{ $galeri->created_at->format('d M Y') }}
                                </span>
                            </div>
                        @empty
                            <p class="py-6 text-slate-500">Belum ada foto galeri.</p>
                        @endforelse
                    </div>
                </section>

                <section class="rounded-2xl border border-slate-200 bg-white p-7 shadow-sm">
                    <div class="flex items-center justify-between gap-4">
                        <h2 class="text-xl font-black text-slate-950">Artikel Terbaru</h2>
                        <a href="{{ route('admin.artikel.index') }}" class="text-sm font-bold text-violet-700 hover:text-violet-900">
                            Kelola
                        </a>
                    </div>

                    <div class="mt-5 divide-y divide-slate-100">
                        @forelse (($artikelTerbaru ?? collect()) as $artikel)
                            <div class="flex items-center justify-between gap-4 py-4">
                                <p class="font-semibold text-slate-800">{{ $artikel->judul }}</p>
                                <span class="shrink-0 rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-500">
                                    {{ $artikel->created_at->format('d M Y') }}
                                </span>
                            </div>
                        @empty
                            <p class="py-6 text-slate-500">Belum ada artikel.</p>
                        @endforelse
                    </div>
                </section>
            </div>
        @endif
    </div>
</section>
@endsection
