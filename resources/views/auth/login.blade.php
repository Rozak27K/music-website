@extends('layouts.app')

@section('title', 'Login | Eskul Musik')

@section('content')
<section class="auth-page">
    <x-auth-card
        title="Masuk Ruang Musik"
        subtitle="Login untuk mengelola dan mengikuti kabar Eskul Musik."
    >
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <x-auth-input
                label="Email"
                name="email"
                type="email"
                placeholder="contoh@email.com"
                required
                autofocus
                autocomplete="username"
            />

            <x-auth-input
                label="Password"
                name="password"
                type="password"
                placeholder="Masukkan password"
                required
                autocomplete="current-password"
            />

            <div class="d-flex justify-content-between align-items-center mb-4">
                <label for="remember_me" class="d-flex align-items-center gap-2 mb-0">
                    <input id="remember_me" type="checkbox" name="remember" class="form-check-input mt-0">
                    <span>Ingat saya</span>
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link">Lupa password?</a>
                @endif
            </div>

            <x-auth-button>
                Login
            </x-auth-button>
        </form>

        <div class="text-center mt-4">
            <p class="mb-0">
                Belum punya akun?
                <a href="{{ route('register') }}" class="auth-link">Register di sini</a>
            </p>
        </div>
    </x-auth-card>
</section>
@endsection
