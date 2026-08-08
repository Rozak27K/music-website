@props(['image', 'title', 'href' => null])

@if ($href)
    <a href="{{ $href }}" class="text-decoration-none text-dark">
        <div class="card h-100 text-center">
            <img src="{{ asset('image/' . $image) }}" class="card-img-top" alt="{{ $title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $title }}</h5>
            </div>
        </div>
    </a>
@else
    <div class="card h-100 text-center">
        <img src="{{ asset('image/' . $image) }}" class="card-img-top" alt="{{ $title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $title }}</h5>
        </div>
    </div>
@endif
