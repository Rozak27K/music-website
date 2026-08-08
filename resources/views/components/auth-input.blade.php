@props(['label', 'name', 'type' => 'text', 'value' => null, 'placeholder' => null])

<div class="mb-3">
    <label for="{{ $name }}" class="form-label auth-label">{{ $label }}</label>
    <input
        id="{{ $name }}"
        type="{{ $type }}"
        name="{{ $name }}"
        value="{{ old($name, $value) }}"
        placeholder="{{ $placeholder }}"
        {{ $attributes->merge(['class' => 'form-control auth-input']) }}
    >

    @error($name)
        <div class="text-danger small mt-1">{{ $message }}</div>
    @enderror
</div>
