@props(['type' => 'submit'])

<button
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'w-full rounded-full bg-[#202427] px-6 py-3.5 text-sm font-black text-white shadow-lg shadow-slate-300/60 transition hover:-translate-y-1 hover:bg-purple-800',
    ]) }}
>
    {{ $slot }}
</button>
