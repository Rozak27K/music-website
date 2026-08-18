@props(['image', 'caption', 'alt' => null, 'category' => null])

<a class="gallery-item"
   href="{{ asset('image/' . $image) }}"
   data-fancybox="gallery"
   data-caption="{{ $caption }}"
   data-category="{{ \Illuminate\Support\Str::slug($category ?? $caption) }}"
   data-reveal>
    <img src="{{ asset('image/' . $image) }}"
         alt="{{ $alt ?? $caption }}"
         class="img-fluid gallery-img mb-3">
    <span>{{ $caption }}</span>
</a>
