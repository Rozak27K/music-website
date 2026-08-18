@props(['title', 'subtitle' => null])

<section class="hero text-center" data-reveal>
    <div class="container hero-inner">
        <span class="section-kicker">Eskul Musik SMK</span>
        <h1 class="fw-bold">{{ $title }}</h1>

        @if ($subtitle)
            <p class="fs-5">{{ $subtitle }}</p>
        @endif
    </div>
</section>
