@extends('layouts.app')

@section('title', 'Konfirmasi Password | Eskul Musik')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#cf77dd] via-[#b636c6] to-[#9419b5] px-6 py-20">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.24),transparent_28rem)]"></div>

    <div class="relative mx-auto flex min-h-[560px] max-w-7xl items-center justify-center">
        <x-auth-card
            title="Konfirmasi Password"
            subtitle="Masukkan password untuk melanjutkan ke area aman."
        >
            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                <x-auth-input
                    label="Password"
                    name="password"
                    type="password"
                    placeholder="Masukkan password"
                    required
                    autocomplete="current-password"
                />

                <x-auth-button>
                    Konfirmasi
                </x-auth-button>
            </form>
        </x-auth-card>
    </div>
</section>
@endsection
