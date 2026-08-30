@extends('layouts.app')

@section('title', 'Verifikasi Email | Eskul Musik')

@section('content')
<section class="relative overflow-hidden bg-gradient-to-br from-[#cf77dd] via-[#b636c6] to-[#9419b5] px-6 py-20">
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(255,255,255,0.24),transparent_28rem)]"></div>

    <div class="relative mx-auto flex min-h-[560px] max-w-7xl items-center justify-center">
        <x-auth-card
            title="Verifikasi Email"
            subtitle="Cek email kamu dan klik link verifikasi yang sudah dikirim."
        >
            @if (session('status') == 'verification-link-sent')
                <div class="mb-5 rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-semibold text-emerald-700">
                    Link verifikasi baru sudah dikirim ke email kamu.
                </div>
            @endif

            <div class="grid gap-3">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-auth-button>
                        Kirim Ulang Verifikasi
                    </x-auth-button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button
                        type="submit"
                        class="w-full rounded-full border border-slate-300 px-6 py-3.5 text-sm font-black text-slate-700 transition hover:border-red-300 hover:bg-red-50 hover:text-red-700"
                    >
                        Logout
                    </button>
                </form>
            </div>
        </x-auth-card>
    </div>
</section>
@endsection
