@props(['title' => null, 'class' => ''])

<div {{ $attributes->merge(['class' => 'card ' . $class]) }}>
    <div class="card-body">
        @if ($title)
            <h4 class="text-center">{{ $title }}</h4>
        @endif

        {{ $slot }}
    </div>
</div>
