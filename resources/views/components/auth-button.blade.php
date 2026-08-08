@props(['type' => 'submit'])

<button type="{{ $type }}" {{ $attributes->merge(['class' => 'btn auth-button w-100']) }}>
    {{ $slot }}
</button>
