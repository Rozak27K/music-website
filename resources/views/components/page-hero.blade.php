@props(['title', 'subtitle' => null])

<section class="relative overflow-hidden bg-[#202427]">
    <div class="absolute inset-0 bg-gradient-to-r from-purple-700/75 via-purple-600/70 to-fuchsia-600/70"></div>
    <div class="absolute inset-0 bg-cover bg-center opacity-20" style="background-image: url('{{ asset('image/event.jpeg') }}')"></div>

    <div class="relative mx-auto max-w-7xl px-6 py-20 text-center md:py-24">
        <div class="fade-up mx-auto max-w-3xl">
            <p class="text-sm font-bold uppercase tracking-[0.24em] text-white/80">
                Eskul Musik SMK
            </p>

            <h1 class="mt-4 text-4xl font-bold leading-tight text-white md:text-6xl">
                {{ $title }}
            </h1>

            @if ($subtitle)
                <p class="mx-auto mt-5 max-w-2xl text-lg leading-8 text-white/90">
                    {{ $subtitle }}
                </p>
            @endif
        </div>
    </div>
</section>
