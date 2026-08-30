@extends('layouts.app')

@section('title', 'Lupa Password | Eskul Musik')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#cf77dd] via-[#b636c6] to-[#9419b5] px-6 py-20">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.24),transparent_28rem)]"></div>

    <div class="relative mx-auto flex min-h-[600px] max-w-7xl items-center justify-center">
        <x-auth-card
            title="Lupa Password"
            subtitle="Masukkan email kamu untuk mendapatkan link reset password."
        >
            @if (session('status'))
                <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <x-auth-input
                    label="Email"
                    name="email"
                    type="email"
                    placeholder="contoh@email.com"
                    required
                    autofocus
                />

                <x-auth-button>
                    Kirim Link Reset
                </x-auth-button>
            </form>

            <p class="mt-6 text-center text-sm font-semibold text-slate-600">
                Ingat password?
                <a href="{{ route('login') }}" class="font-black text-purple-700 hover:text-purple-950">
                    Login
                </a>
            </p>
        </x-auth-card>
    </div>
</section>
@endsection
