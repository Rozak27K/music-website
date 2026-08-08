@props(['title', 'subtitle' => null])

<section class="hero text-center">
    <h1 class="fw-bold">{{ $title }}</h1>

    @if ($subtitle)
        <p class="fs-5">{{ $subtitle }}</p>
    @endif
</section>
