@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
<section class="bg-[#f4f4f5] py-12">
    <div class="mx-auto max-w-7xl px-6">
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-center">
            <div>
                <p class="text-sm font-black uppercase tracking-[0.28em] text-purple-700">
                    Admin
                </p>
                <h1 class="mt-2 text-4xl font-black text-[#202427]">
                    Kelola Artikel
                </h1>
            </div>

            <a href="{{ route('admin.artikel.create') }}" class="rounded-full bg-[#202427] px-6 py-3 text-sm font-black text-white transition hover:bg-purple-800">
                Tambah Artikel
            </a>
        </div>

        @if (session('success'))
            <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 font-semibold text-emerald-700">
                {{ session('success') }}
            </div>
        @endif

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">Gambar</th>
                            <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">Judul</th>
                            <th class="px-5 py-4 text-left text-xs font-black uppercase tracking-wider text-slate-500">Isi</th>
                            <th class="px-5 py-4 text-right text-xs font-black uppercase tracking-wider text-slate-500">Aksi</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse ($artikels as $artikel)
                            @php
                                $image = $artikel->gambar
                                    ? (str_contains($artikel->gambar, '/') ? asset('storage/' . $artikel->gambar) : asset('image/' . $artikel->gambar))
                                    : null;
                            @endphp

                            <tr class="align-top">
                                <td class="px-5 py-4">
                                    @if ($image)
                                        <img src="{{ $image }}" alt="{{ $artikel->judul }}" class="h-20 w-28 rounded-xl object-cover">
                                    @else
                                        <span class="inline-flex h-20 w-28 items-center justify-center rounded-xl bg-slate-100 text-xs font-bold text-slate-400">
                                            Tidak ada
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 font-black text-[#202427]">
                                    {{ $artikel->judul }}
                                </td>
                                <td class="max-w-xl px-5 py-4 leading-7 text-slate-600">
                                    {{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 140) }}
                                </td>
                                <td class="px-5 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('admin.artikel.edit', $artikel) }}" class="rounded-full bg-amber-100 px-4 py-2 text-sm font-black text-amber-700 hover:bg-amber-200">
                                            Edit
                                        </a>

                                        <form action="{{ route('admin.artikel.destroy', $artikel) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-full bg-red-100 px-4 py-2 text-sm font-black text-red-700 hover:bg-red-200" onclick="return confirm('Hapus artikel ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-5 py-12 text-center font-semibold text-slate-500">
                                    Belum ada artikel.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="mt-6">
            {{ $artikels->links() }}
        </div>
    </div>
</section>
@endsection
