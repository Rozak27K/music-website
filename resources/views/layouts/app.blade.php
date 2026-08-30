<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Eskul Musik')</title>

    <link rel="icon" href="{{ asset('image/musiklogo-clean.png') }}">

    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])
</head>

<body class="min-h-screen bg-[#f4f4f5]">
    <x-navbar />

    <main>
        @yield('content')
    </main>

    <footer class="border-t border-white/10 bg-[#202427] text-white">
        <div class="mx-auto max-w-7xl px-6 py-12">
            <div class="grid gap-10 md:grid-cols-3">
                <div>
                    <div class="flex items-center gap-3">
                        <img
                            src="{{ asset('image/musiklogo-clean.png') }}"
                            class="h-14 w-14 object-contain drop-shadow-[0_8px_14px_rgba(0,0,0,0.28)]"
                            alt="Logo Eskul Musik"
                        >

                        <img
                            src="{{ asset('image/smk-logo-clean.png') }}"
                            class="h-12 w-12 object-contain drop-shadow-[0_8px_14px_rgba(0,0,0,0.24)]"
                            alt="Logo SMK Negeri 1 Dukuhturi"
                        >

                        <div>
                            <h3 class="text-xl font-black text-white">
                                Eskul Musik
                            </h3>
                            <p class="text-sm text-slate-400">
                                SMKN 1 Dukuhturi
                            </p>
                        </div>
                    </div>

                    <p class="mt-5 leading-7 text-slate-400">
                        Wadah bagi siswa untuk mengembangkan bakat, kreativitas,
                        dan kemampuan dalam bidang musik.
                    </p>
                </div>

                <div>
                    <h3 class="mb-4 text-lg font-black text-white">
                        Navigasi
                    </h3>

                    <div class="flex flex-col gap-2">
                        <a href="{{ route('home') }}" class="text-slate-400 hover:text-white">Home</a>
                        <a href="{{ route('galeri') }}" class="text-slate-400 hover:text-white">Galeri</a>
                        <a href="{{ route('profil') }}" class="text-slate-400 hover:text-white">Profil</a>
                        <a href="{{ route('artikel') }}" class="text-slate-400 hover:text-white">Artikel</a>
                    </div>
                </div>

                <div>
                    <h3 class="mb-4 text-lg font-black text-white">
                        Tentang Kami
                    </h3>

                    <p class="leading-7 text-slate-400">
                        Eskul Musik merupakan kegiatan ekstrakurikuler yang
                        menjadi tempat siswa untuk belajar dan berkarya melalui musik.
                    </p>
                </div>
            </div>

            <div class="mt-10 border-t border-white/10 pt-6 text-center">
                <p class="text-sm text-slate-500">
                    &copy; {{ date('Y') }} Eskul Musik SMKN 1 Dukuhturi.
                    Semua hak dilindungi.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
