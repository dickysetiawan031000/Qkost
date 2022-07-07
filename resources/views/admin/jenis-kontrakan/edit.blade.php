@extends('admin.layouts.main')

@section('container')

<h4> Edit Jenis Kontrakan</h4>

<form action="{{ route('admin.jenis-kontrakan.update', $jenisKontrakan->id) }}" method="post" class="mt-5">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Jenis Kontrakan</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama"
            value="{{ old('nama', $jenisKontrakan->nama) }}">
    </div>
    @error('nama')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
            value="{{ old('alamat', $jenisKontrakan->alamat) }}">
    </div>
    @error('alamat')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga"
            value="{{ old('harga', $jenisKontrakan->harga) }}">
    </div>
    @error('harga')
    <div class="invalid-feedback">
        {{ $message }}
    </div>
    @enderror
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection