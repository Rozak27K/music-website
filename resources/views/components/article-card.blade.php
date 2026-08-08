@props(['artikel'])

<div class="card fancy-card h-100">
    @if ($artikel->gambar)
        <img src="{{ asset('image/' . $artikel->gambar) }}" class="card-img-top" alt="{{ $artikel->judul }}">
    @endif

    <div class="card-body">
        <h4 class="text-center">{{ $artikel->judul }}</h4>
        <p>{{ \Illuminate\Support\Str::limit($artikel->isi, 100) }}</p>

        <div class="text-center">
            <a class="btn btn-outline-primary btn-sm" href="{{ route('artikel.detail', $artikel) }}">
                Selengkapnya
            </a>
        </div>
    </div>
</div>
