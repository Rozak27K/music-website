@extends('layouts.app')

@section('title', 'Kelola Artikel')

@section('content')
<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Kelola Artikel</h1>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">Tambah Artikel</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered align-middle bg-white">
            <thead>
                <tr>
                    <th>Gambar</th>
                    <th>Judul</th>
                    <th>Isi</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($artikels as $artikel)
                    <tr>
                        <td width="120">
                            @if ($artikel->gambar)
                                <img src="{{ asset('image/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" class="img-fluid rounded">
                            @else
                                <span class="text-muted">Tidak ada</span>
                            @endif
                        </td>
                        <td>{{ $artikel->judul }}</td>
                        <td>{{ \Illuminate\Support\Str::limit($artikel->isi, 120) }}</td>
                        <td>
                            <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.artikel.delete', $artikel->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus artikel ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada artikel.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
