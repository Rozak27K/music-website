@extends('layouts.app')

@section('title', 'Register | Eskul Musik')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#cf77dd] via-[#b636c6] to-[#9419b5] px-6 py-20">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.24),transparent_28rem)]"></div>

    <div class="relative mx-auto flex min-h-[720px] max-w-7xl items-center justify-center">
        <x-auth-card
            title="Gabung Eskul Musik"
            subtitle="Buat akun untuk mendapatkan akses ke informasi Eskul Musik."
        >
            @if ($errors->any())
                <div class="mb-5 rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">
                    <p class="font-black">Periksa kembali data kamu.</p>

                    <ul class="mt-2 list-disc space-y-1 pl-5 font-semibold">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <x-auth-input
                    label="Nama Lengkap"
                    name="name"
                    type="text"
                    placeholder="Masukkan nama lengkap"
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
                    Daftar Sekarang
                </x-auth-button>
            </form>

            <p class="mt-6 text-center text-sm font-semibold text-slate-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-black text-purple-700 hover:text-purple-950">
                    Login di sini
                </a>
            </p>
        </x-auth-card>
    </div>
</section>
@endsection
