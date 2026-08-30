@props(['image', 'caption', 'alt' => null, 'category' => null])

@php
    $source = str_contains($image, '/') ? asset('storage/' . $image) : asset('image/' . $image);
    $categorySlug = \Illuminate\Support\Str::slug($category ?? $caption);
@endphp

<a
    href="{{ $source }}"
    class="fade-up group relative block overflow-hidden rounded-2xl bg-slate-200 shadow-sm transition hover:-translate-y-2 hover:shadow-2xl"
    data-gallery-item
    data-category="{{ $categorySlug }}"
>
    <img
        src="{{ $source }}"
        alt="{{ $alt ?? $caption }}"
        class="h-72 w-full object-cover transition duration-700 group-hover:scale-110"
    >

    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/10 to-transparent"></div>

    <span class="absolute bottom-5 left-5 right-5 text-xl font-black text-white">
        {{ $caption }}
    </span>
</a>
