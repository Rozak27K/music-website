@extends('layouts.app')

@section('title', 'Edit Artikel')

@section('content')
<section class="container py-5">
    <h1 class="mb-4">Edit Artikel</h1>

    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-4 rounded shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="judul" class="form-label">Judul</label>
            <input type="text" id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" class="form-control @error('judul') is-invalid @enderror">
            @error('judul')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="isi" class="form-label">Isi</label>
            <textarea id="isi" name="isi" rows="6" class="form-control @error('isi') is-invalid @enderror">{{ old('isi', $artikel->isi) }}</textarea>
            @error('isi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Gambar</label>
            @if ($artikel->gambar)
                <div class="mb-2">
                    <img src="{{ asset('image/' . $artikel->gambar) }}" alt="{{ $artikel->judul }}" width="180" class="rounded">
                </div>
            @endif
            <input type="file" id="gambar" name="gambar" class="form-control @error('gambar') is-invalid @enderror">
            @error('gambar')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('admin.artikel') }}" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</section>
@endsection
