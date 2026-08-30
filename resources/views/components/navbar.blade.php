@php
    $navLinks = [
        ['label' => 'Home', 'route' => 'home', 'active' => 'home'],
        ['label' => 'Galeri', 'route' => 'galeri', 'active' => 'galeri'],
        ['label' => 'Profil', 'route' => 'profil', 'active' => 'profil'],
        ['label' => 'Artikel', 'route' => 'artikel', 'active' => 'artikel*'],
    ];

    $linkClass = function ($active) {
        return request()->routeIs($active)
            ? 'text-white'
            : 'text-slate-300 hover:text-white';
    };
@endphp

<nav class="sticky top-0 z-50 border-b border-white/10 bg-[#202427] text-white shadow-md">
    <div class="mx-auto flex min-h-[86px] max-w-7xl items-center justify-between px-5 md:px-8">
        <a href="{{ route('home') }}" class="flex items-center gap-3 no-underline">
            <div class="relative flex h-14 w-[88px] items-center">
                <img
                    src="{{ asset('image/musiklogo-clean.png') }}"
                    alt="Logo Eskul Musik"
                    class="absolute left-0 z-20 h-14 w-14 object-contain drop-shadow-[0_8px_14px_rgba(0,0,0,0.32)]"
                >

                <img
                    src="{{ asset('image/smk-logo-clean.png') }}"
                    alt="Logo SMKN 1 Dukuhturi"
                    class="absolute left-10 z-10 h-12 w-12 object-contain drop-shadow-[0_8px_14px_rgba(0,0,0,0.28)]"
                >
            </div>

            <div class="hidden sm:block">
                <h1 class="font-serif text-2xl font-bold leading-none text-white">
                    Eskul Musik
                </h1>
                <p class="mt-1 text-[11px] font-semibold uppercase tracking-[0.22em] text-purple-200">
                    SMKN 1 Dukuhturi
                </p>
            </div>
        </a>

        <div class="hidden items-center gap-8 lg:flex">
            @foreach ($navLinks as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="relative py-2 font-serif text-[18px] font-bold transition-colors duration-200 {{ $linkClass($link['active']) }}"
                >
                    {{ $link['label'] }}

                    @if (request()->routeIs($link['active']))
                        <span class="absolute bottom-0 left-0 h-[2px] w-full rounded-full bg-purple-400"></span>
                    @endif
                </a>
            @endforeach

            @guest
                <a
                    href="{{ route('login') }}"
                    class="rounded-full border border-purple-300/50 px-5 py-2 font-serif text-sm font-bold text-purple-100 transition duration-200 hover:bg-purple-500 hover:text-white"
                >
                    Login
                </a>
            @else
                <div class="relative ml-1 border-l border-white/10 pl-6">
                    <button
                        type="button"
                        data-account-toggle
                        aria-expanded="false"
                        class="flex items-center gap-3 rounded-full px-2 py-1.5 transition hover:bg-white/5"
                    >
                        <span class="flex h-9 w-9 items-center justify-center rounded-full bg-purple-500 text-sm font-bold text-white">
                            {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                        </span>

                        <span class="text-left">
                            <span class="block text-sm font-bold text-white">
                                Info Akun Anda
                            </span>
                            <span class="block text-xs text-slate-400">
                                {{ auth()->user()->isAdmin() ? 'Admin' : 'User' }}
                            </span>
                        </span>

                        <span class="text-xs text-slate-400">v</span>
                    </button>

                    <div
                        data-account-menu
                        class="absolute right-0 top-full mt-3 hidden w-64 overflow-hidden rounded-xl border border-slate-200 bg-white text-slate-900 shadow-xl"
                    >
                        <div class="border-b border-slate-100 px-4 py-4">
                            <p class="font-bold">{{ auth()->user()->name }}</p>
                            <p class="mt-1 truncate text-sm text-slate-500">{{ auth()->user()->email }}</p>
                        </div>

                        <a href="{{ route('dashboard') }}" class="block px-4 py-3 text-sm font-semibold transition hover:bg-purple-50 hover:text-purple-700">
                            Info Akun Anda
                        </a>

                        @if (auth()->user()->isAdmin())
                            <div class="border-t border-slate-100">
                                <p class="px-4 pb-1 pt-3 text-[11px] font-bold uppercase tracking-wider text-slate-400">
                                    Kelola Website
                                </p>

                                <a href="{{ route('admin.galeri.index') }}" class="block px-4 py-2.5 text-sm font-semibold transition hover:bg-purple-50 hover:text-purple-700">
                                    Edit Galeri
                                </a>

                                <a href="{{ route('admin.artikel.index') }}" class="block px-4 py-2.5 text-sm font-semibold transition hover:bg-purple-50 hover:text-purple-700">
                                    Edit Artikel
                                </a>
                            </div>
                        @endif

                        <div class="border-t border-slate-100">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="w-full px-4 py-3 text-left text-sm font-semibold text-red-600 transition hover:bg-red-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endguest
        </div>

        <button
            type="button"
            data-mobile-toggle
            aria-label="Buka menu"
            aria-expanded="false"
            class="flex h-10 w-10 items-center justify-center rounded-lg border border-white/10 text-white transition hover:bg-white/10 lg:hidden"
        >
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-6 w-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <div data-mobile-menu class="hidden border-t border-white/10 bg-[#202427] lg:hidden">
        <div class="mx-auto max-w-7xl px-5 py-3">
            @foreach ($navLinks as $link)
                <a
                    href="{{ route($link['route']) }}"
                    class="block border-b border-white/10 py-3 font-serif text-base font-bold {{ $linkClass($link['active']) }}"
                >
                    {{ $link['label'] }}
                </a>
            @endforeach

            @guest
                <a href="{{ route('login') }}" class="mt-2 block py-3 font-serif text-base font-bold text-purple-200">
                    Login
                </a>
            @else
                <a href="{{ route('dashboard') }}" class="block border-b border-white/10 py-3 text-base font-bold text-purple-200">
                    Info Akun Anda
                </a>

                @if (auth()->user()->isAdmin())
                    <a href="{{ route('admin.galeri.index') }}" class="block border-b border-white/10 py-3 text-base font-bold text-slate-200">
                        Edit Galeri
                    </a>

                    <a href="{{ route('admin.artikel.index') }}" class="block border-b border-white/10 py-3 text-base font-bold text-slate-200">
                        Edit Artikel
                    </a>
                @endif

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full py-3 text-left text-base font-bold text-red-300">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>
