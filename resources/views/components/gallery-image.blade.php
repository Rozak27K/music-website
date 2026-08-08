@props(['image', 'caption', 'alt' => null])

<a href="{{ asset('image/' . $image) }}"
   data-fancybox="gallery"
   data-caption="{{ $caption }}">
    <img src="{{ asset('image/' . $image) }}"
         alt="{{ $alt ?? $caption }}"
         class="img-fluid gallery-img mb-3">
</a>
