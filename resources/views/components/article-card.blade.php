@props(['artikel'])

<div class="card article-card h-100" data-reveal data-title="{{ \Illuminate\Support\Str::lower($artikel->judul) }}">
    @if ($artikel->gambar)
        <img src="{{ asset('image/' . $artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}">
    @endif

    <div class="card-body">
        <h4>{{ $artikel->judul }}</h4>
        <p>{{ \Illuminate\Support\Str::limit($artikel->isi, 100) }}</p>

        <a class="btn btn-outline-primary btn-sm" href="{{ route('artikel.detail', $artikel) }}">
            Selengkapnya <i class="bi bi-arrow-right"></i>
        </a>
    </div>
</div>
