@props(['label', 'name', 'type' => 'text', 'value' => null, 'placeholder' => null])

<div class="mb-5">
    <label for="{{ $name }}" class="mb-2 block text-sm font-black text-[#202427]">
        {{ $label }}
    </label>

    <input
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge([
            'class' => 'w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-3 font-semibold text-[#202427] outline-none transition placeholder:text-slate-400 focus:border-purple-500 focus:bg-white focus:ring-4 focus:ring-purple-100',
        ]) }}
    >

    @error($name)
        <p class="mt-2 text-sm font-semibold text-red-600">
            {{ $message }}
        </p>
    @enderror
</div>
