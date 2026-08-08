@extends('layouts.app')

@section('title', 'Register | Eskul Musik')

@section('content')
<section class="auth-page">
    <x-auth-card
        title="Gabung Eskul Musik"
        subtitle="Buat akun untuk masuk ke website dan mengikuti informasi terbaru."
    >
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <x-auth-input
                label="Nama"
                name="name"
                placeholder="Nama lengkap"
                required
                autofocus
                autocomplete="name"
            />

            <x-auth-input
                label="Email"
                name="email"
                type="email"
                placeholder="contoh@email.com"
                required
                autocomplete="username"
            />

            <x-auth-input
                label="Password"
                name="password"
                type="password"
                placeholder="Buat password"
                required
                autocomplete="new-password"
            />

            <x-auth-input
                label="Konfirmasi Password"
                name="password_confirmation"
                type="password"
                placeholder="Ulangi password"
                required
                autocomplete="new-password"
            />

            <x-auth-button>
                Register
            </x-auth-button>
        </form>

        <div class="text-center mt-4">
            <p class="mb-0">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="auth-link">Login di sini</a>
            </p>
        </div>
    </x-auth-card>
</section>
@endsection
