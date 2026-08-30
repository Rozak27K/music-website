@extends('layouts.app')

@section('title', 'Login | Eskul Musik')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#cf77dd] via-[#b636c6] to-[#9419b5] px-6 py-20">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.24),transparent_28rem)]"></div>

    <div class="relative mx-auto flex min-h-[640px] max-w-7xl items-center justify-center">
        <x-auth-card
            title="Masuk Ruang Musik"
            subtitle="Login untuk masuk ke dashboard Eskul Musik."
        >
            @if (session('status'))
                <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">
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

                <div class="mb-6 flex flex-col gap-3 text-sm sm:flex-row sm:items-center sm:justify-between">
                    <label for="remember_me" class="flex items-center gap-2 font-semibold text-slate-600">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded border-slate-300 text-purple-700 focus:ring-purple-500"
                        >
                        <span>Ingat saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="font-black text-purple-700 hover:text-purple-950">
                            Lupa password?
                        </a>
                    @endif
                </div>

                <x-auth-button>
                    Login
                </x-auth-button>
            </form>

            <p class="mt-6 text-center text-sm font-semibold text-slate-600">
                Belum punya akun?
                <a href="{{ route('register') }}" class="font-black text-purple-700 hover:text-purple-950">
                    Register di sini
                </a>
            </p>
        </x-auth-card>
    </div>
</section>
@endsection
