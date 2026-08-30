@props(['artikel'])

@php
    $image = $artikel->gambar
        ? (str_contains($artikel->gambar, '/') ? asset('storage/' . $artikel->gambar) : asset('image/' . $artikel->gambar))
        : asset('image/event.jpeg');
@endphp

<article
    class="fade-up flex h-full flex-col overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-2 hover:shadow-xl"
    data-article-item
    data-title="{{ \Illuminate\Support\Str::lower($artikel->judul . ' ' . $artikel->isi) }}"
>
    <img
        src="{{ $image }}"
        class="h-56 w-full object-cover"
        alt="{{ $artikel->judul }}"
    >

    <div class="flex flex-1 flex-col p-6">
        <p class="text-sm font-bold text-purple-700">
            {{ $artikel->created_at->format('d M Y') }}
        </p>

        <h2 class="mt-3 text-xl font-black text-[#202427]">
            {{ $artikel->judul }}
        </h2>

        <p class="mt-3 flex-1 leading-7 text-slate-600">
            {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 120) }}
        </p>

        <a
            href="{{ route('artikel.detail', $artikel) }}"
            class="mt-6 inline-flex w-fit rounded-full bg-[#202427] px-5 py-3 text-sm font-black text-white transition hover:bg-purple-800"
        >
            Selengkapnya
        </a>
    </div>
</article>
