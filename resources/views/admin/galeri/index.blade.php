@extends('layouts.app')

@section('title', 'Kelola Galeri')

@section('content')
<section class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Kelola Galeri</h1>
        <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary">Tambah Galeri</a>
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
                    <th>Kategori</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($galeris as $galeri)
                    <tr>
                        <td width="120">
                            <img src="{{ asset('image/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" class="img-fluid rounded">
                        </td>
                        <td>{{ $galeri->judul }}</td>
                        <td>{{ $galeri->kategori ?? '-' }}</td>
                        <td>
                            <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('admin.galeri.delete', $galeri->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Hapus galeri ini?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Belum ada galeri tambahan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</section>
@endsection
