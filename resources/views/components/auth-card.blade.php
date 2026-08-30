@props(['title' => null, 'subtitle' => null])

<div class="w-full max-w-md rounded-2xl border border-white/40 bg-white/95 p-8 shadow-2xl shadow-purple-950/20 backdrop-blur">
    <div class="mb-7 text-center">
        <div class="mx-auto mb-5 flex w-fit items-center">
            <img
                src="{{ asset('image/musiklogo-clean.png') }}"
                class="h-16 w-16 object-contain drop-shadow-[0_8px_14px_rgba(126,34,206,0.25)]"
                alt="Logo Eskul Musik"
            >

            <img
                src="{{ asset('image/smk-logo-clean.png') }}"
                class="-ml-3 h-14 w-14 object-contain drop-shadow-[0_8px_14px_rgba(15,23,42,0.18)]"
                alt="Logo SMKN 1 Dukuhturi"
            >
        </div>

        @if ($title)
            <h1 class="text-3xl font-black text-[#202427]">
                {{ $title }}
            </h1>
        @endif

        @if ($subtitle)
            <p class="mt-3 leading-7 text-slate-600">
                {{ $subtitle }}
            </p>
        @endif
    </div>

    {{ $slot }}
</div>
