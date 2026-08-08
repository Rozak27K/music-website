@props(['title', 'subtitle' => null])

<div class="auth-card">
    <div class="auth-card-header text-center">
        <img src="{{ asset('image/musiklogo.png') }}" alt="Logo Eskul Musik" class="auth-logo">
        <h1>{{ $title }}</h1>

        @if ($subtitle)
            <p>{{ $subtitle }}</p>
        @endif
    </div>

    {{ $slot }}
</div>
