@props(['image', 'title', 'href' => null])

@if ($href)
    <a href="{{ $href }}" class="text-decoration-none text-dark image-card-link">
        <div class="card image-card h-100 text-center" data-reveal>
            <img src="{{ asset('image/' . $image) }}" class="card-img-top" alt="{{ $title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
                <span class="card-action">Lihat dokumentasi <i class="bi bi-arrow-right"></i></span>
            </div>
        </div>
    </a>
@else
    <div class="card image-card h-100 text-center" data-reveal>
        <img src="{{ asset('image/' . $image) }}" class="card-img-top" alt="{{ $title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
        </div>
    </div>
@endif
