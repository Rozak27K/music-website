@extends('layouts.app')

@section('title', 'Tambah Galeri')

@section('content')
<section class="container py-5">
    <h1 class="mb-4">Tambah Galeri</h1>

    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        @csrf

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul') }}" class="form-control @error('judul') is-invalid @enderror">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <input type="text" id="kategori" name="kategori" value="{{ old('kategori') }}" class="form-control @error('kategori') is-invalid @enderror" placeholder="Contoh: Band, Event, Paduan Suara">
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.galeri') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</section>
@endsection
