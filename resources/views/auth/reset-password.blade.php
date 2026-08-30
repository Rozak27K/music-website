@extends('layouts.app')

@section('title', 'Reset Password | Eskul Musik')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#cf77dd] via-[#b636c6] to-[#9419b5] px-6 py-20">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.24),transparent_28rem)]"></div>

    <div class="relative mx-auto flex min-h-[680px] max-w-7xl items-center justify-center">
        <x-auth-card
            title="Reset Password"
            subtitle="Buat password baru untuk akun Eskul Musik kamu."
        >
            <form method="POST" action="{{ route('password.store') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <x-auth-input
                    label="Email"
                    name="email"
                    type="email"
                    :value="$request->email"
                    placeholder="contoh@email.com"
                    required
                    autofocus
                    autocomplete="username"
                />

                <x-auth-input
                    label="Password Baru"
                    name="password"
                    type="password"
                    placeholder="Masukkan password baru"
                    required
                    autocomplete="new-password"
                />

                <x-auth-input
                    label="Konfirmasi Password"
                    name="password_confirmation"
                    type="password"
                    placeholder="Ulangi password baru"
                    required
                    autocomplete="new-password"
                />

                <x-auth-button>
                    Simpan Password
                </x-auth-button>
            </form>
        </x-auth-card>
    </div>
</section>
@endsection
